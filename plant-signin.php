<html>
	<head>
		<title>Plant Login</title>
	</head>
</html>

<?php
	$includer_file_name = basename(__FILE__);
	include "login-signup-universal-frontend.php"
?>




<!-- backend: check login -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mysqli = new mysqli("localhost", 'root', '', "chip_website");
		session_start();
		$plant_name = $mysqli->real_escape_string($_POST['username']);
		$password = $mysqli->real_escape_string($_POST['password']);

		$query = $mysqli->query("SELECT * FROM Plants WHERE `plant_name` = '$plant_name'");
		$row = mysqli_fetch_assoc($query);
		if (($plant_name == $row['plant_name']) && ($password == $row['password'])) {
			$_SESSION['plant_name'] = $plant_name;
			print '<script>window.location.assign("plant-accept.php");</script>';
		} else {
			print '<script>alert("Username or password incorrect!");</script>';
			print '<script>window.location.assign("plant-login.php");</script>';
		}
	}
?>