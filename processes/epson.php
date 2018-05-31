<?php
error_reporting(E_ALL);

/* Get the port for the service. */
$port = "";

/* Get the IP address for the target host. */
$host = "xxx.xx.xxx.xxx";

/* construct the label */
$mrn = "";
$registration_date = "d/m/y";
$dob = "d/m/y";
$gender = "";
$nursing_station = "";
$room = "";
$bed = "";
$lastname = "Lastname";
$firstname = "Firstname";
$visit_id = "";



$label .= "\n\n\n\n\n\n\ntest\n\n\n\n";
$label .= "\n\n\n\n\n\n\n\n\n\n\n\n\n\n";
$label .= chr(27).chr(105);
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error    ()) . "\n";
} else {
    echo "OK.\n";
}

echo "Attempting to connect to '$host' on port '$port'...";
$result = socket_connect($socket, $host, $port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror    (socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}

socket_write($socket, $label, strlen($label));
socket_close($socket);

?>
