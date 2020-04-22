<?php
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "usbw";
    $dbname = "project3";
    $port = "3307";

    $debug = false;

    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>