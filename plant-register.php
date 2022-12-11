<html>
	<head>
		<title>plant_registration</title>
	</head>
	<body>
		<h2>Registration Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="plant-register.php" method="post">
			Enter plant_name: <input type="text" name="plant_name" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>




<!-- backend: insert consumer info into database -->
<?php
	$mysqli = new mysqli("localhost", 'root', '', "chip_website");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$plant_name = $mysqli->real_escape_string($_POST['plant_name']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$not_existing = true;
		$query = $mysqli->query("SELECT * from Plants");

		while ($row = mysqli_fetch_array($query)) {
			if ($plant_name == $row['plant_name']) {
				$not_existing = false; 
				Print '<script>alert("plant_name has been taken!");</script>';
				Print '<script>window.location.assign("plant-register.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Consumers (`plant_name`, `password`) VALUES ('$plant_name','$password')"); 
			Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("plant-register.php");</script>';
		}
	}
?>