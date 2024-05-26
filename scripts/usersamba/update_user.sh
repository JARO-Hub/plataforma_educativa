#!/bin/bash

passw=$1
new_sambapassword=$2
new_username=$3
username=$4  # Username actual para operaciones de actualización

# Función para manejar errores
handle_error() {
    echo "Error: $1" >&2
    exit 1
}

# Verificar que el nombre de usuario actual no esté vacío
if [ -z "$username" ]; then
    handle_error "El nombre de usuario actual no puede estar vacío"
fi

# Verificar si el usuario existe en el sistema
if ! getent passwd "$username" > /dev/null 2>&1; then
    handle_error "El usuario $username no existe en el sistema"
fi

# Renombrar usuario del sistema si se proporciona un nuevo nombre de usuario
if [ ! -z "$new_username" ]; then
    echo "Renombrando el usuario $username a $new_username..."
    echo "$passw" | sudo -S usermod -l "$new_username" "$username" || handle_error "No se pudo renombrar el usuario del sistema"
    username=$new_username
fi

# Cambiar la contraseña del usuario de Samba
if [ ! -z "$new_sambapassword" ]; then
    echo "$passw" | sudo echo "Cambiando la contraseña del usuario $username en Samba..."
    echo -e "$new_sambapassword\n$new_sambapassword" | sudo -S smbpasswd -s "$username" || handle_error "No se pudo cambiar la contraseña del usuario de Samba"
fi

echo "Usuario actualizado correctamente"
exit 0