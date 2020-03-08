<?php
include 'conn.php';

$_SESSION['user'] == 1;

function checkLogIngbr() {
    if ($_SESSION["loggedIn"] == TRUE) {
        header("location: Times.php");
    } else {
        header("location: index.php");
    }
}

function checkloginadmin() {
    if ($_SESSION["user"] == 1) {
        header("location: admin.php");
    } else {
        header("location: Times.php");
    }
}

checkLogIngbr();
checkloginadmin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Controle op invoer
    //https://www.youtube.com/watch?v=3bGDe0rbImY hashcoding
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"]) && !empty($_POST["Gebruikersnaam"]) && 
        !empty($_POST["Wachtwoord"])){
            
            // controle gbr en ww + guery maken
            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));

            $hashww = password_hash($ww, PASSWORD_DEFAULT);
            
            $sql_controleGebruiker = "SELECT idSteward, Gebruikersnaam, Wachtwoord, User_TypeID FROM steward WHERE Gebruikersnaam = '" . $gbr . "' and Wachtwoord = '" . $hashww . "'";

            $resultaatGebruiker = mysqli_query($conn,$sql_controleGebruiker);

            if ($row = mysqli_fetch_assoc($resultaatGebruiker)){
                if ($_SESSION['user'] == $row['User_TypeID']) {
                    checkloginadmin();
                }
                else{
                $_SESSION["loggedIn"] = TRUE;
                $_SESSION["loggedIn"] = $row["idSteward"];
                checkLogIngbr();
                }
            }
            else{
                $_SESSION["loggedIn"] = FALSE;
                checkLogIngbr();
                header('location: index.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } 
}
?>