<?php
include 'conn.php';

//define('DBINFO', 'mysql:host=localhost;dbname=festivalstewards');
//define('DBUSER','root');
//define('DBPASS','usbw');

    function fetchAll($query){
        $con = new PDO('mysql:host=localhost;dbname=festivalstewards','root','usbw');
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO('mysql:host=localhost;dbname=festivalstewards','root','usbw');
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>