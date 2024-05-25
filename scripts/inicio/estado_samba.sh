#!/bin/bash

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}
command="systemctl is-active smb"
# Comando para verificar el estado del servicio Samba
status=$($command)

# Imprimir la salida para depuración
echo "Estado del servicio: '$status'"

if [ $? -eq 0 ]; then
    # Imprimir la salida para depuración
    echo "Estado del servicio: '$status'"

    # Verificar el estado del servicio
    if [ "$status" = "active" ]; then
        echo "Activo"
        exit 0
    elif [ "$status" = "inactive" ]; then
        echo "Inactivo"
        exit 0
    else
        echo "Estado desconocido"
        exit 0
    fi
else
    handle_error "No se pudo obtener el estado"
fi
