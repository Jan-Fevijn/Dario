<?php
include 'conn.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("location: index.php");
}
?>


<?php
if (isset($_GET['filter']))
{
    $value = $_GET['value'];

    $query = "SELECT * FROM `stewardsinfo` WHERE CONCAT(`Voornaam`, `Naam`, `Tijd`, `Dag`, `afkorting`) LIKE '%".$value."%'";
    $search_result = filterTable($query);
    
}
 else{
    $query = "SELECT * FROM `stewardinfo`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connection = mysqli_connect("localhost", "root", "usbw", "festivalstewards", "3307");
    $filter_Result = mysqli_query($connection, $query);
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
      <h3 class="masthead-brand">Admin</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="admin.php">Admin</a>
        <a class="nav-link" href="adminupdate.php">Admin Update</a>
        <a class="nav-link" href="admininsert.php">Admin Bijvoegen</a>
        <a class="nav-link" href="index.php">Uitloggen</a>
      </nav>
    </div>
  </header>


  <main role="main" class="inner cover">  

  <form action="admin.php" method="GET" class="filter">
  <h4>Filter</h4>
  <label class="achternaam">Naam:</label>
  <input type="text" name="value" placeholder="Naam" class="input">
  <button type="submit" name="filter" class="filterbtn">Filter</button>

  <table>
                <tr>
                    <th>Voornaam</th>
                    <th>Naam</th>
                    <th>Tijd</th>
                    <th>Dag</th>
                    <th>Plaats</th>
                </tr>

                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['Voornaam'];?></td>
                    <td><?php echo $row['Naam'];?></td>
                    <td><?php echo $row['Tijd'];?></td>
                    <td><?php echo $row['Dag'];?></td>
                    <td><?php echo $row['afkorting'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
</form>  
    </main>
</div>
</body>
</html>
</body>
</html>