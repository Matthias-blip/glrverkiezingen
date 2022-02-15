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



  // prepare and bind
  $stmt = $conn->prepare("INSERT INTO GLRSTEMT (id, partij, partijbeschrijving, youtube_iframe, aangepast) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP)");
  $stmt->bind_param("sss", $partij, $partijbeschrijving, $youtube_iframe);

  $partij = isset($_POST['partijnaam']) && trim($_POST['partijnaam'])!='' ? $_POST['partijnaam'] : '';
  $partijbeschrijving = isset($_POST['partijbeschrijving']) && trim($_POST['partijbeschrijving'])!='' ? $_POST['partijbeschrijving'] : '';
  $youtube_iframe = isset($_POST['youtube_iframe']) && trim($_POST['youtube_iframe'])!='' ? $_POST['youtube_iframe'] : '';
  $stmt->execute();



	//----------FOTO UPLOADEN----------
	$statusMsg = '';

	// File upload path
	$targetDir = "../images/";


	$fileName = basename($_FILES["file"]["name"]);
	$fileType = pathinfo($fileName,PATHINFO_EXTENSION);
	$targetFileName = $_POST['partijnaam']. "." . $fileType;
	$targetFilePath = $targetDir . $targetFileName;



	// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
	if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
	    // Allow certain file formats
	    $allowTypes = array('jpg','png','jpeg','pdf','svg');
	    if(in_array($fileType, $allowTypes)){
	        // Upload file to server
	        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
	            // Insert image file name into database
	            $insert = $conn->query("INSERT into images (file_name, uploaded_on) VALUES ('".$targetFileName."', NOW())");
	            if($insert){
	                $statusMsg = "<p style=color:green;>Uw bestand ".$fileName. " is succesvol geupload.</p>";
									echo "<p style=color:green;>partij is succesvol toegevoegd.</p>";
									echo "<p style=color:green;>je wordt automatisch doorgestuurd.</p>";
									// PARTIJ IS AANGEMAAKT VERIFICATIE
										$id = $_SESSION['id'];;
										$sql = "UPDATE admin_accounts SET partijGemaakt='1' WHERE `admin_accounts`.`id` = $id";

										if ($conn->query($sql) === TRUE) {
										  echo "Record updated successfully";
										} else {
										  echo "Error updating record: " . $conn->error;
										}
									// EINDE VERIFICATIE
									header( "refresh:3;url=../index2.html" );
	            }else{
	                $statusMsg = "Poster uploaden is gefaald, probeer het alstublieft opnieuw.";
	            }
	        }else{
	            $statusMsg = "Sorry, er was een error met het uploaden van je poster.";
	        }
	    }else{
	        $statusMsg = 'Sorry, alleen JPG, JPEG, PNG, SVG & PDF bestanden kunnen worden geupload.';
	    }
	}else{
	    $statusMsg = 'Selecter aub een poster om te uploaden';
	}

	// Display status message
	echo $statusMsg;


//----------EINDE FOTO UPLOADEN----------








  $stmt->close();
  $conn->close();






?>
