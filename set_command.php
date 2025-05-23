<?php
    // set_command.php
    // This script allows you to set the command that the ESP8266 will receive.
    // Access this script via your web browser, e.g.,
    // http://your-web-hosting-domain.com/set_command.php?cmd=LED_ON
    // http://your-web-hosting-domain.com/set_command.php?cmd=LED_OFF

    $commandFile = 'gpio_command.txt'; // The file to store the command

    // Check if the 'cmd' parameter is present in the URL
    if (isset($_GET['cmd'])) {
        $newCommand = htmlspecialchars($_GET['cmd']); // Sanitize the input
        // Write the new command to the file
        if (file_put_contents($commandFile, $newCommand) !== false) {
            echo "Command '$newCommand' set successfully for ESP8266.";
        } else {
            echo "Error: Could not write command to file. Check file permissions for '$commandFile'.";
        }
    } else {
        // If no 'cmd' parameter, show usage instructions
        echo "Usage: Access this page with a 'cmd' parameter in the URL.<br>";
        echo "Example to turn LED ON: <a href='?cmd=LED_ON'>?cmd=LED_ON</a><br>";
        echo "Example to turn LED OFF: <a href='?cmd=LED_OFF'>?cmd=LED_OFF</a>";
    }
    ?>