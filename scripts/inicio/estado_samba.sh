#!/bin/bash

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}
command="systemctl is-active smb"
# Comando para verificar el estado del servicio Samba
status=$($command)|| handle_error "Inactivo"

# Imprimir la salida para depuración
echo "Estado del servicio: '$status'"

if [ $? -eq 0 ]; then
    # Imprimir la salida para depuración
    echo "Estado del servicio: '$status'"

    # Verificar el estado del servicio
    if [ "$status" = "active" ]; then
        echo "Activo"
    elif [ "$status" = "inactive" ]; then
        echo "Inactivo"
    else
        echo "Estado desconocido"
    fi
else
    handle_error "No se pudo obtener el estado"
fi

exit 0