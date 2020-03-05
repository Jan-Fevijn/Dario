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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>admin</title>
</head>
<body>
<header>
        <div class="menu">
            <ul>
                <li class="Uitloggen"><a href="index.php">Uitloggen</a></li>
            </ul>
        </div>
    </header>
    <form action="Times.php" method="POST">
        <input type="text" name="Filter" placeholder="Filter">
        <button type="submit">Filter</button>
    </form>
        <br>
		    <table>
			    <tr>
                    <th>Voornaam</th>
                    <th>Naam</th>
                    <th>Tijd</th>
                    <th>Dag</th>
                    <th>Plaats</th>
			    </tr>
			    <?php 
			        $sql_data = "SELECT * from shift
                    inner join tijd on tijd.idTijd = shift.idTijd
                    inner join plaats on plaats.idPlaats = shift.idPlaats
                    inner join steward on steward.idSteward = shift.idSteward;";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["Voornaam"] . "</td><td>" . $row["Naam"] . "</td><td>" . $row["Tijd"] . "</td>
                            <td>" . $row["dag"] . "</td><td>" . $row["afkorting"] . "</td></tr>"; 
                        }
                        echo "</table>";
                    }
                    else{
                        if ($debug) echo "geen resultaat";
                    }

                         $conn->Close();
			    ?>
		    </table>
</body>
</html>