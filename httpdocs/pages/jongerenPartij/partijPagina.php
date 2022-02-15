<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'database.php';

// echo $_SERVER['QUERY_STRING'];
$selectedPartij = str_replace('%20', ' ', $_SERVER['QUERY_STRING']);
// echo $test;
// $selectedPartij = 'Partij Life';


//YOUTUBE FILMPJE
  $sqlY = "SELECT youtube_iframe FROM GLRSTEMT WHERE partij = '$selectedPartij'";
  $resultY = $con->query($sqlY);
  while($row = $resultY->fetch_assoc()) {
    $normalUrl = $row["youtube_iframe"];
  }
  //get the code from the URL
  if(substr($normalUrl, 0, 17) === "https://youtu.be/"){
    $YTCode = ltrim($normalUrl, 'https://youtu.be/');
  }
  elseif (substr($normalUrl, 0, 32) === "https://www.youtube.com/watch?v=") {
    $YTCode = substr($normalUrl, 32);
    // $YTCode = ltrim($normalUrl, "https://www.youtube.com/watch?v=");
  }
  // if ($normalUrl == 'https://youtu.be/') {
  //   $YTCode = ltrim($normalUrl, 'https://youtu.be/');
  // }
  // elseif ($normalUrl == 'https://www.youtube.com/watch?v=') {
  //   $YTCode = ltrim($normalUrl, 'https://www.youtube.com/watch?v=');
  // }




// PARTIJ BESCHRIJVING
  $sqlB = "SELECT partijbeschrijving FROM GLRSTEMT WHERE partij = '$selectedPartij'";
  $resultB = $con->query($sqlB);
  while($row = $resultB->fetch_assoc()) {
    $partijBeschrijving = $row["partijbeschrijving"];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>partijPagina</title>
    <link rel="stylesheet" href="partijPagina.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous" defer></script>
  </head>
  <body>
    <nav>
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
    </nav>
    <!--De achtergrond-->
      <!-- <section id="spikkelsboven"></section> -->
      <!-- <section id="spikkelsonder"></section> -->
    <!--Einde achtergrond-->
    <main>
      <div class="container-fluid">
          <div class="row d-flex justify-content-center mx-auto">
            <div class="col-xs-12 col-md-6 padding mx-auto">
            <div class="w-100"></div>
<!-- PARTIJ BESCHRIJVING -->
            <div class="col-xs-12 col-md-12 padding mx-auto">
            <h2>Partij Beschrijving:</h2>
                <p><?php echo $partijBeschrijving ?></p>
            </div>
<!-- EINDE PARTIJ BESCHRIJVING -->
            <div class="w-100"></div>
<!-- YOUTUBE VIDEO -->
              <h2>Partij Video:</h2>
                <!-- <iframe class="youtube-video" src="<?php echo "https://www.youtube.com/embed/" . $YTCode; ?>" allowfullscreen></iframe> -->
              <iframe class="mx-auto" width="685" height="360" src="<?php echo "https://www.youtube.com/embed/" . $YTCode; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
<!-- EINDE YOUTUBE VIDEO -->
            <div class="w-100"></div>
<!-- POSTER -->
            <h2>Partij Poster:</h2>
            <div class="col-xs-12 col-md-6 padding mx-auto">
                <img src="/images/<?php echo $selectedPartij ?>.jpg" onerror="this.style.visibility = 'hidden'">
                <img src="/images/<?php echo $selectedPartij ?>.png" onerror="this.style.visibility = 'hidden'">
                <img src="/images/<?php echo $selectedPartij ?>.jpeg" onerror="this.style.visibility = 'hidden'">
                <img src="/images/<?php echo $selectedPartij ?>.pdf" onerror="this.style.visibility = 'hidden'">
                <img src="/images/<?php echo $selectedPartij ?>.svg" onerror="this.style.visibility = 'hidden'">
                <!-- <embed src="/images/<?php echo $selectedPartij ?>.pdf" type="application/pdf" width="100%" height="600px" /> -->
            </div>
<!-- EINDE POSTER -->
          </div>
        </div>
    </main>
  </body>
</html>
<?php
$con->close();
 ?>
