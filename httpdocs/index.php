<?php
session_start();
require("config_auth0.php");

// Laad all externe componenten
require("vendor/autoload.php");

// Initialiseer Auth0
use Auth0\SDK\Auth0;
$auth0 = new Auth0($auth0_config);

// Probeer de ingelogde user uit te lezen
$userInfo = $auth0->getUser();

// Was a user found?
if ($userInfo) {
	$_SESSION['Voornaam'] = $userInfo['given_name'];
	$_SESSION['Achternaam'] =  $userInfo['family_name'];
	$_SESSION['username'] =  $userInfo['nickname'];
	// $_SESSION['ingelogd'] = $ingelogd['1'];
	$username = $userInfo['nickname'];
	// check of er rechten zijn voor deze user
	// print_r( $userInfo);
	// echo "<p><a href='logout.php' style='color: black;'>LOGOUT</a>";
} else {
// $_SESSION['ingelogd'] = $ingelogd['0'];
	header("Location:login.php");
}

/***********************************************
 ***********************************************
 *            COUNT EN VERWIJZINGEN
 ***********************************************
 ***********************************************/
$username = $_SESSION['username'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - GLR Stemt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- <meta http-equiv="refresh" content="2"> -->
</head>

<body class="container">
<!-- NAVIGATIEBAR -->
<div class="topnav">
    <div class="topnav-right">
        <a class="active" href="#home">HOME</a>
        <a href="/pages/jongerenPartij">JONGEREN <br>PARTIJ</a>
        <a href="/pages/liveStream">LIVESTREAM</a>
        <a href="/pages/stem">STEM</a>
        <a href="/pages/uitslag">UITSLAG</a>
    </div>
</div>
<!-- EINDE NAVIGATIEBAR -->


<!--Einde achtergrond-->
</section>

<div class="row">
    <section class="col">
        <h1>Het <br> GLR <br> <span class="groen">STEMT!</span> </h1>
    </section>
    <img class="col img-fluid"  id="stempop" src="INCLMEDIA/popetje-1.png" alt="een poppetje die stemt">
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>