<?php
include 'conn.php';
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="CSS/login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>index</title>
</head>
<body class="text-center">
    <form class="form-signin" action="verwerkinglogin.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
  <label for="inputEmail" class="sr-only">E-mail</label>
  <input type="email" name="email" class="form-control" placeholder="E-mail" required>
  <label for="inputPassword" class="sr-only">Wachtwoord</label>
  <input type="password" name="Wachtwoord" class="form-control" placeholder="Wachtwoord" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>

<?php if (isset($_SESSION["fout"])){?>
  <p class="font-weight-bold" style="color: red; padding: 20px;"><?php echo $_SESSION["fout"] ?>!</p>
<?php
unset($_SESSION["fout"]);
}  
?>
</form>
</body>
</html>