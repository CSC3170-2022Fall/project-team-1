<html>
	<head>
		<title>plant login website</title>
	</head>
	<body>
		<h2>Login Page</h2>
		<a href="index.php">Click here to go back</a><br/><br/>
		<form action="plant-login.php" method="post">
			Enter plant_name: <input type="text" name="plant_name" required="required"/> <br/>
			Enter Password: <input type="password" name="password" required="required" /> <br/>
			<input type="submit" value="Login"/>
		</form>
	</body>
</html>




<!-- backend: check login -->
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$mysqli = new mysqli("localhost", 'root', '', "chip_website");

		session_start();
		$plant_name = $mysqli->real_escape_string($_POST['plant_name']);
		$password = $mysqli->real_escape_string($_POST['password']);

		$query = $mysqli->query("SELECT * from Plants WHERE plant_name='$plant_name'"); //Query the plants table if there are matching rows equal to $plant_name
		$exists = mysqli_num_rows($query); //Checks if plant_name exists
		$table_plants = "";
		$table_password = "";
		if ($exists > 0) { //IF there are no returning rows or no existing plant_name
			while ($row = mysqli_fetch_assoc($query)) { //display all rows from query
				$table_plants = $row['plant_name']; // the first plant_name row is passed on to $table_plants, and so on until the query is finished
				$table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
			}
			if (($plant_name == $table_plants) && ($password == $table_password)) { // checks if there are any matching fields
				if ($password == $table_password) {
					$_SESSION['plant'] = $plant_name; //set the consumer_name in a session. This serves as a global variable
					header("location: consumer-home.php"); // redirects the user to the authenticated home page
				}
			} else {
				print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
				print '<script>window.location.assign("plant-login.php");</script>'; // redirects to login.php
			}
		} else {
			print '<script>alert("Incorrect consumer_name!");</script>'; //Prompts the user
			print '<script>window.location.assign("plant-login.php");</script>'; // redirects to login.php
		}
	}
?>