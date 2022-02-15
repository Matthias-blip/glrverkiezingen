
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jongerenpartijen - GLR Stemt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="partijen.css">
    <script src="https://kit.fontawesome.com/8337244e0f.js" crossorigin="anonymous"></script>
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

  <!--De achtergrond-->

  <?php
  include 'database.php';
  $sql = "SELECT partij FROM GLRSTEMT";
  $result = mysqli_query($con,$sql);
  $numrows = mysqli_num_rows($result);
  $count = 0;


  echo"<div class='container'>";
  echo"<div class='row'>";
// if ($numrows > 0) {
   while ( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $partij = $row ['partij'];

//          if($count == 0){
//              echo"<div class='row' style='margin-top: 50px;'>";
//          }
?>
<div class='col-md-4'>
  <i class='fas fa-square'>
    <a href='partijPagina.php?<?php echo $partij ?>'><?php echo $partij ?></a>
  </i>
</div>
<br><br>
<?php
// echo "<div class='col-md-4'><i class='fas fa-square'><a href='partijPagina.php' onclick='selectedPartij()'>$partij</a></i></div><br><br>";
}
 mysqli_close($con);
   echo"</div>";
  echo"</div>";
?>
<!-- <p id="selectedPartij">no input</p> -->

<!-- <script type="text/javascript">
  function selectedPartij() {
    // <?php $selectedPartij = $partij ?>
    document.getElementById('selectedPartij').innerHTML = "test";
  }
</script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
