<html>
	<head>
		<title>Plant Signup</title>
	</head>
</html>

<?php
	$includer_file_name = basename(__FILE__);
	include "login-signup-universal-frontend.php"
?>




<!-- backend: insert into database -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mysqli = new mysqli("localhost", 'root', '', "chip_website");
		session_start();
		$plant_name = $mysqli->real_escape_string($_POST['username']);
		$password = $mysqli->real_escape_string($_POST['password']);

		$query = $mysqli->query("SELECT * FROM Plants WHERE `plant_name` = '$plant_name'");
		$num_row = mysqli_num_rows($query);
		echo $num_row;
		if ($num_row == 1) { 
			print '<script>alert("Username has been taken!");</script>';
			print '<script>window.location.assign("plant-signup.php");</script>';
		} else {
			$mysqli->query("INSERT INTO Plants (`plant_name`, `password`) VALUES ('$plant_name','$password')"); 
			print '<script>alert("Successfully signed up and logged in!");</script>';
			$_SESSION['plant_name'] = $plant_name;
			print '<script>window.location.assign("plant-publish.php");</script>';
		}
	}
?>
