#!/bin/bash

# Guillermo Torres
# Fecha: mié 03 sep 2025
# Hora: 14:58
# Descripción: 'Installs the UDP Command Listener process in Linux'
# Distribución: Ubuntu 24.04.3 LTS

if [[ $EUID -ne 0 ]]; then
    echo "You need to be root to run this script, please run it with sudo"
    echo "Example: sudo $0"
    exit 1
fi

# Install netcat
echo "Installing netcat.."
sudo apt update -y &>/dev/null
sudo apt install netcat-openbsd -y &>/dev/null
if [[ $? -eq 0 ]]; then
    echo "OK"
fi
# Crear carpetas destino si no existen
sudo mkdir -p /usr/local/bin/udp_command_listener
sudo mkdir -p /etc/udp_command_listener

# Copiar ejecutable y configuración
sudo cp bin/* /usr/local/bin/udp_command_listener/
sudo cp etc/udp_command_listener/* /etc/udp_command_listener/
sudo ln -sf /usr/local/bin/udp_command_listener/udp_receive /usr/bin/udp_receive

# Crear archivo de servicio systemd
sudo tee /etc/systemd/system/udp_command_listener.service > /dev/null <<READ
[Unit]
Description=UDP Command Listener

[Service]
Type=simple
ExecStart=/usr/local/bin/udp_command_listener/udp_receive
Restart=always
User=$USER
WorkingDirectory=/usr/local/bin/udp_command_listener

[Install]
WantedBy=multi-user.target
READ

sudo systemctl daemon-reload
sudo systemctl enable udp_command_listener.service