<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="CSS/indexcss.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>nieuw ww code</title>
</head>
<body class="text-center">
    <form class="form-signin" action="checkcode.php" method="POST">
  <label for="inputcode" class="sr-only">code</label>
  <input type="text" name="code" class="form-control" placeholder="code" required>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit">submit</button>
  <br>
  <?php if (isset($_SESSION["verzonden"])){?>
  <p class="font-weight-bold"><?php echo $_SESSION["verzonden"] ?>!</p>
<?php
unset($_SESSION["verzonden"]);
}  
?>
<br>
  <a href="wwvergeten.php">Terug</a>
</form>
</body>
</html>