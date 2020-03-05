<?php
session_start();

include 'conn.php';

function checkLogIn() {
    if ($_SESSION["loggedIn"] == TRUE) {
        header("location: Times.php");
    } else {
        header("location: index.php");
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
            $sql_controleGebruiker = "SELECT idSteward, Gebruikersnaam, Wachtwoord FROM steward WHERE Gebruikersnaam = '" . $gbr . "' and Wachtwoord = '" . $ww . "'";
            $sql_controleAdmin = "SELECT idSteward, Gebruikersnaam, Wachtwoord FROM steward WHERE Gebruikersnaam = '" . "admin" . "' and Wachtwoord = '" . "admin" . "'";
            //echo $sql_controleGebruiker;
            //if ($debug) echo $sql_controleGebruiker;
            $resultaatGebruiker = mysqli_query($conn,$sql_controleGebruiker);
            $resultaatAdmin = mysqli_query($conn,$sql_controleAdmin);

            if ($row = mysqli_fetch_assoc($resultaatGebruiker)){
                echo $row["idSteward"];
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["loggedIn"] = $row["idSteward"];
                checkLogIn();

            }
            elseif ($row = mysqli_fetch_assoc($resultaatAdmin)){
                echo $row["idSteward"];
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["loggedIn"] = $row["idSteward"];
                header('location: admin.php');
            }
            else{
                $_SESSION["loggedIn"] = FALSE;
                checkLogIn();
                header('location: index.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } 
}
?>