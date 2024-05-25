#!/bin/bash

# Los pondra en el grupo sambausers

username=$1
sambapassword=$2
passw=$3

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Crea el grupo si no lo hay
if [ $(getent group sambausers) ]; then
  echo "El grupo sambausers ya existe"
else
  echo "$passw" | sudo -S groupadd sambausers || handle_error "No se pudo crear el grupo sambausers"
fi

# Crear el usuario en el sistema
echo "$passw" | sudo -S useradd -m "$username" -G sambausers || handle_error "No se pudo crear el usuario del sistema"
echo -e "$sambapassword\n$sambapassword" | sudo -S smbpasswd -s -a "$username" || handle_error "No se pudo añadir el usuario a Samba"
echo "$passw" | sudo -S smbpasswd -e "$username" || handle_error "No se pudo habilitar el usuario de Samba"

echo "true"
exit 0