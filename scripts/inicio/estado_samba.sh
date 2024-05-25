
# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

status=$("systemctl is-active smbd") || handle_error "No se pudo obtener el estado"
echo $status
exit 0

