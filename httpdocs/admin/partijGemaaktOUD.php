<?php
// For Debug Purpose
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../admin_login/index.php');
	exit;
}
$servername = "localhost";
$username = "adminStemt";
$password = 'j$O5s7p8';
$dbname = "GLRSTEMT";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = $_SESSION['id'];
$sql = "UPDATE admin_accounts SET partijGemaakt='1' WHERE `admin_accounts`.`id` = $id";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
 ?>
