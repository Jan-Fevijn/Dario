<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="CSS/Registrationcss.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<html>
<head>
    <title>Registreer</title>
</head>
<body class="text-center">
    <form class="form-signin" action="index.php" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Naam en Voornaam</h1>
  <label for="inputEmail" class="sr-only">Voornaam</label>
  <input type="text" name="Voornaam" class="form-control" placeholder="Voornaam" required>
  <label for="inputPassword" class="sr-only">Achternaam</label>
  <input type="text" name="Achternaam" class="form-control" placeholder="Achternaam" required>

  <h1 class="h3 mb-3 font-weight-normal">Registreer</h1>
  <label for="inputEmail" class="sr-only">Gebruikersnaam</label>
  <input type="text" name="gbnaam" class="form-control" placeholder="Gebruikersnaam" required>
  <label for="inputPassword" class="sr-only">Wachtwoord</label>
  <input type="password" name="ww" class="form-control" placeholder="Wachtwoord" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Registreer</button>
  <a href="index.php" class="Login">Terug naar inlog</a>
</form>
</body>
</html>