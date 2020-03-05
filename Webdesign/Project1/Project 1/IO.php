<?php
include 'conn.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_unset();
    session_destroy();
    header("location: inlog.php");
}
?>

<?php
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
    <form action="io.php" method="post">
    <button type="submit">Uitloggen</button>
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