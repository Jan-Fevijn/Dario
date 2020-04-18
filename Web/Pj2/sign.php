<?php
include 'connectie.php';

function checkLogIn() {
    
    if (isset($_SESSION["loggedIn"])) {
        header("location: overzicht.php");
    } else {
        header("location: index.php");
    }
    
}


// Start Programma


checkLogIn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Controle op invoer
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"])){

            // controle gbr en ww + guery maken
            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));
            
            $sql_controleGebruiker = "SELECT idadmin, gebruikersnaam, wachtwoord,FROM administrator WHERE gebruikersnaam = '" . $gbr . "' and wachtwoord = '" . $ww . "'";
            $result = $conn->query($sql_controleGebruiker);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $_SESSION["loggedIn"] = $row["idadmin"];
                    checkLogIn();
                }
            } else {
                $_SESSION["loggedIn"] = NULL;
                header('location: index.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } }
?>