<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["afkorting"])) {

    $sql_tijd = "SELECT idPlaats,afkorting FROM plaats WHERE afkorting = '" . $_GET["afkorting"] . "'";
    $result = $conn->query($sql_tijd);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['ID'] = $row['idPlaats'];
      }
    }
      else {
        echo "niet gevonden";
      }

      $sql = "UPDATE shift SET idPlaats= '" . $_SESSION['ID']  ."' WHERE idSteward = ". $_SESSION["LoggedIn"] . "";

      if ($conn->query($sql) === TRUE) {
          
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
    <title>UpdatePlaats</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdatetijd.php">Update Tijd</a>
        <a class="nav-link active" href="adminupdateplaats.php">Update Plaats</a>
        <a class="nav-link" href="admininsert.php">Personen Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">
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
        <form action="AdminUpdatePlaats.php" name="updatefrm" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[0].submit();return false;" href="#">UPDATE</a> </th>
        <td><input type="text" name="afkorting" value="<?php echo $row["afkorting"]; ?>"></td>
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