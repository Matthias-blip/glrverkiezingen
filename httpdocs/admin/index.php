<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../admin_login');
	exit;
}
include 'database.php';
$id = $_SESSION['id'];
$sql = "SELECT partijGemaakt FROM admin_accounts WHERE id = $id";
$result = $con->query($sql);

// while ($row = $result->fetch_assoc()) {
//     echo $row['partijGemaakt']."<br>";
// }
while ($row = $result->fetch_assoc()) {
    // echo $row['partijGemaakt']."<br>";
		if ($row['partijGemaakt'] == 0) {
			?>
			<script type="text/javascript">
				console.log("Deze gebruiker mag nog een account aanmaken");
			</script>
			<?php
		}
		elseif ($row['partijGemaakt'] == 1) {
			?>
			<script type="text/javascript">
				alert("Je hebt al een partij aangemaakt, je word nu doorgestuurd naar de home pagina.");
				window.location.replace("../index2.html");
			</script>
			<?php
		}
}



// $PG = $_SESSION['partijGemaakt'];
// echo $PG . "DIT IS EEN TEST";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GLR Stemt - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>GLR STEMT - overzicht</h2>
            </div>
            <table class="table">
                <thead>
                <button type="button" onclick="location.href='https://glrstemt.sd-lab.nl/admin/upload.html'" class="btn btn-success">Nieuwe Partij</button>
				<button type="button" onclick="location.href='logout.php'" style="margin-left: 15px" class="btn btn-outline-danger">Log uit</button>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Partij</th>
                    <th scope="col">Partij Beschrijving</th>
                    <th scope="col">Youtube Link</th>
                    <th scope="col">Aangemaakt</th>
                </tr>
                </thead>
                <tbody>
                <?php include 'data.php'; ?>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($array=mysqli_fetch_row($result)): ?>
                        <tr>
                            <th scope="row"><?php echo $array[0];?></th>
                            <td><?php echo $array[1];?></td>
                            <td><?php echo $array[2];?></td>
                            <td><?php echo $array[3];?></td>
                            <td><?php echo $array[4];?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" rowspan="1" headers="">Er is geen data gevonden, klik op de partij toevoegen knop om een partij toe te voegen.</td>
                    </tr>
                <?php endif; ?>
                <?php mysqli_free_result($result); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
