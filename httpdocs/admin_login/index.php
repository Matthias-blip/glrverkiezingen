<?php
session_start();
// If the user is not logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
  ?>
  <script type="text/javascript">
    alert("Je bent al ingelogd. Je word nu naar de overzicht pagina gestuurd.");
    window.location.href = "../admin";
  </script>
  <?php
  // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
	// header('Location: ../admin/');
	exit;
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Matthias Dekker, Abel Doolaard">
  <title>Inloggen Admin - GLR Stemt</title>
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="inlog.css">
  <!-- Favicons -->
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="authenticate.php" method="post">
      <img class="mb-4" src="../INCLMEDIA/rechtlogo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Log hier in</h1>

      <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Vul hier de Gebruikersnaam in:" id=" username" required />
        <label for="floatingInput">Gebruikersnaan</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Vul hier het wachtwoord in:" id="password" required />
        <label for="floatingPassword">Wachtwoord</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; GLR STEMT 2022</p>
    </form>
  </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</html>
