#!/bin/bash

# Variables de entrada
username="$1"

# Ruta del directorio base
base_dir="/honeycomb"

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Verificar si el usuario existe
if id "$username" &>/dev/null; then
    echo "El usuario $username existe."
else
    handle_error "El usuario $username no existe."
fi

# Habilitar cuotas en Btrfs si no están habilitadas
if ! sudo btrfs quota show "$base_dir" &>/dev/null; then
    echo "Habilitando cuotas en $base_dir..."
    sudo btrfs quota enable "$base_dir" || handle_error "No se pudo habilitar las cuotas en $base_dir"
else
    echo "Las cuotas ya están habilitadas en $base_dir."
fi

# Crear subvolumen para el usuario si no existe
user_subvol="$base_dir/$username"
if [ -d "$user_subvol" ]; then
    echo "El subvolumen $user_subvol ya existe."
else
    echo "Creando subvolumen para el usuario $username..."
    sudo btrfs subvolume create "$user_subvol" || handle_error "No se pudo crear el subvolumen para $username"
fi

# Asignar propietario y permisos al subvolumen
sudo chown "$username":"$username" "$user_subvol" || handle_error "No se pudo asignar la propiedad del subvolumen $user_subvol"
sudo chmod 700 "$user_subvol" || handle_error "No se pudo establecer los permisos del subvolumen $user_subvol"
echo "Permisos del subvolumen $user_subvol actualizados."

# Obtener el ID del subvolumen
subvol_id=$(sudo btrfs subvolume list "$base_dir" | awk -v user_subvol="$username" '$NF==user_subvol {print $2}')
if [ -z "$subvol_id" ]; then
    handle_error "No se pudo obtener el ID del subvolumen para $username"
fi

# Establecer la cuota de 2GB para el subvolumen
sudo btrfs qgroup limit 2G "$user_subvol" || handle_error "No se pudo asignar la cuota de disco para el usuario $username"
echo "Cuota de 2GB asignada al usuario $username en $user_subvol."

echo "Configuración completada exitosamente para el usuario $username."
exit 0
