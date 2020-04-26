<?php
include 'conn.php';

function checkLogIn() {
    
    if (isset($_SESSION["loggedIn"])) {
        if(isset($_SESSION['user'])){
        if($_SESSION['user'] == 1) {
            header("location: overzicht.php");
        } elseif($_SESSION['user'] == 0){
            header("location: IO.php");
        }
    }
    } else {
        header("location: inlog.php");
    }
    
}
checkLogIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Controle op invoer
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"])){

            // controle gbr en ww + guery maken
            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));
            
            $sql_controleGebruiker = "SELECT idpersoon, isAdmin FROM persoon WHERE email = '" . $gbr . "' and Wachtwoord = '" . $ww . "'";
            $result = $conn->query($sql_controleGebruiker);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $_SESSION['user'] = $row['isAdmin'];
                    $_SESSION["loggedIn"] = $row["idpersoon"];
                    checkLogIn();
                }
            } else {
                $_SESSION["loggedIn"] = NULL;
                header('location: inlog.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } }
?>