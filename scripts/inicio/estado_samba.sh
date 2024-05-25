
# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

echo systemctl is-active smbd || handle_error "No se pudo obtener el estado"
echo "true"
exit 0

