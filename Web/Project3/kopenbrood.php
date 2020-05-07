<?php
include 'conn.php';
include 'checksecurity.php';

$datum = date("yymd");

      // Saldo terugkrijgen van ingelogd persoon
      $sql_saldo = "SELECT sum(saldo) from saldo
    where idklant = ". $_SESSION["loggedIn"] ."";
  
    $result = $conn->query($sql_saldo);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $_SESSION["saldo"] = $row["sum(saldo)"];
      }
  } 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["positie"])){
    if (isset($_SESSION['loggedIn'])) {

              // select voor alles van broodpositiedatum
              $sql_get_pos_aan ="SELECT idbroodpositieDatum, idbrood, positie, aantalIn, kostprijs from broodpositieDatum where datum = $datum and positie = '". $_POST["positie"] ."'";

              $result = $conn->query($sql_get_pos_aan);
              
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()){
                    $hoeveelheid = $row['aantalIn'];
                    $brood = $row["idbrood"];
                    $locatie = $row['positie'];
                    $prijs = $row["kostprijs"];
                    $_SESSION["positieid"] = $row['idbroodpositieDatum'];
                  }
              }

    //berekenen aantal broden
    $sql ="SELECT count(broodpositieDatum) as broden from saldo where broodpositiedatum = '".$_SESSION["positieid"]."' and datum = $datum ";

    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $aantalgekocht = $row["broden"];
      }
  } 

      // insert voor saldo van klant te bepalen
  $sql = "INSERT INTO saldo (idklant,saldo,datum,broodpositiedatum) VALUES ('". $_SESSION["loggedIn"] . "', $prijs*-1 , $datum ,'" . $_SESSION["positieid"] . "')";
  if ($conn->query($sql) === TRUE) {

              }
    } else {
      header("location: overzichtbrood.php ");
    }

  //insert van nieuw aantal
      $sql = "INSERT INTO broodpositiedatum (idbrood,aantalIn,positie,datum, kostprijs) VALUES ($brood , $hoeveelheid - $aantalgekocht , $locatie , $datum, $prijs)";
      if ($conn->query($sql) === TRUE) {
    
                  }
        } else {
          header("location: overzichtbrood.php ");
        }
  }
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="CSS/overzichtcss.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>kopen</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="overzichtbrood.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto"> 
      <li class="nav-item">
        <a class="nav-link" href="kopenbrood.php">Brood Kopen</a>
      </li>
      <?php
    if (isset($_SESSION["loggedIn"])){
?>
    <li class="nav-item">
        <a class="nav-link"><?php echo "€" . $_SESSION["saldo"];?></a>
    </li>
<?php
                  }
?>
      <li class="nav-item">
        <a class="nav-link" href="afmelden.php">afmelden</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">

<form action="kopenbrood.php" name="koop" method="POST">
  <label>Geef positie van brood:</label>
  <input type="text" name="positie" placeholder="positie" required>
  <p><button type="submit">Submit</button></p>
</form>
<?php
  if (isset($_SESSION["aankoop"])){
    echo $_SESSION["aankoop"];
  }
?>
<br>
<table>
			    <tr>
                    <th>brood</th>
                    <th>prijs</th>
                    <th>positie</th>
                    <th>Aantal</th>
			    </tr>
                <?php 
                if (isset($_SESSION["loggedIn"])){

			        $sql_data = "SELECT * from overzichtbroden where Datum = $datum";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["broodnaam"] . "</td><td>". $row["kostprijs"] . "</td><td>" . $row["positie"] . "</td><td>" . $row["aantalIn"] . "</td></tr>"; 
                        }
                        echo "</table>";
                    }
                    else{
                        if ($debug) echo "geen resultaat";
                    }
                  }

                         $conn->Close();
			    ?>
            </table>
</main>
</body>
</html>