<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['value'])){

        $value = $_GET['value'];
        $query = "SELECT * FROM `stewardsinfo` WHERE CONCAT(`Voornaam`, `Naam`, `Tijd`, `Dag`, `afkorting`) LIKE '%".$value."%'";

    } else{
        $query = "SELECT * FROM `stewardsinfo`";
    }
}
function filterTable($query, $conn)
{
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}
?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/admincss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>adminoverzicht</title>
</head>
<body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdate.php">Update</a>
        <a class="nav-link" href="admininsert.php">Toevoegen</a>
        <a class="nav-link" href="afmelden.php">Uitloggen</a>
      </nav>
    </div>
  </header>


<div class="container"> 

<div class="col-mt-0">
  <form action="admin.php" method="GET" class="filter p-5">
  <input type="text" name="value" placeholder="Naam" class="input">
  <button type="submit" name="filter" class="filterbtn">Filter</button>
  </form>  
</div>

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
                    $result = filterTable($query, $conn);
                ?>

                <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row['Voornaam'];?></td>
                    <td><?php echo $row['Naam'];?></td>
                    <td><?php echo $row['Tijd'];?></td>
                    <td><?php echo $row['Dag'];?></td>
                    <td><?php echo $row['afkorting'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
            <?php 
            if (isset($_SESSION["gelukt"]))
            echo $_SESSION["gelukt"];
            ?>
            </div>
    </div>
</div>
</body>
</html>
</body>
</html>