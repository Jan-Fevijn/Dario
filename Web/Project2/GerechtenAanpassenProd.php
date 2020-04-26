<?php
include 'connectie.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET["naamproduct"])) {

    $sql_prod = "SELECT idproduct,naamprod FROM product WHERE naamprod = '" . $_GET["naamproduct"] . "'";
    $result = $conn->query($sql_prod);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION['ID'] = $row['idproduct'];
      }
    }
      else {
        echo "niet gevonden";
      }

      
    $sql = "UPDATE gerechtproduct SET idproduct= '" . $_SESSION['ID']  ."' WHERE idgerechtproduct=". $_SESSION["actief"] . "";

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
    <link rel="stylesheet" href="CSS/algcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>ProductAanpassing</title>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="overzicht.php">Home</a>
        <a class="nav-link" href="evenementaanmaken.php">Evenement en gerechten Aanmaken</a>
        <a class="nav-link active" href="gerechtenaanpassenprod.php">Producten Aanpassen</a>
      </nav>
    </div>
  </header>

  <div id="container" class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Gerecht</th>
        <th scope="col">Hoeveelheid</th>
        <th scope="col">Eenheid</th>
      </tr>
    </thead>
    <tbody>

    <?php 
    $sql = "SELECT * FROM prodger";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {     
    ?>

      <tr>
      <?php
        if (isset($_GET["idgerechtproduct"])) {
          if ($_GET["idgerechtproduct"] == $row["idgerechtproduct"]) {
            $_SESSION["actief"] = $row["idgerechtproduct"];
        ?>
        <form action="gerechtenaanpassenprod.php" name="updatefrm" methode="GET">
        <th scope="row"><a class="btn btn-outline-primary" onclick="document.forms[0].submit();return false;" href="#">UPDATE</a> </th>
        <td><input type="text" name="naamproduct" value="<?php echo $row["naamprod"]; ?>"></td>
        </form>
        <?php 
          }else{
            ?>
            <th scope="row"><a class="btn btn-outline-primary" href="?idgerechtproduct=<?php echo $row["idgerechtproduct"] ?>">Aanpassen</a></th>
            <td><?php echo $row["naamprod"]; ?></td>
            <?php

          }
        }else {
        ?>
        <th scope="row"><a class="btn btn-outline-primary" href="?idgerechtproduct=<?php echo $row["idgerechtproduct"] ?>">Aanpassen</a></th>
        <td><?php echo $row["naamprod"]; ?></td>
        <?php
        }
        ?>
        <td><?php echo $row["naamger"]; ?></td>
        <td><?php echo $row["hoeveelheid"]; ?></td>
        <td><?php echo $row["eenheid"]; ?></td>
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