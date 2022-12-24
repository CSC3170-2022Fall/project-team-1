<?php
$requiring_file_name = basename(__FILE__);
include "shared/signin-signup-shared.php"
?>




<!-- backend: insert into database -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mysqli = new mysqli("localhost:3316", 'root', '', "chip_website");
	session_start();
	$consumer_name = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);

	$query = $mysqli->query("SELECT * FROM Consumers WHERE `consumer_name` = '$consumer_name'");
	$num_row = mysqli_num_rows($query);
	echo $num_row;
	if ($num_row == 1) {
		print '<script>alert("Username has been taken!");</script>';
		print '<script>window.location.assign("consumer-signup.php");</script>';
	} else {
		$mysqli->query("INSERT INTO Consumers (`consumer_name`, `password`) VALUES ('$consumer_name','$password')");
		print '<script>alert("Successfully signed up and logged in!");</script>';
		$_SESSION['consumer_name'] = $consumer_name;
		print '<script>window.location.assign("consumer-appoint.php");</script>';
	}
}
?>