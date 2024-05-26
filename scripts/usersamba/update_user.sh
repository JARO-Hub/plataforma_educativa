#!/bin/bash

passw=$1
new_sambapassword=$2
new_username=$3
username=$4  # Nombre de usuario actual para operaciones de actualización

# Función para manejar errores
handle_error() {
    echo "Error: $1" >&2
    exit 1
}

# Verificar que el nombre de usuario actual no esté vacío
if [ -z "$username" ]; then
    handle_error "El nombre de usuario actual no puede estar vacío"
fi

# Verificar si el usuario existe en Samba
if ! sudo -S pdbedit -L -u "$username" > /dev/null 2>&1; then
    handle_error "El usuario $username no existe en Samba"
fi

# Renombrar usuario en Samba y en el sistema si se proporciona un nuevo nombre de usuario
if [ ! -z "$new_username" ]; then
    echo "Renombrando el usuario $username a $new_username..."
    echo "$passw" | sudo -S usermod -l "$new_username" "$username" || handle_error "No se pudo renombrar el usuario del sistema"
    echo "$passw" | sudo -S pdbedit -r -u "$username" -n "$new_username" || handle_error "No se pudo renombrar el usuario en Samba"
    username=$new_username
fi

# Cambiar la contraseña del usuario de Samba
if [ ! -z "$new_sambapassword" ]; then
    echo "Cambiando la contraseña del usuario $username en Samba..."
    echo -e "$new_sambapassword\n$new_sambapassword" | sudo -S smbpasswd -s "$username" || handle_error "No se pudo cambiar la contraseña del usuario de Samba"
fi

echo "Usuario actualizado correctamente"
exit 0