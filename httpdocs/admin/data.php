<?php

include 'database.php';
$query="SELECT id, partij, partijbeschrijving, youtube_iframe, aangepast FROM GLRSTEMT";

$result=mysqli_query($con,$query);

?>