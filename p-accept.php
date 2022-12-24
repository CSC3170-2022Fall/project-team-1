<?php
$requiring_file_name = basename(__FILE__);
require_once "frontend/shared/homepage.php"
?>




<!-- backend: update processing records -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointed_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.start_time IS NULL ORDER BY o.priority ASC, o.chip_model ASC");
    while ($appointed_operation = mysqli_fetch_array($appointed_operations)) {
        $available_machines = $mysqli->query("SELECT m.machine_ID, m.machine_model, m.available, m.plant_name, o.time, o.expense FROM Machines_in_Plants AS m INNER JOIN Operations_on_Machine_Models AS o ON m.machine_model = o.machine_model JOIN Operation_Types AS c ON o.chip_model = c.chip_model AND o.operation_type = c.operation_type WHERE m.plant_name = '$plant_name' AND m.available = '1' AND o.feasibility = '1' AND c.chip_model = '$appointed_operation[chip_model]' AND c.operation_type = '$appointed_operation[operation_type]'");
        $available_machine = mysqli_fetch_array($available_machines);
        if (!empty($available_machine)) {
            $prorities = $mysqli->query("SELECT `priority` FROM Operation_Types WHERE `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
            $priority = mysqli_fetch_array($prorities);
            if ($priority['priority'] == 10) {
                $mysqli->query("UPDATE Processing_Records SET `start_time` = CURDATE(), `end_time` = ADDDATE(CURDATE(), $available_machine[time]), `expense` = '$available_machine[expense]', `machine_ID` = '$available_machine[machine_ID]', `machine_model` = '$available_machine[machine_model]' WHERE `chip_ID` = '$appointed_operation[chip_ID]' AND `package_ID` = '$appointed_operation[package_ID]' AND `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
                $mysqli->query("UPDATE Machines_in_Plants SET `available` = '0' WHERE `plant_name` = '$plant_name' AND `machine_ID` = '$available_machine[machine_ID]' AND `machine_model` = '$available_machine[machine_model]'");
            } else {
                $accepted_operations = $mysqli->query("SELECT p.end_time, p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.chip_ID = '$appointed_operation[chip_ID]' AND p.package_ID = '$appointed_operation[package_ID]' AND p.chip_model = '$appointed_operation[chip_model]' AND p.start_time IS NOT NULL ORDER BY o.priority DESC");
                $end_time = mysqli_fetch_array($accepted_operations);
                $mysqli->query("UPDATE Processing_Records SET `start_time` = '$end_time[end_time]', `end_time` = ADDDATE('$end_time[end_time]', $available_machine[time]), `expense` = '$available_machine[expense]', `machine_ID` = '$available_machine[machine_ID]', `machine_model` = '$available_machine[machine_model]' WHERE `chip_ID` = '$appointed_operation[chip_ID]' AND `package_ID` = '$appointed_operation[package_ID]' AND `chip_model` = '$appointed_operation[chip_model]' AND `operation_type` = '$appointed_operation[operation_type]'");
                $mysqli->query("UPDATE Machines_in_Plants SET `available` = '0' WHERE `plant_name` = '$plant_name' AND `machine_ID` = '$available_machine[machine_ID]' AND `machine_model` = '$available_machine[machine_model]'");
            }
        }
    }
    echo '<script>alert("Successfully accepted with available machines!");</script>';
    echo '<script>window.location.assign("plant-accept.php");</script>';
}
?>