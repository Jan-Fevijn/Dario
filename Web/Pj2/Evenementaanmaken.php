<?php
include 'connectie.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/algcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>EvenementAanmaken</title>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <h3 class="masthead-brand">Evenement Aanmaken</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="overzicht.php">Home</a>
        <a class="nav-link active" href="evenementaanmaken.php">Evenement Aanmaken</a>
        <a class="nav-link" href="gerechttoevoegen.php">Gerecht Toevoegen</a>
        <a class="nav-link" href="gerechtenaanpassenprod.php">Producten Aanpassen</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
		    
        <table>
			    <tr>
                    <th>Evenmenten</th>
                    <th>Dagen</th>
                    <th>Personen</th>
                    <th>Gerechten</th>
			    </tr>
                <?php 
			        $sql_data = "SELECT * from alleinformatie";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["naameve"] . "</td><td>" . $row["dagen"] . "</td><td>" . $row["aantal"] . "</td>
                            <td>" . $row["naamger"] . "</td></tr>"; 
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