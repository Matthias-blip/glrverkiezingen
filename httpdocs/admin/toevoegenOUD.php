<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../admin_login/index.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GLR STEMT - toevoegen</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">

 <div class="page-header">
 		<h1>Partij toevoegen</h1>
 </div>
	<!-- het formulier om dingen toe te voegen -->
	<form action="" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Partijnaam</td>
            <td><input type='text' name='partijnaam' class='form-control' /></td>
        </tr>
        <tr>
            <td>Beschrijving</td>
            <td><textarea name='partijbeschrijving' class='form-control' ></textarea></td>
        </tr>
        <tr>
            <td>Youtube link</td>
            <td><input type='text' name='youtube_iframe' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='overzicht.php' class='btn btn-danger'>Back to read products</a>
            </td>
        </tr>
    </table>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

<?php
echo "hi there";

// if (isset($_POST[])){ //will do nothing when first loaded.
// 	//all logic will go here.
// 	echo "hi there";
//
//   // Change this to your connection info.
// 	$DATABASE_HOST = 'localhost';
// 	$DATABASE_USER = 'adminStemt';
// 	$DATABASE_PASS = 'j$O5s7p8';
// 	$DATABASE_NAME = 'GLRSTEMT';
//
//   // Try and connect using the info above.
//   $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
//   if ( mysqli_connect_errno() ) {
//   	// If there is an error with the connection, stop the script and display the error.
//   	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
//   }

  // posted values
  // $partij=htmlspecialchars(strip_tags($_POST['partij']));
  // $partijbeschrijving=htmlspecialchars(strip_tags($_POST['partijbeschrijving']));
  // $youtube_iframe=htmlspecialchars(strip_tags($_POST['youtube_iframe']));

  // bind the parameters
  // $stmt->bindParam(':partij', $partij);
  // $stmt->bindParam(':partijbeschrijving', $partijbeschrijving);
  // $stmt->bindParam(':youtube_iframe', $youtube_iframe);

  // specify when this record was inserted to the database
  // $created=date('Y-m-d H:i:s');
  // $stmt->bindParam(':aangemaakt', $created);

	// $sql = "INSERT INTO GLRSTEMT (partij, partijbeschrijving, youtube_iframe, aangemaakt, aangepast, plaatje) VALUES ('test', 'test', 'test', 'test', 'test', 'test')";
	//
	// if ($conn->query($sql) === TRUE) {
	// 	echo "Je aanvraag is succesvol opgeslagen.";
	// }
	// else {
	// 	echo "Oeps, er gaat iets fout!<br/> Dit is de foutmelding: " . $sql . "<br>" . $conn->error;
	// }
	//
	//
  //   // show error
  //   catch(PDOException $exception){
  //       die('ERROR: ' . $exception->getMessage());
  //   }
}
