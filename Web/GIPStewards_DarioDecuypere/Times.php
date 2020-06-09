<?php
    include 'conn.php';
    include 'security.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/TimesCSS.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>overzicht</title>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="times.php">Times</a>
        <a class="nav-link" href="Maps.php">Maps</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>


<div class="container"> 

<div class="col-mt-0">
<table>
			    <tr>
                    <th>Voornaam</th>
                    <th>Naam</th>
                    <th>Tijd</th>
                    <th>Dag</th>
                    <th>Plaats</th>
			    </tr>
                <?php 
                if (isset($_SESSION["loggedIn"])){

			        $sql_data = "SELECT * from stewardsinfo WHERE idSteward = ". $_SESSION["loggedIn"] ."";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["Voornaam"] . "</td><td>" . $row["Naam"] . "</td><td>" . $row["Tijd"] . "</td>
                            <td>" . $row["Dag"] . "</td><td>" . $row["afkorting"] . "</td></tr>"; 
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
            </div>
    </div>
</div>
</body>
</html>
</body>
</html>
