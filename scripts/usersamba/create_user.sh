#!/bin/bash

username=$1
sambapassword=$2
passw=$3

# Crear el usuario en el sistema
echo "$passw" | sudo -S useradd -m "$username"
if [ $? -ne 0 ]; then
  echo "Error al crear el usuario del sistema"
  exit 1
fi

# Añadir el usuario a Samba
echo -e "$sambapassword\n$sambapassword" | sudo -S smbpasswd -s -a "$username"
if [ $? -ne 0 ]; then
  echo "Error al añadir el usuario a Samba"
  exit 1
fi

# Habilitar el usuario de Samba
echo "$passw" | sudo -S smbpasswd -e "$username"
if [ $? -ne 0 ]; then
  echo "Error al habilitar el usuario de Samba"
  exit 1
fi

echo "true"
exit 0