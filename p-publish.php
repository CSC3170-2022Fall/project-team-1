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
        $submitted_array = array();
        for ($i = 0; $i < 45; $i++) {
            if (isset($_POST["$i"])) {
                array_push($submitted_array, $mysqli->real_escape_string($_POST["$i"]));
            } else {
                array_push($submitted_array, null);
            }
        }
        $mysqli->query("INSERT INTO Machine_Models (`machine_model`) VALUES ('$machine_model_name')");
        $plant_name = $_SESSION['plant_name'];
        for ($machine_ID = 1; $machine_ID <= $machine_model_num; $machine_ID++) {
            $mysqli->query("INSERT INTO Machines_in_Plants (`plant_name`, `machine_ID`, `machine_model`, `available`) VALUES ('$plant_name', '$machine_ID', '$machine_model_name', '1')");
        }

        for ($i = 0; $i < 45; $i = $i + 3) {
            if ($i < 15) {
                $chip_model = 'i5';
            } elseif ($i < 30) {
                $chip_model = 'i7';
            } else {
                $chip_model = 'i9';
            }

            $reminder = $i % 15;
            if ($reminder == 0) {
                $operation_type = 'design-import';
            } elseif ($reminder == 3) {
                $operation_type = 'etch';
            } elseif ($reminder == 6) {
                $operation_type = 'bond';
            } elseif ($reminder == 9) {
                $operation_type = 'drill';
            } else {
                $operation_type = 'test';
            }

            $j = $i + 1;
            $k = $i + 2;
            if ($submitted_array[$i] != null) {
                $mysqli->query("INSERT INTO Operations_on_Machine_Models (`machine_model`, `chip_model`, `operation_type`, `feasibility`, `time`, `expense`) VALUES ('$machine_model_name', '$chip_model', '$operation_type', '1', '$submitted_array[$j]', '$submitted_array[$k]')");
            } else {
                $mysqli->query("INSERT INTO Operations_on_Machine_Models (`machine_model`, `chip_model`, `operation_type`, `feasibility`) VALUES ('$machine_model_name', '$chip_model', '$operation_type', '0')");
            }
        }
        echo '<script>alert("Successfully published!");</script>';
        echo '<script>window.location.assign("p-publish.php");</script>';
    }
}
?>