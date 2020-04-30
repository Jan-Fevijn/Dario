<?php
include 'conn.php';
$date = date('m/d/Y h:i:s a', time());

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["positie"])){

    $sql = "SELECT sum(saldo) from saldo
    where idklant = ". $_SESSION["loggedIn"] ."";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        
      }
  } else {

  }

    $sql_aantal = "SELECT sum(totaal) from (select aantalIn as totaal from broodpositiedatum 
    where datum = $date and broodpositiedatum.positie = ". $_POST["positie"] ."
    union
    SELECT (-1 * count(broodpositiedatum)) as totaal
    from saldo where datum = $date) as a";

    $result = $conn->query($sql_aantal);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        echo "test";
      }
    } else {

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
        $sql_balans = "SELECT saldo from saldo where idklant = ". $_SESSION["loggedIn"] ."";
        $resultaat = $conn->query($sql_balans);
            
                    if ($resultaat->num_rows > 0) {
                        while($row = $resultaat->fetch_assoc()){
?>
    <li class="nav-item">
        <a class="nav-link"><?php echo "€" . $row["saldo"];?></a>
    </li>
<?php
                        }
                    }
                  }
?>
      <li class="nav-item">
        <a class="nav-link" href="afmelden.php">afmelden</a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="container">

<form action="kopenbrood.php" method="POST">
  <label>Geef positie van brood:</label>
  <input type="text" name="positie" placeholder="positie" required>
  <p><button type="submit">Submit</button></p>
</form>

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