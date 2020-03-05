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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="CSS/TimesCSS.css">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
<title>Times</title>
</head>

<body>
    <header>
        <div class="menu">
            <ul>
                <li class="times"><a class="active">Times</a></li>
                <li class="notefications"><a href="notificaties.php">Notefications</a></li>
                <li class="maps"><a href="maps.php">Maps</a></li>
                <li class="Uitloggen"><a href="index.php">Uitloggen</a></li>
            </ul>
        </div>
    </header>
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