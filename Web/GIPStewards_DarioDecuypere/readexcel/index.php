<?php
include 'conn.php';
require_once("PHPExcel/Classes/PHPExcel/IOFactory.php");

$ExcelObject = "";
$getsheet = array();

if (isset($_FILES["excelfile"]) && !empty($_FILES["excelfile"]["tmp_name"])) {

    //read and load
    $ExcelObject = PHPExcel_IOfactory::Load($_FILES["excelfile"]["tmp_name"]);
    $getsheet = $ExcelObject->getActiveSheet()->ToArray(null, true);

    //insert
    for ($row=2; $row <= count($getsheet)  ; $row++) { 
        $xx ="'" . implode( "','", $getsheet[$row]) . "'";
        $sql = "INSERT INTO steward (Naam, Voornaam, Telefoonnummer) VALUES ($xx)";
        echo implode( "','", $getsheet[$row]);
        if ($conn->query($sql) === true){
            echo "row". $row ."geinsert" . "<br>";
        } else {
            "Error:" . $sql . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inlezen</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="excelfile">
        <input type="submit" value="submit">
    </form>
</body>
</html>