<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/iocss.css">
    <title>IO</title>
</head>
<body>
    <a class="btn btn-outline-primary" href="afmelden.php">Afmelden</a>

    <table>
			    <tr>
                    <th>Naam</th>
                    <th>Bedrag</th>
                    <th>IO</th>
			    </tr>
                <?php 
			        $sql_data = "SELECT * from alleinfoverrichtingen";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["omschrijving"] . "</td><td>" . $row["bedrag"] . "</td><td>" . $row["datum"] . "</td></tr>"; 
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