<?php
include 'conn.php';
?>
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/adminupcss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>adminupdate</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <h3 class="masthead-brand">Admin Update</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link active" href="adminupdate.php">Admin Update</a>
        <a class="nav-link" href="admininsert.php">Admin Bijvoegen</a>
        <a class="nav-link" href="index.php">Uitloggen</a>
      </nav>
    </div>
  </header>

<!--<form action="adminupdate.php" method="POST">
  <h3>Filter Steward</h3>
  <label class="ID">ID</label>
  <input type="text" name="ID" placeholder="ID">
  <label class="Voornaam">Voornaam</label>
  <input type="text" name="Voornaam" placeholder="Voornaam">
  <label class="Achternaam">Achternaam</label>
  <input type="text" name="Achternaam" placeholder="Achternaam">
  <label class="Uur">Uur</label>
  <input type="text" name="Uur" placeholder="Uur">
  <label class="Dag">Dag</label>
  <input type="text" name="Dag" placeholder="Dag">
  <label class="Plaats">Plaats</label>
  <input type="text" name="Plaats" placeholder="Plaats">

  <button type="submit">Update</button>
</form>-->

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
        </p>
  </main>
</div>
</body>
</html>
</body>
</html>