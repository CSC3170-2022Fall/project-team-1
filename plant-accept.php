<html>
	<head>
		<title>My first PHP website</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
		<link href="styles/style.css" rel="stylesheet" type="text/css">
	</head>
	<?php
	/*
	session_start(); //starts the session
	if (!$_SESSION['plant']) { //checks if plant is logged in
		header("location:index.php"); // redirects if plant is not logged in
	}
	$plant = $_SESSION['plant']; //assigns plant value
	*/
    $plant = 'apple';
	$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$plant"?>!</p> <!--Displays plant's name-->
		<a href="logout.php">Click here to logout</a><br/><br/>

		Cuurent package appointment requests:

		<form action="plant-accept.php" method="post">
			<input type="submit" value="Accept All with Full Capcity">
		</form>
	
		<table border='2px' align='left'>
			<th>Package ID</th>
			<th>Chip Model`</th>
			<th>Chip ID</th>
			<th>Operation Type</th>
			<?php
				//operations appointed to the plant
				$appointed_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant' AND p.start_time IS NULL ORDER BY o.priority ASC, o.chip_model ASC");
				while ($row = mysqli_fetch_array($appointed_operations)) {
					Print "<tr>";
						Print '<td align="center">'. $row['package_ID'] . "</td>";
						Print '<td align="center">'. $row['chip_model'] . "</td>";
						Print '<td align="center">'. $row['chip_ID'] . "</td>";
						Print '<td align="center">'. $row['operation_type'] . "</td>";
						//Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
						//Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
					Print "</tr>";
				}
			?>
		</table>
	</body>
</html>


<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Print '<script>alert("Halfway!");</script>';
		$appointed_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant' AND p.start_time IS NULL ORDER BY o.priority ASC, o.chip_model ASC");
		while ($appointed_operation = mysqli_fetch_array($appointed_operations)) {
			$available_machines = $mysqli->query("SELECT m.machine_ID, m.machine_model, m.available, m.plant_name, o.time, o.expense FROM Machines_in_Plants AS m INNER JOIN Operations_on_Machine_Models AS o ON m.machine_model = o.machine_model JOIN Operation_Types AS c ON o.chip_model = c.chip_model AND o.operation_type = c.operation_type WHERE m.plant_name = '$plant' AND m.available = '1' AND o.feasibility = '1' AND c.chip_model = '$appointed_operation[chip_model]' AND c.operation_type = '$appointed_operation[operation_type]'");
			$available_machine = mysqli_fetch_array($available_machines);
			if (!empty($available_machine)) {
				$prorities = $mysqli->query("SELECT `priority` FROM Operation_Types WHERE `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
				$priority = mysqli_fetch_array($prorities);
				if ($priority['priority'] = 10) {
					$mysqli->query("UPDATE Processing_Records SET `start_time` = CURDATE(), `end_time` = CURDATE() + '$available_machine[time]', `expense` = '$available_machine[expense]', `machine_ID` = '$available_machine[machine_ID]', `machine_model` = '$available_machine[machine_model]' WHERE `chip_ID` = '$appointed_operation[chip_ID]' AND `package_ID` = '$appointed_operation[package_ID]' AND `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
					$mysqli->query("UPDATE Machines_in_Plants SET `available` = '0' WHERE `plant_name` = '$plant' AND `machine_ID` = '$available_machine[machine_ID]' AND `machine_model` = '$available_machine[machine_model]'");
				} else {
					$accepted_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant' AND p.chip_ID = '$appointed_operation[chip_ID]' AND p.package_ID = '$appointed_operation[package_ID]' AND p.chip_model = '$appointed_operation[chip_model]' AND p.start_time IS NOT NULL ORDER BY o.priority DESC");
					$end_time = mysqli_fetch_array($accepted_operations);
					echo $end_time['end_time'];
					$mysqli->query("UPDATE Processing_Records SET `start_time` = '$end_time[end_time]', `end_time` =  '$end_time[end_time] + $available_machine[time]', `expense` = '$available_machine[expense]', `machine_ID` = '$available_machine[machine_ID]', `machine_model` = '$available_machine[machine_model]' WHERE `chip_ID` = '$appointed_operation[chip_ID]' AND `package_ID` = '$appointed_operation[package_ID]' AND `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
					$mysqli->query("UPDATE Machines_in_Plants SET `available` = '0' WHERE `plant_name` = '$plant' AND `machine_ID` = '$available_machine[machine_ID]' AND `machine_model` = '$available_machine[machine_model]'");
				}
			}
		}		
		Print '<script>alert("Successfully accepted!");</script>';
		Print '<script>window.location.assign("plant-accept.php");</script>';
	}
?>