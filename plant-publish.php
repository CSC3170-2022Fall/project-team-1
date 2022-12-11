<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<?php
        /*
		session_start(); //starts the session
		if (!$_SESSION['consumer']) { //checks if consumer is logged in
			header("location:index.php"); // redirects if consumer is not logged in
		}
		$consumer = $_SESSION['consumer']; //assigns consumer value
        */
        $plant_name = "apple";
		$mysqli = new mysqli("localhost", 'root', '', 'chip_website');
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$plant_name"?>!</p> <!--Displays consumer's name-->
		<a href="logout.php">Click here to logout</a><br/><br/>
		<p>Note: Leave unfeasibile operation type blank<p>
        
        <?php include "plant-publish-include-form.php" ?>
	</body>
</html>




<!-- backend: insert new machine model and machines into database -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$machine_model_name = $mysqli->real_escape_string($_POST['machine_model_name']);
        $machine_model_num = $mysqli->real_escape_string($_POST['machine_model_num']);

        $time_expense_submitted = array();
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i5_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i5_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i5_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i5_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i5_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i5_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i5_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i5_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i5_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i5_expense']));

        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i7_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i7_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i7_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i7_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i7_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i7_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i7_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i7_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i7_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i7_expense']));

        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i9_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['design-import_i9_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i9_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['etch_i9_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i9_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['bond_i9_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i9_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['drill_i9_expense']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i9_time']));
        array_push($time_expense_submitted, $mysqli->real_escape_string($_POST['test_i9_expense']));

        $size = sizeof($time_expense_submitted);
        echo "<p>size: $size</p>";

		$machine_model_not_existing = true;
		$query = $mysqli->query("SELECT `machine_model` from Machine_Models");
		while ($machine_model_row = mysqli_fetch_array($query)) {
			if ($machine_model_name == $machine_model_row['machine_model']) {
				$machine_model_not_existing = false; 
				Print '<script>alert("Machine model exists!");</script>';
				Print '<script>window.location.assign("plant-publish.php");</script>';
			}
		}

        if ($machine_model_not_existing) {
            $mysqli->query("INSERT INTO Machine_Models (`machine_model`) VALUES ('$machine_model_name')");

            for ($machine_ID = 1; $machine_ID <= $machine_model_num; $machine_ID++) {
                $mysqli->query("INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`, `available`) VALUES ('$plant_name', '$machine_ID', '$machine_model_name', '1')");
            }

            for ($i = 0; $i <= 28; $i = $i + 2) {
                if ($i < 10) {
                    $chip_model = 'i5';
                } else if ($i < 20) {
                    $chip_model = 'i7';
                } else {
                    $chip_model = 'i9';
                }

                if ($i % 10 == 0) {
                    $operation_type = 'design-import';
                } else if ($i % 10 == 2) {
                    $operation_type = 'etch';
                } else if ($i % 10 == 4) {
                    $operation_type = 'bond';
                } else if ($i % 10 == 6) {
                    $operation_type = 'drill';
                } else {
                    $operation_type = 'test';
                }

                $j = $i + 1;
                if ($time_expense_submitted[$i] != null) {
                    $mysqli->query("INSERT INTO Operations_on_Machine_Models (`machine_model`, `chip_model`, `operation_type`, `feasibility`, `time`, `expense`) VALUES ('$machine_model_name', '$chip_model', '$operation_type', '1', '$time_expense_submitted[$i]', '$time_expense_submitted[$j]')");
                } else {
                    $mysqli->query("INSERT INTO Operations_on_Machine_Models (`machine_model`, `chip_model`, `operation_type`, `feasibility`) VALUES ('$machine_model_name', '$chip_model', '$operation_type', '0')");
                }
            }
        }
    }
?>