<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
include 'database.php';

// echo $_SESSION['username'];
// we starten met kijken of er een actieve sessie is:
if (!isset($_SESSION['username'])) {
  ?>
  <script>
  window.alert("Je bent nog niet ingelogd, log aub eerst in.")
  window.location.replace("/login.php");
  </script>
  <?php
}
// echo $SESSION_;
$sql = "SELECT gestemt FROM gestemt WHERE username = '".$_SESSION['username'] ."'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    // echo $row['partijGemaakt']."<br>";
		if ($row['gestemt'] == 0) {
			?>
			<script type="text/javascript">
				console.log("Deze gebruiker mag nog stemmen");
			</script>
			<?php
		}
		elseif ($row['gestemt'] == 1) {
			?>
			<script type="text/javascript">
				alert("Je hebt al gestemt, je word nu doorgestuurd naar de home pagina.");
				window.location.replace("/");
			</script>
			<?php
		}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEM</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<!-- NAVIGATIEBAR -->
<div class="topnav">
    <div class="topnav-right">
        <a href="/">HOME</a>
        <a class="active" href="/pages/jongerenPartij">JONGEREN <br>PARTIJ</a>
        <a href="/pages/liveStream">LIVESTREAM</a>
        <a href="/pages/stem">STEM</a>
        <a href="/pages/uitslag">UITSLAG</a>
    </div>
</div>
<!-- EINDE NAVIGATIEBAR -->
<h1>Stem op je favoriete partij!</h1>

<!-- Create Form -->
<form id="form" method="POST" action="verwerk.php">
    <label style="font-weight: bold;">
        <?php echo $_SESSION['Voornaam'] ?>, op welke partij wil jij stemmen?
    </label>
    <br><br><br>

    <!-- Input Type Radio Button -->
    <?php
    include 'database.php';
    $sql = "SELECT partij, id FROM GLRSTEMT";
    $result = mysqli_query($con, $sql);
    echo "<div class='container'>";
    echo "<div class='row'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $partij = $row ['partij'];
        $id = $row ['id']
        ?>
        <label for="<?php echo $partij ?>">
            <input type="radio"
                   id="<?php echo $partij ?>"
                   name="checkbox" value="<?php echo $id ?>"><?php echo $partij ?></input>
        </label>
        <br><br>
        <?php
    }
    mysqli_close($con);
    echo "</div>";
    echo "</div>";
    // echo $_SESSION['username'];
    // var_dump($_SESSION);
    ?>

    </div>
    <!-- Multi-line Text Input Control -->
    <input type="submit" value="Submit" style="  background-color: rgb(255, 0, 0); border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;">
    <!-- <script>
        function Zeker() {
            window.alert("Weet je zeker dat je wilt stemmen? Je kan dit maar 1 keer doen, en je stem kan niet ongedaan gemaakt worden.")
        }
    </script> -->
</form>
</body>
</html>
<?php
exit();
?>
