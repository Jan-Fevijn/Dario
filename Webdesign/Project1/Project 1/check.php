<?php
session_start();

include 'conn.php';

function checkLogIn() {
    if ($_SESSION["loggedIn"] == TRUE) {
        header("location: IO.php");
    } else {
        header("location: inlog.php");
    }
}
checkLogIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Controle op invoer
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"]) && !empty($_POST["Gebruikersnaam"]) && 
        !empty($_POST["Wachtwoord"])){
            
            // controle gbr en ww + guery maken
            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];
            $sql_controleGebruiker = "SELECT idgebruiker, Gebruikersnaam, Wachtwoord FROM gebruiker WHERE Gebruikersnaam = '" . $gbr . "' and Wachtwoord = '" . $ww . "'";
            //echo $sql_controleGebruiker;
            //if ($debug) echo $sql_controleGebruiker;
            $resultaatGebruiker = mysqli_query($conn,$sql_controleGebruiker);

            if ($row = mysqli_fetch_assoc($resultaatGebruiker)){
                echo $row["idgebruiker"];
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["loggedIn"] = $row["idgebruiker"];
                checkLogIn();

            }
            else{
                $_SESSION["loggedIn"] = FALSE;
                checkLogIn();
                header('location: inlog.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } 
}
?>