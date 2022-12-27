<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/signin-signup.php"
?>




<!-- backend: check login -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mysqli = new mysqli("localhost:3316", 'root', '', "chip_website");
	session_start();
	$consumer_name = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);
	
	$query = $mysqli->query("SELECT * FROM Consumers WHERE `consumer_name` = '$consumer_name'");
	$row = mysqli_fetch_assoc($query);
	if (($consumer_name == $row['consumer_name']) && ($password == $row['password'])) {
		$_SESSION['consumer_name'] = $consumer_name;
		print '<script>window.location.assign("c-appoint.php");</script>';
	} else {
		print '<script>alert("Username or password incorrect!");</script>';
		print '<script>window.location.assign("c-signin.php");</script>';
	}
}
?>
