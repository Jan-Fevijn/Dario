<?php
include 'conn.php';

$code = rand(111, 999999999) ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"])){
    $sql = "SELECT idSteward,email FROM steward WHERE email = '" . $_POST["email"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          $_SESSION["idmail"] = $row["idSteward"];
      }
    }
      else {
        echo "niet gevonden";
      }

      $sql = "UPDATE steward SET wwResetCode = $code WHERE idSteward = ". $_SESSION["idmail"] . "";

      if ($conn->query($sql) === TRUE) {
          header("location: index.php");
      } else {
          echo "fout bij het aanpassen: " . $conn->error;
      }
    }
}
?>