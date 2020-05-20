<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["wwNieuw"])){

        $sql = "UPDATE steward SET Wachtwoord = '".$_POST["wwNieuw"]."' WHERE idSteward = ". $_SESSION["idmail"] . "";

        if ($conn->query($sql) === TRUE) {
            
        } else {
          header("location: index.php");
        }
}
}
?>