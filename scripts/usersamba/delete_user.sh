#!/bin/bash

passw=$1
sambausername=$2

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Verificar que el nombre de usuario no esté vacío
if [ ! -z "$sambausername" ]; then
    # Eliminar el usuario de Samba
    echo "$passw" | sudo -S pdbedit -x -u "$sambausername" || handle_error "No se pudo eliminar el usuario de Samba"

    # Eliminar el usuario del sistema
    echo "$passw" | sudo -S userdel "$sambausername" || handle_error "No se pudo eliminar el usuario del sistema"

    # Eliminar el directorio home del usuario
    echo "$passw" | sudo -S rm -rf /home/"$sambausername" || handle_error "No se pudo eliminar el directorio home del usuario"

    # Reiniciar el servicio de Samba
    echo "$passw" | sudo -S systemctl restart smb || handle_error "No se pudo reiniciar el servicio de Samba"
    echo "$passw" | sudo -S systemctl restart nmb || handle_error "No se pudo reiniciar el servicio de NetBIOS"
fi

echo "Usuario eliminado correctamente"
exit 0