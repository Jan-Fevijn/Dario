<?php
include 'conn.php';

function checkLogIn() {
    
    if (isset($_SESSION["loggedIn"])) {
        if(isset($_SESSION['user'])){
        if($_SESSION['user'] == 1) {
            header("location: admin.php");
        } elseif($_SESSION['user'] == 2){
            header("location: Times.php");

        }
    }
    } else {
        header("location: index.php");
    }
    
}


// Start Programma


checkLogIn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Controle op invoer
    //https://www.youtube.com/watch?v=3bGDe0rbImY hashcoding
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"])){

            // controle gbr en ww + guery maken
            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));

            $hashww = password_verify($ww, PASSWORD_DEFAULT);
            
            $sql_controleGebruiker = "SELECT idSteward, Gebruikersnaam, Wachtwoord, User_TypeID FROM steward WHERE Gebruikersnaam = '" . $gbr . "' and Wachtwoord = '" . $ww . "'";
            $result = $conn->query($sql_controleGebruiker);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $_SESSION['user'] = $row['User_TypeID'];
                    $_SESSION["loggedIn"] = $row["idSteward"];
                    checkLogIn();
                }
            } else {
                $_SESSION["loggedIn"] = NULL;
                header('location: index.php?fout=gebruiker niet gevonden of foutief wachtwoord.');
            }
  } }
?>