<html>
	<head>
		<title>My first PHP website</title>
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

		<form action="plant-home.php" method="post">
			Enter package ID: <input type="text" name="package_ID" required="required"/> <br/>
			Enter time budget: <input type="text" name="time_budget" required="required"/> <br/>
			Enter expense budget: <input type="text" name="expense_budget" required="required"/> <br/>
			Enter numer of chip model A: <input type="text" name="num_chip_A" required="required"/> <br/>
			Enter numer of chip model B: <input type="text" name="num_chip_B" required="required"/> <br/>
			Enter numer of chip model C: <input type="text" name="num_chip_C" required="required"/> <br/>
			Choose plant for design-import:  
			<select name="design_import_plant" required="required">
				<?php 
					$sql = $mysqli->query("SELECT plant_name FROM Plants");
					while ($row = mysqli_fetch_array($sql)){
						echo "<option>" . $row['plant_name'] . "</option>";
					}
				?>
			</select> <br/>
			Choose plant for etch: 
			<select name="etch_plant" required="required">
				<?php 
					$sql = $mysqli->query("SELECT plant_name FROM Plants");
					while ($row = mysqli_fetch_array($sql)){
						echo "<option>" . $row['plant_name'] . "</option>";
					}
				?>
			</select> <br/>
			Choose plant for bond: 
			<select name="bond_plant" required="required">
				<?php 
					$sql = $mysqli->query("SELECT plant_name FROM Plants");
					while ($row = mysqli_fetch_array($sql)){
						echo "<option>" . $row['plant_name'] . "</option>";
					}
				?>
			</select> <br/>
			Choose plant for drill: 
			<select name="drill_plant" required="required">
				<?php 
					$sql = $mysqli->query("SELECT plant_name FROM Plants");
					while ($row = mysqli_fetch_array($sql)){
						echo "<option>" . $row['plant_name'] . "</option>";
					}
				?>
			</select> <br/>
			Choose plant for test: 
			<select name="test_plant" required="required">
				<?php 
					$sql = $mysqli->query("SELECT plant_name FROM Plants");
					while ($row = mysqli_fetch_array($sql)){
						echo "<option>" . $row['plant_name'] . "</option>";
					}
				?>
			</select> <br/>
			<input type="submit" value="Appoint"/>
		</form>

		<form action="add.php" method="POST">
			Add more to list: <input type="text" name="details"/><br/>
			public post? <input type="checkbox" name="public[]" value="yes"/><br/>
			<input type="submit" value="Add to list"/>
		</form>

		<h2 align="center">My list</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Edit</th>
				<th>Delete</th>
				<th>Public Post</th>
			</tr>
			<?php
				$mysqli = new mysqli("localhost", 'root', '', "chip_website");

				$query = $mysqli->query("Select * from plants");
				while($row = mysqli_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['package_ID'] . "</td>";
						Print '<td align="center">'. $row['password'] . "</td>";
						//Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
						//Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
						//Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
						//Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
						//Print '<td align="center">'. $row['public']. "</td>";
					Print "</tr>";
				}
			?>
		</table>
		<script>
			function myFunction(id)
			{
			var r=confirm("Are you sure you want to delete this record?");
			if (r==true)
			  {
			  	window.location.assign("delete.php?id=" + id);
			  }
			}
		</script>
	</body>
</html>


<?php
	echo $plant;

	$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$package_ID = $mysqli->real_escape_string($_POST['package_ID']);
		$time_budget = $mysqli->real_escape_string($_POST['time_budget']);
		$expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
		$design_import_plant = $mysqli->real_escape_string($_POST['design_import_plant']);
		$etch_plant = $mysqli->real_escape_string($_POST['etch_plant']);
		$bond_plant = $mysqli->real_escape_string($_POST['bond_plant']);
		$drill_plant = $mysqli->real_escape_string($_POST['drill_plant']);
		$test_plant = $mysqli->real_escape_string($_POST['test_plant']);
		$num_chip_A = $mysqli->real_escape_string($_POST['num_chip_A']);
		$num_chip_B = $mysqli->real_escape_string($_POST['num_chip_B']);
		$num_chip_C = $mysqli->real_escape_string($_POST['num_chip_C']);

		$not_existing = true;
		$query = $mysqli->query("SELECT package_ID from Packages");
		while ($row = mysqli_fetch_array($query)) {
			if ($package_ID == $row['package_ID']) {
				$not_existing = false; 
				Print '<script>alert("package_ID has been taken!");</script>';
				Print '<script>window.location.assign("plant-home.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `plant_name`, `num_chip_A`, `num_chip_B`, `num_chip_C`) VALUES ('$package_ID', '$time_budget', '$expense_budget', '$plant', '$num_chip_A', '$num_chip_B', '$num_chip_B')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'design-import_A', '$design_import_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'etch_A', '$etch_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'bond_A', '$bond_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'drill_A', '$drill_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'test_A', '$test_plant')"); 
			Print '<script>alert("Successfully appointed!");</script>';
			Print '<script>window.location.assign("plant-home.php");</script>';
		}
	}
?>