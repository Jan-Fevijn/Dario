<?php
//Variabelen
$servername = "127.0.0.1";
$username = "root";
$password = "usbw";
$dbname = "project1";

$debug = false;

//Connectie maken
$conn = new mysqli($servername, $username, $password, $dbname);

//Connectie checken
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    if ($debug) echo "alles oke";
}
?>