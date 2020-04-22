<?php
include 'conn.php';

function checkLogIn() {
    
    if (isset($_SESSION["loggedIn"])) {
        header("location: overzichtbrood.php");
    } else {
        header("location: index.php");
    }
    
}


// Start Programma


checkLogIn();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Controle op invoer
    
    if (isset($_POST["KlantCode"])){

            // controle code
            $code = $_POST["KlantCode"];

            $code = strip_tags(mysqli_real_escape_string($conn, trim($code)));
            
            $sql_controleCode = "SELECT idklant, klantcode FROM klant WHERE klantcode = '" . $code . "'";
            $result = $conn->query($sql_controleCode);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                    $_SESSION["loggedIn"] = $row["idklant"];
                    checkLogIn();
                }
            } else {
                $_SESSION["loggedIn"] = NULL;
                header('location: index.php?fout=Code niet gevonden');
            }
  } }
?>