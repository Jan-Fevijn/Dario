<?php
include 'conn.php';
?>

<?php
 if (isset($_GET["Toevoegen"])){
  $sql = "INSERT INTO stewardsinfo (idSteward,Voornaam,Naam) VALUES (". $_GET["Stewardid"] ."," . $_GET["Voornaam"] . ",". $_GET["Naam"] .")";

  if ($conn->query($sql) === TRUE) {
      header("location:admin.php");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
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
      <h3 class="masthead-brand">Admin Bijvoegen</h3>
      <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdateTijd.php">Update Tijd</a>
        <a class="nav-link" href="adminupdatePlaats.php">Update Plaats</a>
        <a class="nav-link active" href="admininsert.php">Personen Toevoegen</a>
        <a class="nav-link" href="index.php">Uitloggen</a>
      </nav>
    </div>
  </header>
  <form action="AdminInsert.php" method="GET" class="Toevoegen">
  <h4>Persoon toevoegen</h4>
  <label class="Stewardid">ID:</label>
  <input type="text" name="Stewardid" placeholder="ID" class="input">
  <br>
  <label class="Voornaam">Voornaam:</label>
  <input type="text" name="Voornaam" placeholder="Voornaam" class="input">
  <br>
  <label class="Naam">Naam:</label>
  <input type="text" name="Naam" placeholder="Naam" class="input">
  <br>
  <label class="Tijd">Tijd:</label>
  <input type="text" name="Tijd" placeholder="Tijd" class="input">
  <br>
  <label class="Dag">Dag:</label>
  <input type="text" name="Dag" placeholder="Dag" class="input">
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