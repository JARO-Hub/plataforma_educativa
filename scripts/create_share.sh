#!/bin/bash

# Recibir los parámetros
shareName=$1
comment=$2
sharePath=$3
writable=$4
browseable=$5
guestOk=$6
createMask=$7
directoryMask=$8
readOnly=$9
password=${10} # La contraseña se pasa como el décimo parámetro

# Construir la configuración del recurso compartido
config="[$shareName]\n"
config+="    comment = $comment\n"
config+="    path = $sharePath\n"
config+="    writable = $writable\n"
config+="    browseable = $browseable\n"
config+="    guest ok = $guestOk\n"
config+="    create mask = $createMask\n"
config+="    directory mask = $directoryMask\n"
config+="    read only = "
if [ "$readOnly" = true ]; then
  config+="Yes\n"
else
  config+="No\n"
fi

# Agregar la configuración al archivo smb.conf usando la contraseña proporcionada
# Usar printf para manejar correctamente las nuevas líneas
echo "$password" | sudo -S bash -c "printf '$config' >> /etc/samba/smb.conf"

# Verificar si la escritura en el archivo fue exitosa
if [ $? -eq 0 ]; then
  echo true
else
  echo false
fi
