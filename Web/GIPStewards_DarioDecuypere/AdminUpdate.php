<?php
include 'conn.php';
include 'security.php';

//Option van plaats
$sql = "SELECT idPlaats, afkorting FROM plaats";
$plaats = "";
$tijd = "";

$resultaat = $conn->query($sql);

  if ($resultaat->num_rows > 0) {

  while($row = $resultaat->fetch_assoc()){
    $plaats = $plaats . "<option value='" . $row["idPlaats"] . "'>" . $row["afkorting"] . "</option>";
  }

}

//option van tijd
$sql = "SELECT idTijd, Tijd, Dag FROM tijd";

$resultaat = $conn->query($sql);

  if ($resultaat->num_rows > 0) {

  while($row = $resultaat->fetch_assoc()){
    $tijd = $tijd . "<option value='" . $row["idTijd"] . "'>" . $row["Tijd"] ." ". $row["Dag"] ."</option>";
  }  
}


if ($_SERVER["REQUEST_METHOD"] == "GET"){
  if (isset($_GET["tijd"])) {

    //select van tijd
    $sql_tijd = "SELECT idTijd,Tijd,Dag FROM tijd WHERE idTijd = '" . $_GET["tijd"] . "'";
    $result = $conn->query($sql_tijd);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['IDtijd'] = $row['idTijd'];
      }
    }

      // update van tijd
    $sql_update_tijd = "UPDATE shift SET idTijd= '" . $_SESSION['IDtijd']  ."' WHERE idSteward=". $_SESSION["LoggedIn"] . "";

      if ($conn->query($sql_update_tijd) === TRUE) {
          
      } else {
          echo "fout bij het aanpassen: " . $conn->error;
      }
  }

  if (isset($_GET["plaats"])) {

    //select van plaats
    $sql_plaats = "SELECT idPlaats,afkorting FROM plaats WHERE idPlaats = '" . $_GET["plaats"] . "'";
    $result = $conn->query($sql_plaats);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['IDplaats'] = $row['idPlaats'];
      }
    }

      //update van plaats
      $sql_update_plaats = "UPDATE shift SET idPlaats= '" . $_SESSION['IDplaats']  ."' WHERE idSteward = ". $_SESSION["LoggedIn"] . "";

      if ($conn->query($sql_update_plaats) === TRUE) {
          
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
    <title>UpdateTijd</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link active" href="adminupdatetijd.php">Update</a>
        <a class="nav-link" href="admininsert.php">Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">

<!-- Update -->

<h2>Update shift</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tijd</th>
        <th scope="col">plaats</th>
        <th scope="col">voornaam</th>
        <th scope="col">naam</th>
        <th scope="col">dag</th>
      </tr>
    </thead>
    <?php
        $sql = "SELECT * FROM stewardsinfo order by Voornaam";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            

        if (isset($_GET["idSteward"])) {
          if ($_GET["idSteward"] == $row["idSteward"]) {
            $_SESSION["LoggedIn"] = $row["idSteward"];
        ?>

  <tbody>
      <tr>
        <form action="AdminUpdate.php" name="update" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[0].submit();return false;" href="#">UPDATE</a> </th>
        <td>
        <select name="tijd">
            <option value = 0><?php echo $row["Tijd"] ?></option>
            <?php echo $tijd?>
        </select>
        </td>
        <td>
        <select name="plaats">
            <option value = 0><?php echo $row["afkorting"] ?></option>
            <?php echo $plaats?>
        </select>
        </td>
        </form>
        <?php 
          }else{
            ?>
            <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
            <td><?php echo $row["Tijd"]; ?></td>
            <td><?php echo $row["afkorting"]; ?></td>
            <?php

          }
        }else {
        ?>
        <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
        <td><?php echo $row["Tijd"]; ?></td>
        <td><?php echo $row["afkorting"]; ?></td>
        <?php
        }
        ?>
        <td><?php echo $row["Voornaam"]; ?></td>
        <td><?php echo $row["Naam"]; ?></td>
        <td><?php echo $row["Dag"]; ?></td>
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