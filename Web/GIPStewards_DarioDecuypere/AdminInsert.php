<?php
include 'conn.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
 if (isset($_GET["Steward"], $_GET["Tijd"], $_GET["Plaats"]) ){

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


  $sql = "INSERT INTO shift (idSteward,idTijd,idPlaats) VALUES ('". $_GET["Steward"] . ",". $_GET["Tijd"] . ",". $_GET["Plaats"] ."')
  SELECT idSteward, voornaam, naam, idTijd, Tijd, idPlaats, afkorting From steward
  JOIN tijd on idTijd = idTijd
  JOIN plaats on idPlaats = idPlaats";

  if ($conn->query($sql) === TRUE) {
    echo "gelukt!";
    header("location:admin.php");
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
        <a class="nav-link" href="adminupdateTijd.php">Update Tijd</a>
        <a class="nav-link" href="adminupdatePlaats.php">Update Plaats</a>
        <a class="nav-link active" href="admininsert.php">Personen Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>
  <form action="AdminInsert.php" method="GET" class="Toevoegen">
  <label class="Tijd">Steward:</label>
  <input type="text" name="Steward" placeholder="Steward" class="input">
  <br>
  <label class="Dag">Tijd:</label>
  <input type="text" name="Tijd" placeholder="Tijd" class="input">
  <br>
  <label class="Plaats">Plaats:</label>
  <input type="text" name="Plaats" placeholder="Plaats" class="input">
  <br>
  <button type="submit" name="Toevoegen" class="Toevoegen">Toevoegen</button>
</div>
</body>
</html>
</body>
</html>