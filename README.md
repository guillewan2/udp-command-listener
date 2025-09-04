# UDP Command Listener
## Introduction
The UDP Command Listener is a tool designed to receive and execute commands sent over a UDP connection on linux devices. It listens for incoming UDP packets on a specified port and processes the commands contained within those packets. This tool is particularly useful for remote command execution and automation tasks.

## Configuration
The behavior of the UDP Command Listener can be configured using the `ucl.conf` configuration file. This file allows you to specify various settings, including the listening port and any authentication secrets.
### Configuration File: `ucl.conf`
The configuration file looks like this:
```
#--------------------------------------------
# Configuration file for UDP Command Listener-
#--------------------------------------------

PORT=15000 # UDP listening port
SECRET= # Secret key to authorize command execution
....
```
It is important to set a strong secret key to prevent unauthorized access to the command execution functionality, but it is not required. You can leave it empty if you don't need authentication.

#### Whitelist and Blacklist
The UDP Command Listener has a whitelist and a blacklist for controlling which commands are allowed or denied. For obvious reasons, you can't have both of them functioning at the same time.

##### Whitelist
The whitelist is a list of commands that are explicitly allowed to be executed. If a command is not on the whitelist, it will be denied. It looks like this
```conf
whitelisted_commands_ON=true # Enable whitelisted commands
whitelisted_commands=( # Commands with spaces
    ls -lah
    shutdown -h now
) 
```

The program checks if every word in the command is in the whitelist before allowing execution. You need to introduce the complete command on the whitelist.

##### Blacklist
The blacklist is a list of commands that are explicitly denied from being executed. If a command is on the blacklist, it will be denied regardless of the whitelist settings. It looks like this
```conf
banned_commands_ON=true # Enable banned commands
banned_commands=( # Commands with spaces
    shutdown
    reboot
    sl
)
```

## Usage
To use the UDP Command Listener, follow these steps:

1. Configure the `ucl.conf` file with the desired settings.
2. Start the listener by running the appropriate command (e.g., `./udp_command_listener`, `systemctl start udp_command_listener`).
3. Send UDP packets to the specified port with the commands you want to execute on the device.

## Installation
To install it, you need to run the installation script as root:

```bash
sudo ./install.sh
```
This will install the binaries to `/usr/local/bin/udp_command_listener/` and the configuration to `/etc/udp_command_listener/`. It will also create the systemd service and a shortcut in `/usr/bin/udp_receive`.

### Systemd Service

To start the service:
```bash
sudo systemctl start udp_command_listener.service
```
To enable the service at boot:
```bash
sudo systemctl enable udp_command_listener.service
```
To check the status:
```bash
sudo systemctl status udp_command_listener.service
```

### Shortcut

You can run the listener manually from anywhere with:
```bash
udp_receive
```

### Edit Configuration

To edit the configuration:
```bash
sudo udp_receive --config
```
This will open the `/etc/udp_command_listener/ucl.conf` file in the editor defined by the `PREFERRED_EDITOR` variable.

<br><br>


## Examples of Use
### NFC Automatization
You can use an **NFC-enabled device** to send commands to the UDP Command Listener. For example, you could configure your NFC tags to send specific commands when scanned, allowing for *seamless automation* of tasks. With an android device, you can use apps like **Tasker** or **NFC Tools** to create automations that trigger UDP packets to be sent to the listener.