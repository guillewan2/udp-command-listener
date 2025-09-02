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
```
It is important to set a strong secret key to prevent unauthorized access to the command execution functionality, but it is not required. You can leave it empty if you don't need authentication.

## Usage
To use the UDP Command Listener, follow these steps:

1. Configure the `ucl.conf` file with the desired settings.
2. Start the listener by running the appropriate command (e.g., `./udp_command_listener`, `systemctl start udp_command_listener`).
3. Send UDP packets to the specified port with the commands you want to execute on the device.

## Installation
This is a WIP, please wait for the latest version for the installation instructions.

## Examples of Use
### NFC Automatization
You can use an NFC-enabled device to send commands to the UDP Command Listener. For example, you could configure your NFC tags to send specific commands when scanned, allowing for seamless automation of tasks. With an android device, you can use apps like Tasker or NFC Tools to create automations that trigger UDP packets to be sent to the listener.


