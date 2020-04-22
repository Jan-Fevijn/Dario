<?php
include 'connectie.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["keuze"])) {
      $_SESSION["keuzetype"] = $_POST["keuze"];
  }

  if (isset($_POST["typeGerEve"])) {
      $_SESSION["keuzetypeGerEve"] = $_POST["typeGerEve"];
  }



  if (isset($_POST["eveger"])){
    switch ($_SESSION["keuzetype"]) {
      case 1:
      $sql = "INSERT INTO evenmenten (naameve,dagen, aantal) VALUES ". $_POST["eveger"] . ",". $_POST["Dagen"] . ",". $_POST["Personen"] .")";

      if ($conn->query($sql) === TRUE) {
        header("location:evenementaanmaken.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      break;

      case 2:
        $sql = "INSERT INTO gerecht (naamger) VALUES (". $_POST["eveger"] .")";

        if ($conn->query($sql) === TRUE) {
          header("location:evenementaanmaken.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  break;
  }




  switch ($_SESSION["keuzetype"]) {
    case 1:
      $sql_select = "SELECT idevenementen from evenementen where naameve = ". $_POST["eveger"] ." ";
    
      $result = $conn->query($sql_select);
    
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {     
           $_SESSION["id"] = $row["idevenementen"];
        }
    }
    else{
      echo "niet gelukt";
    }

    $sql = "INSERT INTO gerechtevenement (idgerecht,idevenementen) VALUES (". $_SESSION["keuzetypeGerEve"] .",". $_SESSION["id"] . ")";

    if ($conn->query($sql) === TRUE) {
      header("location:overzicht.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
    break;

    case 2:

      $sql_select = "SELECT idgerecht from gerecht where naamger =  ". $_POST["eveger"] ."";
    
      $result = $conn->query($sql_select);
    
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {     
           $_SESSION["id"] = $row["idgerecht"];
        }
    }
    else{
      echo "niet gelukt";
    }

      $sql = "INSERT INTO gerechtevenement (idevenementen,idgerecht) VALUES (". $_SESSION["keuzetypeGerEve"] .",". $_SESSION["id"] .")";

      if ($conn->query($sql) === TRUE) {
        header("location:evenementaanmaken.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
break;
}
}
} 


if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["typeClear"])) {
      $_SESSION["keuzetype"] = NULL;
      $_SESSION["keuzetypeGerEve"] = NULL;
  }

  if (isset($_GET["KeuzeClear"])){
      $_SESSION["keuzetypeGerEve"] = NULL;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/algcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>EvenementAanmaken</title>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="overzicht.php">Home</a>
        <a class="nav-link active" href="evenementaanmaken.php">Evenement en gerechten Aanmaken</a>
        <a class="nav-link" href="gerechtenaanpassenprod.php">Producten Aanpassen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">
    <form action="evenementaanmaken.php" name="nieuw" method="POST">
    <?php if (!isset($_SESSION["keuzetype"])) {?>
        <select name="keuze" onchange="this.form.submit()">
            <option value="0"><-maak uw keuze -></option>
            <option value="1">Gerechten</option>
            <option value="2">Evenementen</option>
        </select>
        <?php 
        } else {

// hier komt je enkel als je een type hebt gekozen            

            switch ($_SESSION["keuzetype"]) {
                case 1:
                    echo "<p>Gerechten <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
                case 2:
                    echo "<p>Evenementen <a class='btn btn-outline-primary' href='?typeClear=1'>CLEAR</a></p>";
                    break;
            }

            if (!isset($_SESSION["keuzetypeGerEve"])){
?>
            <select name="typeGerEve" onchange="this.form.submit()">
            <option ><- maak uw keuze -></option>
<?php
            switch ($_SESSION["keuzetype"]) {
              case 1:
                $sql = "SELECT * FROM gerecht;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {    
                        echo "<option value='".$row["idgerecht"]."'>" .$row["naamger"]. "</option>";
                    }
                }
                  break;
              case 2:
                $sql = "SELECT * FROM evenementen;";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {    
                        echo "<option value='".$row["idevenementen"]."'>" .$row["naameve"]. "</option>";
                    }
                }
                  break;
          }
?>
            </select>
<?php
            } else{

                echo "<p>". $_SESSION["keuzetypeGerEve"] . " <a class='btn btn-outline-primary' href='?KeuzeClear=1'>CLEAR</a></p>";
?>
<?php
            switch ($_SESSION["keuzetype"]) {
              case 1:
?>
              <p> <span>Evenement: </span><input type="text" name="eveger"></p>
                <p> <span>Dagen: </span><input type="text" name="Dagen" pattern="^\d*(\.\d{0,2})?$"></p>
                <p> <span>Personen: </span><input type="text" name="Personen" pattern="^\d*(\.\d{0,2})?$"></p>
                <p><input type="submit" name="compleet" value="verzenden"></p>
                <?php break;?>

            <?php
              case 2:
            ?>
               <p> <span>Gerecht: </span><input type="text" name="eveger"></p>
                <p><input type="submit" name="compleet" value="verzenden"></p>
              <?php break;?>
<?php
    }
?>

<?php
            }
        }
?>

</form>
</div>
</body>
</html>