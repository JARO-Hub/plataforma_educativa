#!/bin/bash

passw=$1
sambausername=$2

# Función para manejar errores
handle_error() {
    echo "Error: $1" >&2
    exit 1
}

# Verificar que el nombre de usuario no esté vacío
if [ -z "$sambausername" ]; then
    handle_error "El nombre de usuario no puede estar vacío"
fi

# Verificar si el usuario existe en Samba
if ! echo "$passw" | sudo -S pdbedit -L -u "$sambausername" > /dev/null 2>&1; then
    handle_error "El usuario $sambausername no existe en Samba"
fi

# Intentar eliminar el usuario de Samba con smbpasswd
echo "Intentando eliminar el usuario $sambausername de Samba con smbpasswd..."
if echo "$passw" | sudo -S smbpasswd -x "$sambausername"; then
    echo "Usuario $sambausername eliminado de Samba con smbpasswd."
else
    # Si falla, intentar eliminar el usuario de Samba con pdbedit
    echo "No se pudo eliminar el usuario $sambausername con smbpasswd. Intentando con pdbedit..."
    if echo "$passw" | sudo -S pdbedit -x -u "$sambausername"; then
        echo "Usuario $sambausername eliminado de Samba con pdbedit."
    else
        handle_error "No se pudo eliminar el usuario $sambausername de Samba con ninguno de los comandos."
    fi
fi

# Eliminar el usuario del sistema
echo "$passw" | sudo -S userdel -r "$sambausername" || handle_error "No se pudo eliminar el usuario del sistema"

# Reiniciar el servicio de Samba para aplicar cambios
echo "$passw" | sudo -S systemctl restart smb || handle_error "No se pudo reiniciar el servicio de Samba"
echo "$passw" | sudo -S systemctl restart nmb || handle_error "No se pudo reiniciar el servicio de NetBIOS"

echo "Usuario eliminado correctamente"
exit 0