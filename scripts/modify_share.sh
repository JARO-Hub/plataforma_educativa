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

# Ubicación del archivo smb.conf
smbConf="/etc/samba/smb.conf"
tempConf=$(mktemp) # Archivo temporal para almacenar el nuevo contenido

# Bandera para indicar si se encontró el bloque del recurso compartido
found=false

# Bandera para indicar si se necesita agregar un nuevo bloque al final
needToAdd=true

# Leer el contenido del archivo smb.conf línea por línea
while IFS= read -r line; do
    # Si se encuentra el inicio del bloque del recurso compartido
    if [[ "$line" =~ ^\[$shareName\]$ ]]; then
        if ! $found; then
            found=true
            needToAdd=false
            # Escribir la nueva configuración del recurso compartido en el archivo temporal
            echo "[$shareName]" >> "$tempConf"
            echo "    comment = $comment" >> "$tempConf"
            echo "    path = $sharePath" >> "$tempConf"
            echo "    writable = $writable" >> "$tempConf"
            echo "    browseable = $browseable" >> "$tempConf"
            echo "    guest ok = $guestOk" >> "$tempConf"
            echo "    create mask = $createMask" >> "$tempConf"
            echo "    directory mask = $directoryMask" >> "$tempConf"
            echo "    read only = $readOnly" >> "$tempConf"
            # Leer las siguientes líneas para omitir el bloque existente
            while IFS= read -r inner_line && [[ ! "$inner_line" =~ ^\[(.+)\]$ ]]; do
                continue
            done
            continue
        fi
    fi

    # Mantener la línea en el archivo temporal
    echo "$line" >> "$tempConf"
done < "$smbConf"

# Si no se encontró el bloque del recurso compartido, mostrar un mensaje de error y salir
if ! $found; then
    echo "Error: No se encontró el bloque del recurso compartido '$shareName' en el archivo smb.conf."
    exit 1
fi

# Si necesitamos agregar un nuevo bloque al final
if $needToAdd; then
    echo "[$shareName]" >> "$tempConf"
    echo "    comment = $comment" >> "$tempConf"
    echo "    path = $sharePath" >> "$tempConf"
    echo "    writable = $writable" >> "$tempConf"
    echo "    browseable = $browseable" >> "$tempConf"
    echo "    guest ok = $guestOk" >> "$tempConf"
    echo "    create mask = $createMask" >> "$tempConf"
    echo "    directory mask = $directoryMask" >> "$tempConf"
    echo "    read only = $readOnly" >> "$tempConf"
fi

# Reemplazar el archivo smb.conf con el nuevo contenido usando la contraseña
echo "$password" | sudo -S cp "$tempConf" "$smbConf" > /dev/null 2>&1

# Eliminar el archivo temporal
rm "$tempConf" > /dev/null 2>&1

# Verificar si la escritura en el archivo fue exitosa
if [ $? -eq 0 ]; then
  echo true
else
  echo false
fi
