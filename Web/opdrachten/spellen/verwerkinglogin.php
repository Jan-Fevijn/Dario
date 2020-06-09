<?php
include 'conn.php';

function checkLogIn() {
    
    if (isset($_SESSION["loggedIn"])) {
        header("location: overzicht.php");
    } else {
        header("location: login.php");
        $_SESSION["fout"] = "U wachtwoord of email is incorrect!";
    }
    
}

checkLogIn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["email"]) && isset($_POST["Wachtwoord"])){

            $gbr = $_POST["email"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));
            
            $sql_controleGebruiker = "SELECT idpersoon, email, wachtwoord FROM persoon WHERE email = '" . $gbr . "' and Wachtwoord = '" . $ww ."'";
            $result = $conn->query($sql_controleGebruiker);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $_SESSION["loggedIn"] = $row["idpersoon"];
                    checkLogIn();
                }
            } else {
                $_SESSION["loggedIn"] = NULL;
                header('location: login.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } }
?>