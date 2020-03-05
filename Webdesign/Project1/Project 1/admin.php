<?php
include 'conn.php';
?>

<?php
If ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sqlupdate = "UPDATE `project1`.`io` , `project1`.`verrichting` SET `omschrijving` = '" . $_POST["nieuwIO"] . "' ,  `bedrag` = '" . $_POST["nieuwbed"] . "' , `IO` = '" . $_POST["nieuwio"] . "'
        WHERE `idIO` = '" . $_POST["ID"] . "'";

        if ($conn->query($sqlupdate) === TRUE) {
                echo "aangepast";
            } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/admincss.css">
    <title>IO</title>
</head>
<body>
    <form action="inlog.php" method="get">
    <button type="submit">Uitloggen</button>
    </form>

    <form action="admin.php" method="post">
    <p><input type="text" name="ID" placeholder="ID"></p>
    <p><input type="text" name="Nieuwprod" placeholder="NaamIO"></p>
    <p><input type="text" name="Nieuwbed" placeholder="Bedrag"></p>
    <p><input type="text" name="Nieuwio" placeholder="IO"></p>
    <button type="submit">Update</button>
    </form>

    <table>
			    <tr>
                    <th>Naam</th>
                    <th>Bedrag</th>
                    <th>IO</th>
			    </tr>
                <?php 
			        $sql_data = "SELECT io.omschrijving, verrichting.bedrag , io.IO
                    from project1.io
                    join project1.verrichting on io.idIO = verrichting.idIO";


                    $resultaat = $conn->query($sql_data);
            
                    if ($resultaat->num_rows > 0) {
            
            
                        while($row = $resultaat->fetch_assoc()){
                            echo "<tr><td>" . $row["omschrijving"] . "</td><td>" . $row["bedrag"] . "</td><td>" . $row["IO"] . "</td></tr>"; 
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