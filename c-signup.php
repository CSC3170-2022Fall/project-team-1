<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/signin-signup.php"
?>




<!-- backend: insert into database -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mysqli = mysqli_connect("localhost", 'root', '', "chip_website");
	$consumer_name = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = $mysqli->query("SELECT * FROM Consumers WHERE `consumer_name` = '$consumer_name'");
	$num_row = mysqli_num_rows($query);
	echo $num_row;
	if ($num_row == 1) {
		print '<script>alert("Username has been taken!");</script>';
		print '<script>window.location.assign("c-signup.php");</script>';
	} else {
		$mysqli->query("INSERT INTO Consumers (`consumer_name`, `password`) VALUES ('$consumer_name','$password')");
		print '<script>alert("Successfully signed up and logged in!");</script>';
		$_SESSION['consumer_name'] = $consumer_name;
		print '<script>window.location.assign("c-appoint.php");</script>';
	}
}
?>