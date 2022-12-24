<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/homepage.php"
?>




<!-- backend: insert new machine model and machines into database -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $machine_model_name = $mysqli->real_escape_string($_POST['machine_model_name']);

    $query = $mysqli->query("SELECT `machine_model` FROM Machine_Models WHERE `machine_model` = '$machine_model_name'");
    $num_row = mysqli_num_rows($query);
    if ($num_row == 1) {
        echo '<script>alert("Machine model exists!");</script>';
        echo '<script>window.location.assign("p-publish.php");</script>';
    } else {
        $machine_model_num = $mysqli->real_escape_string($_POST['machine_model_num']);

        $time_expense_submitted = array();
        for ($i = 1; $i <= 30; $i++) {
            array_push($time_expense_submitted, $mysqli->real_escape_string($_POST["$i"]));
        }

        $mysqli->query("INSERT INTO Machine_Models (`machine_model`) VALUES ('$machine_model_name')");

        $plant_name = $_SESSION['plant_name'];

        echo $plant_name;
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
            } elseif ($i % 10 == 2) {
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
        echo '<script>alert("Successfully published!");</script>';
        echo '<script>window.location.assign("p-publish.php");</script>';
    }
}
?>