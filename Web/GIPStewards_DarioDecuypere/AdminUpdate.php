<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["Tijd"])) {

    $sql_tijd = "SELECT idTijd,Tijd FROM tijd WHERE Tijd = '" . $_GET["Tijd"] . "'";
    $result = $conn->query($sql_tijd);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['ID'] = $row['idTijd'];
      }
    }
      else {
        echo "niet gevonden";
      }

      
    $sql_update_tijd = "UPDATE shift SET idTijd= '" . $_SESSION['ID']  ."' WHERE idSteward=". $_SESSION["LoggedIn"] . "";

      if ($conn->query($sql_update_tijd) === TRUE) {
          
      } else {
          echo "fout bij het aanpassen: " . $conn->error;
      }
  }

  if (isset($_GET["plaats"])) {

    $sql_plaats = "SELECT idPlaats,afkorting FROM plaats WHERE afkorting = '" . $_GET["plaats"] . "'";
    $result = $conn->query($sql_plaats);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['ID'] = $row['idPlaats'];
      }
    }
      else {
        echo "niet gevonden";
      }

      $sql_update_plaats = "UPDATE shift SET idPlaats= '" . $_SESSION['ID']  ."' WHERE idSteward = ". $_SESSION["LoggedIn"] . "";

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

<!-- Update van tijd -->

  <div id="container" class="container">
  <h2>Tijd veranderen</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tijd</th>
        <th scope="col">Voornaam</th>
        <th scope="col">Naam</th>
        <th scope="col">Dag</th>
        <th scope="col">Plaats</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    $sql = "SELECT * FROM stewardsinfo";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {     
    ?>

      <tr>
      <?php
        if (isset($_GET["idSteward"])) {
          if ($_GET["idSteward"] == $row["idSteward"]) {
            $_SESSION["LoggedIn"] = $row["idSteward"];
        ?>

        <form action="AdminUpdate.php" name="updatetijd" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[0].submit();return false;" href="#">UPDATE</a> </th>
        <td>
        <select name="tijd">
            <option value = 0><-maak uw keuze-></option>
            <option value= 1 name="Tijd"><?php echo $row["Tijd"];?></option>
        </select>
        </td>
        </form>
        <?php 
          }else{
            ?>
            <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
            <td><?php echo $row["Tijd"]; ?></td>
            <?php

          }
        }else {
        ?>
        <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
        <td><?php echo $row["Tijd"]; ?></td>
        <?php
        }
        ?>
        <td><?php echo $row["Voornaam"]; ?></td>
        <td><?php echo $row["Naam"]; ?></td>
        <td><?php echo $row["Dag"]; ?></td>
        <td><?php echo $row["afkorting"]; ?></td>
      </tr>

  <?php 
        }
      }
  ?>
    </tbody>
  </table>


<!-- Update van plaats -->

<h2>Plaats veranderen</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Plaats</th>
        <th scope="col">Voornaam</th>
        <th scope="col">Naam</th>
        <th scope="col">Dag</th>
        <th scope="col">Tijd</th>
      </tr>
    </thead>

  <tbody>

    <?php 
    $sql = "SELECT * FROM stewardsinfo";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {     
    ?>

      <tr>
      <?php
        if (isset($_GET["idSteward"])) {
          if ($_GET["idSteward"] == $row["idSteward"]) {
            $_SESSION["LoggedIn"] = $row["idSteward"];
        ?>
        <form action="AdminUpdate.php" name="updateplaats" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[1].submit();return false;" href="#">UPDATE</a> </th>
        <td>
        <select name="plaats">
            <option value = 0><-maak uw keuze-></option>
            <?php
            If ($_SERVER["REQUEST_METHOD"] == "POST") {

                $sql = "SELECT idPlaats, afkorting FROM plaats";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["idPlaats"] . "'>" . $row["afkorting"] . "</option>";
                  }
        
    }
    else{
        //echo ($sql);
        echo "niets gevonden";
    }
}
?>
        </select>
        </td>
        </form>
        <?php 
          }else{
            ?>
            <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
            <td><?php echo $row["afkorting"]; ?></td>
            <?php

          }
        }else {
        ?>
        <th scope="row"><a class="btn btn-outline-primary" href="?idSteward=<?php echo $row["idSteward"] ?>">Aanpassen</a></th>
        <td><?php echo $row["afkorting"]; ?></td>
        <?php
        }
        ?>
        <td><?php echo $row["Voornaam"]; ?></td>
        <td><?php echo $row["Naam"]; ?></td>
        <td><?php echo $row["Dag"]; ?></td>
        <td><?php echo $row["Tijd"]; ?></td>
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