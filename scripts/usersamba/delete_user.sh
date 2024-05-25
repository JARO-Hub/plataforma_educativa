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

# Eliminar el usuario de Samba
echo "$passw" | sudo -S smbpasswd -x "$sambausername" || handle_error "No se pudo eliminar el usuario de Samba"

# Eliminar el usuario del sistema
echo "$passw" | sudo -S userdel -r "$sambausername" || handle_error "No se pudo eliminar el usuario del sistema"

# Reiniciar el servicio de Samba para aplicar cambios
echo "$passw" | sudo -S systemctl restart smb || handle_error "No se pudo reiniciar el servicio de Samba"
echo "$passw" | sudo -S systemctl restart nmb || handle_error "No se pudo reiniciar el servicio de NetBIOS"

echo "Usuario eliminado correctamente"
exit 0