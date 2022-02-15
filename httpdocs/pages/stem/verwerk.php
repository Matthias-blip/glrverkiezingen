<?php
session_start();
// For Debug Purpose
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'database.php';

// echo $_SESSION['username'] . 'kanonnen';


// als er een actieve sessie is wordt de checbox uitgelezen de id van de partij bepaald en de stem aan de partij toegevoegd
    $selectedPartij = $_POST['checkbox'];
    // echo $selectedPartij;

    $sql = "UPDATE GLRSTEMT SET aantal_stemmen= aantal_stemmen+1 WHERE id = $selectedPartij";

    if ($con->query($sql) === TRUE) {
      ?>
      <script>
      window.alert("Succesvol gestemt! Je kunt niet meer stemmen.")
      <?php
      // $_SESSION['username'] =  $userInfo['nickname'];
      // $username =
      $iHG = "UPDATE gestemt SET gestemt=1 WHERE username = '".$_SESSION['username'] . "'";
      if ($con->query($iHG) === TRUE) {

      }
       ?>

      window.location.replace("/pages/uitslag");
      </script>
      <?php
    } else {
      ?>
      <script>
      window.alert("Helaas was er een error met het stemmen: " <?php $con->error ?>)
      window.location.replace("/pages/uitslag");
      </script>
      <?php
    }
    // $username = $userInfo['nickname'];

    // $stmt = $con->prepare("UPDATE gestemt SET gestemt = 1 where username = $username");
    // $stmt->bind_param("s", $aantal_stemmen);
    // $stmt->execute();

    // echo "<p style='color: green'>Je stem is succesvol</p>";
    // header("refresh:5;url=https://glrstemt.sd-lab.nl/pages/uitslag/");

// var_dump($_SESSION);
?>
