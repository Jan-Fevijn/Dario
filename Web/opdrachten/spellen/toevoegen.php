<?php
include 'conn.php';
include 'beveiliging.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// op keuze te clearen

  if (isset($_POST["Soortinsert"])) {
      $_SESSION["keuzeinsert"] = $_POST["Soortinsert"];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["typeClear"])) {
      $_SESSION["keuzeinsert"] = NULL;
  }
}

// insert van nieuwe steward

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  switch ($_SESSION["keuzeinsert"]) {
    case 1:
    if (isset($_POST["game"],$_POST["uitgever"])){

        $sql = "SELECT iduitgever, Naam FROM uitgever WHERE iduitgever = '" . $_POST["uitgever"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['iduitgever'] = $row['iduitgever'];
      }
    }
      else {
        echo "niet gevonden";
      }

    $sql = "INSERT INTO spellen(spel, uitgever, aankoopdatum) VALUES ('". $_POST["game"] . "','" . $_SESSION["iduitgever"] . "','". $_POST["aankoopdatum"] ."')";

    if ($conn->query($sql) === TRUE) {
      header("location:overzicht.php");
      $_SESSION["gelukt"] = "u game is toegevoegd";
  } else{
    $_SESSION["fout"] = "Er zijn al bestaande gegevens of incorrecte gegevens";
  }
}
  break;

// select van nieuwe ID's

  case 2:
    if (isset($_POST["Steward"],$_POST["tijd"],$_POST["plaats"])){

    $sql = "SELECT idSteward, Voornaam, Naam FROM steward WHERE idSteward = '" . $_POST["Steward"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['IDsteward'] = $row['idSteward'];
      }
    }
      else {
        echo "niet gevonden";
      }

      $sql = "SELECT idTijd, Tijd, dag FROM tijd WHERE idTijd = '" . $_POST["tijd"] . "'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['idtijd'] = $row['idTijd'];
        }
      }
        else {
          echo "niet gevonden";
        }

        $sql = "SELECT idPlaats, afkorting FROM plaats WHERE idPlaats = '" . $_POST["plaats"] . "'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
              $_SESSION['idPlaats'] = $row['idPlaats'];
          }
        }
          else {
            echo "niet gevonden";
          }

// insert van nieuwe shift

  $sql = "INSERT INTO shift (idSteward,idTijd,idPlaats) VALUES ('". $_SESSION['IDsteward'] . "','". $_SESSION['idtijd'] . "','". $_SESSION['idPlaats'] ."')";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["gelukt"] = "u shift is toegevoegd.";
    header("location:admin.php");
  }
break;
  }
}
}
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/algemeen.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Toevoegen</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link" href="overzicht.php">Home</a>
        <a class="nav-link active" href="Toevoegen.php">Toevoegen</a>
        <a class="nav-link" href="verwijderen.php">Verwijderen</a>
        <a class="nav-link" href="uitlenen.php">Uitlenen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

<!--select met form-->
  <div id="container" class="container">
  <form action="toevoegen.php" name="nieuw" method="POST">
    <?php if (!isset($_SESSION["keuzeinsert"])) {?>
      <div class="row d-flex justify-content-center">
        <select name="Soortinsert" class="mx-auto" onchange="this.form.submit()">
            <option value = 0><-maak uw keuze -></option>
            <option value = 1>Nieuwe game</option>
            <option value = 2>Nieuwe uitgever</option>
        </select>
        <?php 
        } else {
            switch ($_SESSION["keuzeinsert"]) {
                case 1:
                    echo "<p>game toevoegen <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                case 2:
                    echo "<p>uitgever toevoegen <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                  }
        ?>
      </div>
        <br>
        <!--invoeren-->
            <?php
            switch ($_SESSION["keuzeinsert"]) {
              //game options
              case 1:
            ?>      
                    <label class="game">Naam Spel:</label>
                    <input type="text" name="game" placeholder="game" class="input">
                    <br>
                    <label class="datum">aankoopdatum:</label>
                    <input type="date" name="aankoopdatum" placeholder="aankoopdatum" class="input">
                    <br>
                    <select name="uitgever">
                        <option value = 0><-Kies een uitgever-></option>
            <?php

                $sql = "SELECT iduitgever,Naam FROM uitgever order by naam";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["iduitgever"] . "'>" .$row["Naam"] ."</option>";
                  }
        
    }
    else{
        echo "niets gevonden";
    }
    ?>
        </select>
        <br>
                    <button type="submit" name="Toevoegen" class="Toevoegen">Toevoegen</button>
                    <?php break;?>
            <?php
            //shift options
              case 2:
            ?>
            <select name="Steward">
            <option value = 0><-Kies een steward-></option>
            <?php

                $sql = "SELECT idSteward, Voornaam, Naam FROM steward order by Voornaam";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["idSteward"] . "'>" . $row["Voornaam"] . " " .$row["Naam"] ."</option>";
                  }
        
    }
    else{
        echo "niets gevonden";
    }
    ?>
        </select>
        <br>

            <select name="tijd">
            <option value = 0><-Kies een tijd-></option>
            <?php

                $sql = "SELECT idTijd, Tijd, dag FROM tijd order by Tijd";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["idTijd"] . "'>" . $row["Tijd"] . " " . $row["Dag"] ."</option>";
                  }
        
    }
    else{
        echo "niets gevonden";
    }
    ?>
        </select>
        <br>

        <select name="plaats">
            <option value = 0><-Kies een plaats-></option>
            <?php

                $sql = "SELECT idPlaats, afkorting FROM plaats order by afkorting";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["idPlaats"] . "'>" . $row["afkorting"] . "</option>";
                  }
        
    }
    else{
        echo "niets gevonden";
    }
    ?>
        </select>
        <br>
                    <button type="submit" name="Toevoegen" class="Toevoegen">Toevoegen</button>
                    <?php break;?>
        <?php
        }
          }
        ?>
  </form>
</div>
</body>
</html>
</body>
</html>