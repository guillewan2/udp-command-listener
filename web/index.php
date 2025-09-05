<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Panel</title>
    <style>
        :root {
            --primary-color: rgb(33, 34, 33);
            --secondary-color: rgb(65, 65, 65);
            --font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: var(--primary-color);
            color: white;
            font-family: var(--font-family);
        }

        header {
            background-color: var(--secondary-color);
            padding: 20px;
            text-align: center;
        }

        .data_box {
            background-color: var(--secondary-color);
            border-radius: 8px;
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>UDP Messages</h1>
    </header>
    <main>
        <div class="data_box">
            <h2>Received Messages</h2>
            <div class="messages">
                <?php
                    $logfile = trim(shell_exec("bash -c \"cat /etc/udp_command_listener/ucl.conf | grep logfile | cut -d '=' -f2 | cut -d '#' -f1 | tr -d ' \\\"'\""));
                    echo "<p>Logfile is: $logfile</p>";
                ?>
            </div>
            
        </div>
        <div class="data_box">
            <h2>Systemctl Process</h2>
            <!-- Content Here with php-->
            
        </div>
        <div class="data_box">
            <h2>Network Info</h2>
            <!-- Content Here with php-->
    </main>
</body>
</html>