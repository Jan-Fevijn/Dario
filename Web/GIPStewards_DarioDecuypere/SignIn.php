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
        $_SESSION["fout"] = "U wachtwoord of gebruikersnaam is incorrect!";
    }
    
}

checkLogIn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["Gebruikersnaam"]) && isset($_POST["Wachtwoord"])){

            $gbr = $_POST["Gebruikersnaam"];
            $ww = $_POST["Wachtwoord"];

            $gbr = strip_tags(mysqli_real_escape_string($conn, trim($gbr)));
            $ww = strip_tags(mysqli_real_escape_string($conn, trim($ww)));
            
            $sql_controleGebruiker = "SELECT idSteward, email, Wachtwoord, User_TypeID FROM steward WHERE email = '" . $gbr . "' and Wachtwoord = '" . md5($ww) ."'";
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