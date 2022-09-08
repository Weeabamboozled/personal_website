<?php

$servername= "localhost";
$dBUsername= "vcp_admin";
$dBPassword= "8T{qqYQ+z-3Z)25X";
$dBName= "vcp";
// Create connection
$conn = new mysqli($servername, $dBUsername, $dBPassword, $dBName);
// Check connection

if (!$conn) {
    die("Connection Failed: ".$conn->connect_errno);
}

?>


