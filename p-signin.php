<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/signin-signup.php"
?>




<!-- backend: check login -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mysqli = mysqli_connect("localhost", 'root', '', "chip_website");
	$plant_name = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = $mysqli->query("SELECT * FROM Plants WHERE `plant_name` = '$plant_name'");
	$row = mysqli_fetch_assoc($query);
	if (($plant_name == $row['plant_name']) && ($password == $row['password'])) {
		$_SESSION['plant_name'] = $plant_name;
		print '<script>window.location.assign("p-publish.php");</script>';
	} else {
		print '<script>alert("Username or password incorrect!");</script>';
		print '<script>window.location.assign("p-signin.php");</script>';
	}
}
?>