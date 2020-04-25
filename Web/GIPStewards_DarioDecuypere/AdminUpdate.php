<?php
include 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["Soortupdate"])) {
        $_SESSION["Keuze"] = $_POST["Soortupdate"];
    }
  
    if (isset($_POST["NaamPersoon"])) {
        $_SESSION["keuzepersoon"] = $_POST["NaamPersoon"];
    }

    if (isset($_POST["dag"])) {
        $_SESSION["keuzedag"] = $_POST["dag"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["typeClear"])) {
        $_SESSION["Keuze"] = NULL;
        $_SESSION["keuzepersoon"] = NULL;
    }
  
    if (isset($_GET["KeuzeClear"])){
        $_SESSION["keuzepersoon"] = NULL;
        $_SESSION["keuzedag"] = NULL;
    }
  }



  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_SESSION["keuze"]) {
        case 1:
    if (isset($_POST["tijd"])) {
  
      $sql_tijd = "SELECT idTijd,Tijd FROM tijd WHERE Tijd = '" . $_POST["tijd"] . "'";
      $result = $conn->query($sql_tijd);
  
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['IDtijd'] = $row['idTijd'];
        }
      }
        else {
          echo "niet gevonden";
        }
  
        
      $sql = "UPDATE shift SET idTijd= '" . $_SESSION['IDtijd']  ."' WHERE idSteward=". $_SESSION["loggedin"] . "";
  
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "fout bij het aanpassen: " . $conn->error;
        }
    }
break;
  
  case 2:
    if (isset($_POST["afkorting"])) {
  
      $sql_tijd = "SELECT idPlaats,afkorting FROM plaats WHERE afkorting = '" . $_POST["Plaats"] . "'";
      $result = $conn->query($sql_tijd);
  
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['IDplaats'] = $row['idPlaats'];
        }
      }
        else {
          echo "niet gevonden";
        }
  
        $sql = "UPDATE shift SET idPlaats= '" . $_SESSION['IDplaats']  ."' WHERE idSteward = ". $_SESSION["loggedin"] . "";
  
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "fout bij het aanpassen: " . $conn->error;
        }
    }
break;
}
  }
?>
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/adminupcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>UpdateTijd</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link active" href="adminupdate.php">Update Tijd</a>
        <a class="nav-link" href="admininsert.php">Personen Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">
  <form action="AdminUpdate.php" name="nieuw" method="POST">
    <?php if (!isset($_SESSION["keuze"])) {?>
        <select name="Soortupdate" onchange="this.form.submit()">
            <option value = 0><-maak uw keuze -></option>
            <option value = 1>Update Tijd</option>
            <option value = 2>Update Plaats</option>
        </select>
        <?php 
        } else {
          

            switch ($_SESSION["keuze"]) {
                case 1:
                    echo "<p>Update Tijd <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                case 2:
                    echo "<p>Update Plaats <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
            }

            if (!isset($_SESSION["keuzepersoon"])){
?>
            <select name="NaamPersoon" onchange="this.form.submit()">
            <option ><- maak uw keuze -></option>
<?php
            switch ($_SESSION["keuze"]) {
                case 1:
                $sql = "SELECT * FROM steward;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {     
                        echo "<option value='".$row["idSteward"]."'>" . $row["Voornaam"]. $row["Naam"].  "</option>";
                    }
                }
            break;

            case 2:
                $sql = "SELECT * FROM steward;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {     
                        echo "<option value='".$row["idSteward"]."'>" . $row["Voornaam"]. $row["Naam"].  "</option>";
                    }
                }
            break;
            }
?>
            </select>
<?php
            }else{

                echo "<p>". $row["Voornaam"] . $row["Naam"] ." <a class='btn btn-outline-primary' href='?KeuzeClear=1'>CLEAR</a></p>";

                if (!isset($_SESSION["keuzedag"])){
?>


            <select name="dag" onchange="this.form.submit()">
            <option ><- maak uw keuze -></option>
<?php
            switch ($_SESSION["keuze"]) {
              case 1:
                $sql = "SELECT * FROM tijd;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {    
                        echo "<option value='".$row["idTijd"]."'>" .$row["dag"]. "</option>";
                    }
                }
                  break;
              case 2:
                $sql = "SELECT * FROM tijd;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {    
                        echo "<option value='".$row["idTijd"]."'>" .$row["dag"]. "</option>";
                    }
                }
                  break;
          }
?>
            </select>
<?php
            } else{

                echo "<p>". $row["dag"] . " <a class='btn btn-outline-primary' href='?KeuzeClear=1'>CLEAR</a></p>";
?>
<?php
            switch ($_SESSION["keuze"]) {
              case 1:
?>
              <p> <span>Tijd: </span><input type="text" name="tijd"></p>
                <p><input type="submit" name="compleettijd" value="verzenden"></p>
                <?php break;?>

            <?php
              case 2:
            ?>
               <p> <span>Plaats: </span><input type="text" name="plaats"></p>
                <p><input type="submit" name="compleetplaats" value="verzenden"></p>
              <?php break;?>
<?php
    }
?>
<?php
            }
            }
        }
?>
    </form>
</div>
</body>
</html>
</body>
</html>