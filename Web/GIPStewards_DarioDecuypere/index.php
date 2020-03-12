<?php
include 'conn.php';

function Registreer() {
  if (isset($_SESSION["loggedIn"])) {
    if (isset($_POST["gbnaam"]) && isset($_POST["ww"])){

      $gebruiker = $_POST["gbnaam"];
      $wachtwoord = $_POST["ww"];
    
      $gebruiker = strip_tags(mysqli_real_escape_string($conn, trim($gebruiker)));
      $wachtwoord = strip_tags(mysqli_real_escape_string($conn, trim($wachtwoord)));
    
      $hashww = password_hash($wachtwoord, PASSWORD_DEFAULT);
    
      $sqli_insert = "INSERT INTO `steward` (`Gebruikersnaam`,`Wachtwoord`" . "
      VALUES ('" . "" . $gebruiker . "' " . ",'" . $hashww ."')";
    
      if ($conn->query($sqli_insert) === TRUE) {
        echo "aanpassing gelukt";
      }
      else{
        header('location: registration.php?fout= Niet gimporteerd');
      }
    }
  }
}

    If ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["Voornaam"]) && isset($_POST["Achternaam"])){

        // controle gbr en ww + guery maken
        $VN = $_POST["Voornaam"];
        $AN = $_POST["Achternaam"];

        $VN = strip_tags(mysqli_real_escape_string($conn, trim($VN)));
        $AN = strip_tags(mysqli_real_escape_string($conn, trim($AN)));
        
        $sql_naam = "SELECT idSteward, Voornaam, Naam FROM steward WHERE Voornaam = '" . $VN . "' and Naam = '" . $AN . "'";
        $result = $conn->query($sql_naam);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
              $_SESSION['loggedIn'] == $row['idSteward'];
              Registreer();
            }
            }
            else {
              header('location: registration.php?fout=Ingegeven voornaam of naam niet correct.');
            }
    } 
  }
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>Sign Up</title>
</head>
<body class="text-center">
    <form class="form-signin" action="SignIn.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
  <label for="inputEmail" class="sr-only">Gebruikersnaam</label>
  <input type="text" name="Gebruikersnaam" class="form-control" placeholder="Gebruikersnaam" required>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="Wachtwoord" class="form-control" placeholder="Wachtwoord" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
  <a href="registration.php" class="Vergeten">Registreer</a>
</form>
</body>
</html>