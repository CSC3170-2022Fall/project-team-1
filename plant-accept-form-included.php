<?php 
	$appointed_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.start_time IS NULL ORDER BY p.chip_ID ASC, o.priority ASC");
	$appointment_num = mysqli_num_rows($appointed_operations);
?>

<form action="plant-accept.php" method="post">
	<div class="row mb-4">
		<label for="horizontal-firstname-input" style="font-size:large;">Congratulations! You have received <?php echo "$appointment_num";?> appointments! Clicl to accept!</label>
	</div>
	<div class="row justify-content-end">
		<div class="col-sm-9">
			<button type="submit" class="btn btn-primary w-md" style="margin-bottom:30px; font-size:large;">Accept using full capacity!</button>
		</div>
		<table border='2px' align='middle' style="margin-left:150px; font-size:medium">
			<th>Package ID</th>
			<th>Chip Model</th>
			<th>Chip ID</th>
			<th>Operation Type</th>
			<?php
				while ($appointed_operation_row = mysqli_fetch_array($appointed_operations)) {
					echo "<tr>";
						echo "<td align='center'>". $appointed_operation_row['package_ID'] . "</td>";
						echo "<td align='center'>". $appointed_operation_row['chip_model'] . "</td>";
						echo "<td align='center'>". $appointed_operation_row['chip_ID'] . "</td>";
						echo "<td align='center'>". $appointed_operation_row['operation_type'] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</form>