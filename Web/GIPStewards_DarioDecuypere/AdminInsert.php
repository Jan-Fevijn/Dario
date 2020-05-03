 <?php
include 'conn.php';
?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["Soortinsert"])) {
      $_SESSION["keuzeinsert"] = $_POST["Soortinsert"];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["typeClear"])) {
      $_SESSION["keuzeinsert"] = NULL;
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_SESSION["keuzeinsert"]) {
    case 1:
    if (isset($_POST["Voornaam"],$_POST["Naam"],$_POST["telefoon"],$_POST["email"],$_POST["wachtwoord"])){

    $sql = "INSERT INTO steward(Voornaam, Naam, Telefoonnummer, email, Wachtwoord) VALUES ('". $_POST["Voornaam"] . ",". $_POST["Naam"] . ",". $_POST["telefoon"] . $_POST["email"] . "," . md5($_POST["wachtwoord"]) ."')";

    if ($conn->query($sql) === TRUE) {
      header("location:admin.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
  break;


  case 2:
    $sql = "SELECT idsteward, Voornaam, Naam FROM steward WHERE Voornaam = '" . $_POST["Stewardbes"] . "' or Naam = '" . $_POST["Stewardbes"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['IDsteward'] = $row['idSteward'];
      }
    }
      else {
        echo "stewardid niet gevonden";
      }

  $sql = "INSERT INTO shift (idSteward,idTijd,idPlaats) VALUES ('". $_SESSION['IDsteward'] . ",". $_SESSION['IDTijdnieuw'] . ",". $_SESSION['IDPlaatsnieuw'] ."')
  SELECT idSteward, voornaam, naam, idTijd, Tijd, idPlaats, afkorting From steward
  JOIN tijd on idTijd = idTijd
  JOIN plaats on idPlaats = idPlaats";

  if ($conn->query($sql) === TRUE) {
    echo "gelukt!";
    header("location:admin.php");
  }
break;
  }
}

  //$sql_select = "SELECT idSteward,voornaam,naam FROM steward Where idSteward = '" . $_GET["Steward"] . "'";
  //$sql_select = "SELECT idTijd,Tijd FROM tijd Where idTijd = '" . $_GET["Tijd"] . "'";
  //$sql_select = "SELECT idPlaats,afkorting FROM plaats Where idPlaats = '" . $_GET["Plaats"] . "'";

  //$result = $conn->query($sql_select);

  //if ($result->num_rows > 0) {
      //while($row = $result->fetch_assoc()){
        //$_SESSION["Steward"] = $row['idSteward'];
        //$_SESSION["Tijd"] = $row['idTijd'];
       // $_SESSION["Plaats"] = $row['idPlaats'];
       // echo "test";
     // }
  //} else {
    //echo "niet gevonden";
  //}*
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/adminincss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Toevoegen Personen</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdate.php">Update</a>
        <a class="nav-link active" href="admininsert.php">Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">
  <form action="Admininsert.php" name="nieuw" method="POST">
    <?php if (!isset($_SESSION["keuzeinsert"])) {?>
        <select name="Soortinsert" onchange="this.form.submit()">
            <option value = 0><-maak uw keuze -></option>
            <option value = 1>Nieuwe steward toevoegen</option>
            <option value = 2>Nieuwe shift toevoegen</option>
        </select>
        <?php 
        } else {
            switch ($_SESSION["keuzeinsert"]) {
                case 1:
                    echo "<p>Steward toevoegen <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                case 2:
                    echo "<p>shift toevoegen <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                  }
        ?>
            <?php
            switch ($_SESSION["keuzeinsert"]) {
              case 1:
            ?>      
                    <label class="vn">Voornaam:</label>
                    <input type="text" name="Voornaam" placeholder="Voornaam" class="input">
                    <br>
                    <label class="an">Naam:</label>
                    <input type="text" name="Naam" placeholder="Naam" class="input">
                    <br>
                    <label class="tele">Telefoonnummer:</label>
                    <input type="text" name="telefoon" placeholder="telefoonnummer" class="input">
                    <br>
                    <label class="email">email:</label>
                    <input type="text" name="email" placeholder="email" class="input">
                    <br>
                    <label class="wachtwoord">wachtwoord:</label>
                    <input type="text" name="wachtwoord" placeholder="wachtwoord" class="input">
                    <br>
                    <button type="submit" name="Toevoegen" class="Toevoegen">Toevoegen</button>
                    <?php break;?>
            <?php
              case 2:
            ?>
                <label class="Tijd"> bestaande Steward:</label>
                    <input type="text" name="Stewardbes" placeholder="Steward" class="input">
                    <br>
                    <label class="Dag">Tijd:</label>
                    <input type="text" name="Tijdbes" placeholder="Tijd" class="input">
                    <br>
                    <label class="Plaats">Plaats:</label>
                    <input type="text" name="Plaatsbes" placeholder="Plaats" class="input">
                    <br>
                    <button type="submit" name="Toevoegen" class="Toevoegen">Toevoegen</button>
                    <?php break;?>
        <?php
            }
            }
        ?>
</div>
</body>
</html>
</body>
</html>