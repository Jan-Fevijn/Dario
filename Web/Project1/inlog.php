<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>Sign Up</title>
</head>
<body class="text-center">
    <form class="form-signin" action="check.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Log in</h1>
  <label for="inputEmail" class="sr-only">Gebruikersnaam</label>
  <input type="text" name="Gebruikersnaam" class="form-control" placeholder="Gebruikersnaam" required>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="Wachtwoord" class="form-control" placeholder="Wachtwoord" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
</form>
</body>
</html>