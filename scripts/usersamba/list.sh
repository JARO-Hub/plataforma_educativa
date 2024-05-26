#!/bin/bash

password=$1

handle_error() {
    echo "Error: $1"
    exit 1
}

# Ejecutar el comando pdbedit con sudo
echo "$password" | sudo -S pdbedit -L -v 2>&1
if [ $? -ne 0 ]; then
    handle_error "No se pudo ejecutar pdbedit"
fi

exit 0