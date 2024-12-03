#!/bin/bash

# Variables de entrada
username="$1"

# Función para manejar errores
handle_error() {
    echo "Error: $1"
    exit 1
}

# Verificar si el usuario existe
if id "$username" &>/dev/null; then
    echo "El usuario $username existe."
else
    handle_error "El usuario $username no existe. Por favor, crea el usuario antes de configurar el acceso FTP."
fi

# Crear el grupo honeycombftp si no existe
if ! getent group honeycombftp > /dev/null; then
    sudo groupadd honeycombftp || handle_error "No se pudo crear el grupo honeycombftp"
    echo "Grupo honeycombftp creado."
else
    echo "El grupo honeycombftp ya existe."
fi

# Añadir el usuario al grupo honeycombftp
sudo usermod -a -G honeycombftp "$username" || handle_error "No se pudo añadir el usuario al grupo honeycombftp"
echo "Usuario $username añadido al grupo honeycombftp."

# Configurar el shell del usuario a /usr/sbin/nologin para evitar acceso SSH
if [ -e /usr/sbin/nologin ]; then
    nologin_shell="/usr/sbin/nologin"
elif [ -e /sbin/nologin ]; then
    nologin_shell="/sbin/nologin"
else
    handle_error "No se encontró el shell nologin."
fi

sudo usermod -s "$nologin_shell" "$username" || handle_error "No se pudo cambiar el shell del usuario"

# Cambiar permisos del directorio home del usuario
sudo chown root:root /home/"$username" || handle_error "No se pudo cambiar el propietario del directorio home"
sudo chmod 755 /home/"$username" || handle_error "No se pudo cambiar los permisos del directorio home"

# Crear directorio donde el usuario pueda escribir
sudo mkdir -p /home/"$username"/ftp_upload || handle_error "No se pudo crear el directorio ftp_upload"
sudo chown "$username":users /home/"$username"/ftp_upload || handle_error "No se pudo cambiar el propietario del directorio ftp_upload"
sudo chmod 700 /home/"$username"/ftp_upload || handle_error "No se pudo cambiar los permisos del directorio ftp_upload"

# Configurar vsftpd para chroot del usuario
vsftpd_conf="/etc/vsftpd.conf"  # Archivo de configuración en openSUSE

# Asegurarse de que vsftpd está instalado
if ! command -v vsftpd &> /dev/null; then
    echo "vsftpd no está instalado. Instalando vsftpd..."
    sudo zypper install -y vsftpd || handle_error "No se pudo instalar vsftpd"
fi

# Asegurarse de que el usuario está en la lista de chroot
user_list="/etc/vsftpd.chroot_list"  # Archivo de chroot en openSUSE

# Crear el archivo chroot_list si no existe
if [ ! -f "$user_list" ]; then
    sudo touch "$user_list" || handle_error "No se pudo crear el archivo chroot_list"
    sudo chmod 644 "$user_list"
fi

# Añadir el usuario a chroot_list si no está ya
if ! grep -Fxq "$username" "$user_list"; then
    echo "$username" | sudo tee -a "$user_list" > /dev/null || handle_error "No se pudo añadir el usuario a chroot_list"
fi

# Configurar vsftpd si no está configurado
if ! grep -q "^chroot_list_enable=YES" "$vsftpd_conf"; then
    echo -e "\n# Configuración para chroot\nchroot_list_enable=YES\nchroot_list_file=$user_list" | sudo tee -a "$vsftpd_conf" > /dev/null || handle_error "No se pudo configurar vsftpd"
fi

# Asegurar que local_enable y write_enable estén activados
sudo sed -i 's/^#*\(local_enable=\).*/\1YES/' "$vsftpd_conf"
sudo sed -i 's/^#*\(write_enable=\).*/\1YES/' "$vsftpd_conf"

# Reiniciar vsftpd para aplicar cambios
sudo systemctl restart vsftpd || handle_error "No se pudo reiniciar vsftpd"

echo "Configuración FTP para el usuario $username completada exitosamente."
exit 0
