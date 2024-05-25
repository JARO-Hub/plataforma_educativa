#!/bin/bash

passw=$1
sambausername=$2

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Editamos el usuario en el sistema
if [ ! -z "$sambausername" ]; then
    echo "$passw" | sudo -S smbpasswd -x "$sambausername" || handle_error "No se pudo eliminar el usuario de Samba"
    echo "$passw" | sudo -S userdel "$sambausername"  || handle_error "No se pudo eliminar el usuario del sistema"
fi

echo "Usuario eliminado correctamente"
exit 0