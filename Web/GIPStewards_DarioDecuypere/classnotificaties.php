<?php
include 'conn.php';

    function fetchAll($query){
        $con = new PDO('mysql:dbname=festivalstewards;host=localhost:3307','root','usbw');
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO('mysql:dbname=festivalstewards;host=localhost:3307','root','usbw');
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

?>