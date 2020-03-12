<?php
include 'conn.php';
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/timescss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Times</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <h3 class="masthead-brand">Times</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="times.php">Times</a>
        <a class="nav-link" href="notificaties.php">Notificaties</a>
        <a class="nav-link" href="Maps.php">Maps</a>
        <a class="nav-link" href="index.php">Uitloggen</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
		    
        <table>
			    <tr>
                    <th>Voornaam</th>
                    <th>Naam</th>
                    <th>Tijd</th>
                    <th>Dag</th>
                    <th>Plaats</th>
			    </tr>
                <?php 
			        $sql_data = "SELECT * from stewardsinfo";


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

                         $conn->Close();
			    ?>
            </table>
  </main>
</div>
</body>
</html>
</body>
</html>