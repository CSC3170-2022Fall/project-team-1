<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<?php
		session_start(); //starts the session
		if (!$_SESSION['consumer']) { //checks if consumer is logged in
			header("location:index.php"); // redirects if consumer is not logged in
		}
		$consumer = $_SESSION['consumer']; //assigns consumer value
		$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$consumer"?>!</p> <!--Displays consumer's name-->
		<a href="logout.php">Click here to logout</a><br/><br/>

		<p>Note: Research before appointing as some plants may not the machines to finish some operations.<p>

		<?php include "consumer-include.php" ?>
	</body>
</html>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$package_ID = $mysqli->real_escape_string($_POST['package_ID']);
		$time_budget = $mysqli->real_escape_string($_POST['time_budget']);
		$expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
		$num_i5 = $mysqli->real_escape_string($_POST['num_i5']);
		$num_i7 = $mysqli->real_escape_string($_POST['num_i7']);
		$num_i9 = $mysqli->real_escape_string($_POST['num_i9']);

		$design_import_plant_i5 = $mysqli->real_escape_string($_POST['design_import_plant_i5']);
		$etch_plant_i5 = $mysqli->real_escape_string($_POST['etch_plant_i5']);
		$bond_plant_i5 = $mysqli->real_escape_string($_POST['bond_plant_i5']);
		$drill_plant_i5 = $mysqli->real_escape_string($_POST['drill_plant_i5']);
		$test_plant_i5 = $mysqli->real_escape_string($_POST['test_plant_i5']);
		$design_import_plant_i7 = $mysqli->real_escape_string($_POST['design_import_plant_i7']);
		$etch_plant_i7 = $mysqli->real_escape_string($_POST['etch_plant_i7']);
		$bond_plant_i7 = $mysqli->real_escape_string($_POST['bond_plant_i7']);
		$drill_plant_i7 = $mysqli->real_escape_string($_POST['drill_plant_i7']);
		$test_plant_i7 = $mysqli->real_escape_string($_POST['test_plant_i7']);
		$design_import_plant_i9 = $mysqli->real_escape_string($_POST['design_import_plant_i9']);
		$etch_plant_i9 = $mysqli->real_escape_string($_POST['etch_plant_i9']);
		$bond_plant_i9 = $mysqli->real_escape_string($_POST['bond_plant_i9']);
		$drill_plant_i9 = $mysqli->real_escape_string($_POST['drill_plant_i9']);
		$test_plant_i9 = $mysqli->real_escape_string($_POST['test_plant_i9']);

		$not_existing = true;
		$query = $mysqli->query("SELECT package_ID from Packages");
		while ($row = mysqli_fetch_array($query)) {
			if ($package_ID == $row['package_ID']) {
				$not_existing = false; 
				Print '<script>alert("package_ID has been taken!");</script>';
				Print '<script>window.location.assign("consumer-appoint.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `consumer_name`) VALUES ('$package_ID', '$time_budget', '$expense_budget', '$consumer')"); 

			for ($chip_ID = 1; $chip_ID <= $num_i5; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i5', 'i5')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i5', 'i5')");
			}
			for ($chip_ID = $num_i5 + 1; $chip_ID <= $num_i5 + $num_i7; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i7', 'i7')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i7', 'i7')");
			}
			for ($chip_ID = $num_i5 + $num_i7 + 1; $chip_ID <= $num_i5 + $num_i7 + $num_i9; $chip_ID++) {
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$package_ID', '$design_import_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$package_ID', '$etch_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$package_ID', '$bond_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$package_ID', '$drill_plant_i9', 'i9')");
				$mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$package_ID', '$test_plant_i9', 'i9')");
			}

			Print '<script>alert("Successfully appointed!");</script>';
			Print '<script>window.location.assign("consumer-appoint.php");</script>';
		}
	}
?>