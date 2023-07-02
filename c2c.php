<?php
// Open a socket connection to the server with timeout set to 10 seconds
$socket = fsockopen("localhost","5038", $errno, $errstr, 10);
if (!$socket) {
    echo "$errstr ($errno)\n";
} else {
    fputs($socket, "Action: Login\r\n");
    fputs($socket, "UserName: user\r\n");
    fputs($socket, "Secret: secret\r\n\r\n");
    //Send an Originate action to create a call
    fputs($socket, "Action: Originate\r\n");
    fputs($socket, "Channel: PJSIP/1001\r\n");
    fputs($socket, "WaitTime: 30\r\n");
    fputs($socket, "CallerId: 1001\r\n");
    //Set the extension to dial
    fputs($socket, "Exten: 1002\r\n");
    fputs($socket, "Context: from-internal\r\n");
    fputs($socket, "Priority: 1\r\n\r\n");

    fputs($socket, "Action: Logoff\r\n\r\n");
    while (!feof($socket)) {
        echo fgets($socket,128);
    }
    fclose($socket);
}
?>
