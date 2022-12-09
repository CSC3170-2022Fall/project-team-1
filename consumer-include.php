<form action="consumer-home.php" method="post">
	Enter package ID: <input type="text" name="package_ID" required="required"/> <br/>
	Enter time budget: <input type="text" name="time_budget" required="required"/> <br/>
	Enter expense budget: <input type="text" name="expense_budget" required="required"/> <br/>
	Enter numer of chip model i5: <input type="text" name="num_chip_i5" required="required"/> <br/>
	Enter numer of chip model i7: <input type="text" name="num_chip_i7" required="required"/> <br/>
	Enter numer of chip model i9: <input type="text" name="num_chip_i9" required="required"/> <br/>
	Choose plant for design-import i5:  
	<select name="design_import_plant_i5" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for etch i5: 
	<select name="etch_plant_i5" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for bond i5: 
	<select name="bond_plant_i5" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for drill i5: 
	<select name="drill_plant_i5" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for test i5: 
	<select name="test_plant_i5" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	
	Choose plant for design-import i7:  
	<select name="design_import_plant_i7" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for etch i7: 
	<select name="etch_plant_i7" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for bond i7: 
	<select name="bond_plant_i7" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for drill i7: 
	<select name="drill_plant_i7" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for test i7: 
	<select name="test_plant_i7" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	
	Choose plant for design-import i9:  
	<select name="design_import_plant_i9" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for etch i9: 
	<select name="etch_plant_i9" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for bond i9: 
	<select name="bond_plant_i9" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for drill i9: 
	<select name="drill_plant_i9" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	Choose plant for test i9: 
	<select name="test_plant_i9" required="required">
		<?php 
			$sql = $mysqli->query("SELECT plant_name FROM Plants");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option>" . $row['plant_name'] . "</option>";
			}
		?>
	</select> <br/>
	<input type="submit" value="Appoint"/>
</form>