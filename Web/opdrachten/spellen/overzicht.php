<?php
include 'conn.php';
include 'beveiliging.php';

$sql = "SELECT idspellen, spel FROM spellen";
$spel = "";

$resultaat = $conn->query($sql);

  if ($resultaat->num_rows > 0) {

  while($row = $resultaat->fetch_assoc()){
    $spel = $spel . "<option value='" . $row["idspellen"] . "'>" . $row["spel"] . "</option>";
  }

}


if ($_SERVER["REQUEST_METHOD"] == "GET"){
  if (isset($_GET["game"])) {

    
    $sql = "SELECT idspellen, spel FROM spellen WHERE idspellen = '" . $_GET["game"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['idspellen'] = $row['idspellen'];
      }
    }

    
    $sql = "UPDATE spellen SET idspellen = '" . $_GET["game"]  ."' WHERE idspellen=". $_SESSION["id"] . "";

      if ($conn->query($sql) === TRUE) {
          header("overzicht.php");
      } else {
          echo "fout bij het aanpassen: " . $conn->error;
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
    <link rel="stylesheet" href="CSS/adminupcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>update</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="overzicht.php">home</a>
        <a class="nav-link active" href="toevoegen.php">toevoegen</a>
        <a class="nav-link" href="verwijderen.php">verwijderen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">

<!-- Update -->

<h2>Update</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">spel</th>
        <th scope="col">uitgever</th>
        <th scope="col">aankoopdatum</th>
        <th scope="col">genre</th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT * FROM infogame order by spel";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            

        if (isset($_GET["idspellen"])) {
          if ($_GET["idspellen"] == $row["idspellen"]) {
            $_SESSION["id"] = $row["idspellen"];
        ?>

  <tbody>
      <tr>
        <form action="overzicht.php" name="update" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[0].submit();return false;" href="#">UPDATE</a> </th>
        <td>
        <select name="game">
            <option value = 0><?php echo $row["spel"] ?></option>
            <?php echo $spel?>
        </select>
        </td>
        </form>
        <?php 
          }else{
            ?>
            <th scope="row"><a class="btn btn-outline-primary" href="?idspellen=<?php echo $row["idspellen"] ?>">Aanpassen</a></th>
            <td><?php echo $row["spel"]; ?></td>
            <?php

          }
        }else {
        ?>
        <th scope="row"><a class="btn btn-outline-primary" href="?idspellen=<?php echo $row["idspellen"] ?>">Aanpassen</a></th>
        <td><?php echo $row["spel"]; ?></td>
        <?php
        }
        ?>
        <td><?php echo $row["naam"]; ?></td>
        <td><?php echo $row["aankoopdatum"]; ?></td>
        <td><?php echo $row["genre"]; ?></td>
      </tr>
      <?php
                }
              }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
</body>
</html>