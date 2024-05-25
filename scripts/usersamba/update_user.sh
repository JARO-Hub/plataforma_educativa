#!/bin/bash

passw=$1
new_sambapassword=$2
new_username=$3
username=$4  # Username actual para operaciones de actualización

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Editamos el usuario en el sistema
if [ ! -z "$new_username" ]; then
    # Renombrar usuario del sistema si se proporciona un nuevo nombre de usuario
    echo "$passw" | sudo -S usermod -l "$new_username" "$username" || handle_error "No se pudo renombrar el usuario del sistema"
    username=$new_username
fi

# Cambiar la contraseña del usuario de Samba
echo -e "$new_sambapassword\n$new_sambapassword" | sudo -S smbpasswd -s "$username" || handle_error "No se pudo cambiar la contraseña del usuario de Samba"

echo "Usuario actualizado correctamente"
exit 0