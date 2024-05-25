#!/bin/bash

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}
$command="systemctl is-active smb"
# Comando para verificar el estado del servicio Samba
status=$($command)|| handle_error "No se pudo obtener el estado"

# Imprimir la salida para depuración
echo "Estado del servicio: '$status'"

# Verificar el estado del servicio
case $status in
    active)
        echo "Activo"
        ;;
    inactive)
        echo "Inactivo"
        ;;
    *)
        echo "Estado desconocido"
        ;;
esac

exit 0