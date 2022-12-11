<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<body>
		<h2>Registration Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="consumer-register.php" method="post">
			Enter consumer_name: <input type="text" name="consumer_name" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>




<!-- backend: insert consumer info into database -->
<?php
	$mysqli = new mysqli("localhost", 'root', '', "chip_website");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$consumer_name = $mysqli->real_escape_string($_POST['consumer_name']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$not_existing = true;
		$query = $mysqli->query("SELECT * from Consumers");

		while ($row = mysqli_fetch_array($query)) {
			if ($consumer_name == $row['consumer_name']) {
				$not_existing = false; 
				Print '<script>alert("consumer_name has been taken!");</script>';
				Print '<script>window.location.assign("consumer-register.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Consumers (`consumer_name`, `password`) VALUES ('$consumer_name','$password')"); 
			Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("consumer-register.php");</script>';
		}
	}
?>