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
          
      } else {
        header("location: wwvergeten.php");
      }
      
      $sql = "SELECT wwResetCode FROM steward WHERE email = '" . $_POST["email"] . "'";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION["CodeReset"] = $row["wwResetCode"];
        }
      }
        else {
          echo "niet gevonden";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>

<?php
  // email versturen //
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception; 
  require("PHPMailer-master/src/Exception.php");
  require("PHPMailer-master/src/PHPMailer.php");
  require("PHPMailer-master/src/SMTP.php");

  //Email opstellen

  $emailadres = stripslashes(strip_tags($_POST["email"]));

  $berichtinhoud = "dit is u code -> '". $_SESSION["CodeReset"]."' ";

  if($emailadres != "" && $berichtinhoud != "") {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->port = 587;
    $mail->host = "smtp.gmail.com";
    $mail->Username = "sendmail@atheneumjanfevijn.be";
    $mail->Password = "sendmail123";
    $mail-> IsHTML(true);
    $mail->AddAdress($emailadres);
    $mail->SetFrom("no-replay@atheneumjanfevijn.be", "no-replay");
    $mail->subject = "verzonden mail";
    $content = "<b>" . $berichtinhoud . "</b>";

    $mail->MsgHTML($content);
    if (!$mail->send()) {
      echo "niet verzonden";
    } else {
      header("location: wwcode.php");
      $_SESSION["verzonden"] = "u code is verzonden";
    }
  }
?>