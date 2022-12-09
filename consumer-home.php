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

		<form action="consumer-home.php" method="post">
			Enter package ID: <input type="text" name="package_ID" required="required"/> <br/>
			Enter time budget: <input type="text" name="time_budget" required="required"/> <br/>
			Enter expense budget: <input type="text" name="expense_budget" required="required"/> <br/>
			Choose plant for design-import:  
			<select name="deisng-import_plant" required="required">
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

				$query = $mysqli->query("Select * from Consumers");
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
	echo $consumer;

	$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$package_ID = $mysqli->real_escape_string($_POST['package_ID']);
		$time_budget = $mysqli->real_escape_string($_POST['time_budget']);
		$expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
		$deisn_import_plant = $mysqli->real_escape_string($_POST['deisng-import_plant']);
		$etch_plant = $mysqli->real_escape_string($_POST['etch_plant']);
		$bond_plant = $mysqli->real_escape_string($_POST['bond_plant']);
		$drill_plant = $mysqli->real_escape_string($_POST['drill_plant']);
		$test_plant = $mysqli->real_escape_string($_POST['test_plant']);
		$not_existing = true;
		$query = $mysqli->query("SELECT package_ID from Packages");

		while ($row = mysqli_fetch_array($query)) {
			if ($package_ID == $row['package_ID']) {
				$not_existing = false; 
				Print '<script>alert("package_ID has been taken!");</script>';
				Print '<script>window.location.assign("consumer-home.php");</script>';
			}
		}
		if ($not_existing) {
			$mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `consumer_name`) VALUES ('$package_ID', '$time_budget', '$expense_budget', '$consumer')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'design-import', '$deisn_import_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'etch', '$etch_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'bond', '$bond_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'drill', '$drill_plant')"); 
			$mysqli->query("INSERT INTO Operations_on_Packages_in_Plants (`package_ID`, `operation_type`, `plant_name`) VALUES ('$package_ID', 'test', '$test_plant')"); 
			Print '<script>alert("Successfully appointed!");</script>';
			Print '<script>window.location.assign("consumer-home.php");</script>';
		}
	}
?>