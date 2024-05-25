#!/bin/bash

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

command="service smb restart"
action=$($command)