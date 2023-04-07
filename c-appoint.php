<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/homepage.php"
?>




<!-- backend: insert new records into processing records -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time_budget = $mysqli->real_escape_string($_POST['time_budget']);
    $expense_budget = $mysqli->real_escape_string($_POST['expense_budget']);
    $num_i5 = $mysqli->real_escape_string($_POST['num_i5']);
    $num_i7 = $mysqli->real_escape_string($_POST['num_i7']);
    $num_i9 = $mysqli->real_escape_string($_POST['num_i9']);

    $plants = array();
    for ($i = 1; $i <= 15; $i++) {
        array_push($plants, $mysqli->real_escape_string($_POST["$i"]));
    }

    $query = $mysqli->query("SELECT `package_ID` FROM Packages ORDER BY `package_ID` DESC");
    $max_package_ID_row = mysqli_fetch_array($query);
    $new_package_ID = 1;
    if ($max_package_ID_row) {
        $new_package_ID = $max_package_ID_row['package_ID'] + 1;
    }

    $mysqli->query("INSERT INTO Packages (`package_ID`, `time_budget`, `expense_budget`, `consumer_name`) VALUES ('$new_package_ID', '$time_budget', '$expense_budget', '$consumer_name')");

    for ($chip_ID = 1; $chip_ID <= $num_i5; $chip_ID++) {
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[0]', 'i5')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[1]', 'i5')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[2]', 'i5')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[3]', 'i5')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[4]', 'i5')");
    }
    for ($chip_ID = 1; $chip_ID <= $num_i7; $chip_ID++) {
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[5]', 'i7')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[6]', 'i7')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[7]', 'i7')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[8]', 'i7')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[9]', 'i7')");
    }
    for ($chip_ID = 1; $chip_ID <= $num_i9; $chip_ID++) {
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('design-import', '$chip_ID', '$new_package_ID', '$plants[10]', 'i9')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('etch', '$chip_ID', '$new_package_ID', '$plants[11]', 'i9')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('bond', '$chip_ID', '$new_package_ID', '$plants[12]', 'i9')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('drill', '$chip_ID', '$new_package_ID', '$plants[13]', 'i9')");
        $mysqli->query("INSERT INTO Processing_Records (`operation_type`, `chip_ID`, `package_ID`, `plant_name`, `chip_model`) VALUES ('test', '$chip_ID', '$new_package_ID', '$plants[14]', 'i9')");
    }
    print '<script>alert("Successfully appointed!");</script>';
    print '<script>window.location.assign("c-appoint.php");</script>';
}
?>