<?php

header('Content-Type: application/json');

require_once('database.php');

$sqlQuery = "SELECT partij,aantal_stemmen FROM GLRSTEMT ORDER BY id";

$result = mysqli_query($con, $sqlQuery);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
