<?php
include 'conn.php';
include 'checksecurity.php';

$datum = date("Y-m-d");


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
  if (isset($_POST["positie"], $_POST["datum"])){
    if (isset($_SESSION['loggedIn'])) {

  // positie krijgen van het brood dat gekocht wil worden
  $sql_get_pos ="SELECT idbroodpositieDatum, idbrood, positie from broodpositieDatum where positie = ". $_POST["positie"] ."";

  $result = $conn->query($sql_get_pos);
  
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        $_SESSION["positieid"] = $row["idbroodpositieDatum"];
      }
  } 

  // insert van een klant de datum van aankoop en de positie van brood
  $sql = "INSERT INTO saldo (idklant,saldo,datum,broodpositiedatum) VALUES ('". $_SESSION["loggedIn"] . "','" . $_SESSION["saldo"] . "','" . $_POST["datum"] . "','" . $_SESSION["positieid"] . "')";
  if ($conn->query($sql) === TRUE) {

              }
    } else {
      header("location: overzichtbrood.php ");
    }
        // select voor aantal en positie
        $sql_get_pos_aan ="SELECT idbroodpositieDatum, positie, aantalIn, kostprijs from broodpositieDatum where positie = ". $_POST["positie"] ."";

        $result = $conn->query($sql_get_pos_aan);
        
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
              $hoeveelheid = $row['aantalIn'] - 1;
              $locatie = $row['positie'];
              $prijs = $row['kostprijs'];
            }
        } 
      
        // update van je aantal broden op de juiste locatie
           $sql = "UPDATE broodpositiedatum SET aantalIn = $hoeveelheid WHERE locatie = $locatie";
           if ($conn->query($sql) === TRUE) {  
            echo "test";
            }
            //update van je saldo 
            $saldo = $_SESSION["saldo"] - $prijs;
            echo "test";
                              
            $sql = "UPDATE saldo SET saldo = $saldo WHERE idklant = '". $_SESSION["loggedIn"]. "' AND datum = $datum";
            if ($conn->query($sql) === TRUE) {
            $_SESSION["aankoop"] = "aankoop voltooid";
            } 
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

<?php
  $sql = "SELECT idbrood ,datum FROM broodpositiedatum";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
?>

<?php  
              while($row = $result->fetch_assoc()){

                $options='<option value=1>'. $datum . '</option> ';
   }
  }
    else {
      echo "geen datums gevonden";
    }
?>

<form action="kopenbrood.php" name="koop" method="POST">
    <?php if (!isset($_SESSION["keuzedatum"])) {?>
        <select name="datum">
            <option value = 0><-maak uw keuze -></option>
            <?php echo $options;?>
            </select>
<?php
}
?>

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

			        $sql_data = "SELECT * from overzichtbroden";


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