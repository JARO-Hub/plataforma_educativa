#!/bin/bash

# Recibir los parámetros
shareName=$1
password=$2 # La contraseña se pasa como el segundo parámetro

# Ubicación del archivo smb.conf
smbConf="/etc/samba/smb.conf"
tempConf=$(mktemp) # Archivo temporal para almacenar el nuevo contenido

# Leer el archivo smb.conf línea por línea y eliminar la sección correspondiente
in_section=false

while IFS= read -r line; do
    # Verificar si es el inicio de una sección
    if [[ "$line" =~ ^\[(.+)\]$ ]]; then
        # Si estamos en la sección del recurso compartido, cambiar el estado
        if [[ "${BASH_REMATCH[1]}" == "$shareName" ]]; then
            in_section=true
            continue
        else
            in_section=false
        fi
    fi

    # Si no estamos en la sección que queremos eliminar, copiar la línea al archivo temporal
    if ! $in_section; then
        echo "$line" >> "$tempConf"
    fi
done < "$smbConf"

# Reemplazar el archivo smb.conf con el nuevo contenido
echo "$password" | sudo -S cp "$tempConf" "$smbConf"
rm "$tempConf"

# Verificar si la escritura en el archivo fue exitosa
if [ $? -eq 0 ]; then
  echo true
else
  echo false
fi
