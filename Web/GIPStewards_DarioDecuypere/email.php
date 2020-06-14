<?php
include 'conn.php';

if (isset($_POST["email"],$_POST["emailsteward"])){

      $sql = "UPDATE steward SET email = '" . $_POST["email"]  . "' WHERE idSteward = '" . $_POST["emailsteward"] . "'";

      if ($conn->query($sql) === TRUE) {
        header("location:email.php");
        $_SESSION["geluktmail"] = "Nieuw email";
      }
      else{
        $_SESSION["foutmail"] = "niet correct verlopen";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admincss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>email</title>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdate.php">Update</a>
        <a class="nav-link" href="admininsert.php">Toevoegen</a>
        <a class="nav-link active" href="email.php">email</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>

    <form action="email.php" method="POST">
    <select name="emailsteward">
            <option value = 0><-Kies steward-></option>
            <?php

                $sql = "SELECT idSteward, Voornaam, Naam FROM steward order by Voornaam";

                $resultaat = $conn->query($sql);

                  if ($resultaat->num_rows > 0) {
        
                  while($row = $resultaat->fetch_assoc()){
                    echo  "<option value='" . $row["idSteward"] . "'>" . $row["Voornaam"] . " " . $row["Naam"] ."</option>";
                  }
        
    }
    ?>
        </select>
        <br>
        <input type="email" name="email" placeholder="nieuwe email" class="input">
        <button type="submit" name="submit" class="nwEmail">Nieuw email</button>
</form>
<br>

<div class="container"> 
<div class="col-mt-0">
<table>
			    <tr>
                    <th>Voornaam</th>
                    <th>Naam</th>
                    <th>email</th>
			    </tr>
                <?php 

			        $sql_data = "SELECT * from steward";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["Voornaam"] . "</td><td>" . $row["Naam"] . "</td><td>" . $row["email"] . "</td></tr>"; 
                        }
                        echo "</table>";
                    }
                    else{
                        if ($debug) echo "geen resultaat";
                    }
                         $conn->Close();
			    ?>
            </table>

            <?php if (isset($_SESSION["geluktmail"])){?>
          <p class="font-weight-bold" style="color: green; padding: 20px;"><?php echo $_SESSION["geluktmail"] ?>!</p>
        <?php
          unset($_SESSION["geluktmail"]);
          }  
        ?>
        <?php if (isset($_SESSION["foutmail"])){?>
          <p class="font-weight-bold" style="color: red; padding: 20px;"><?php echo $_SESSION["foutmail"] ?>!</p>
        <?php
          unset($_SESSION["foutmail"]);
          }  
        ?>
            </div>
    </div>
</div>
</div>
</body>
</html>