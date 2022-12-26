<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Available
    Machine Models</h5>

<p class="font-size-16 mb-4" style="margin-top: 20px;"><i class="mdi text-primary me-1"></i>Click the model names to see
    their information</p>

<div class="row justify-content-end">
    <table border='2px' style="margin-left:150px; font-size:medium">
        <th>Plant Name</th>
        <th>Machine Model</th>
        <th>Available Number</th>

        <?php
        $machines = $mysqli->query("SELECT * FROM Machines_in_Plants WHERE `available` = 1 ORDER BY `plant_name` ASC, `machine_model` ASC");
        $available_number = 0;
        while ($machines_row = mysqli_fetch_array($machines)) {
            $available_number = $available_number > 0 ? 2 : 1;
            $plant_name = $machines_row['plant_name'];
            $machine_model = $machines_row['machine_model'];

            while ($machines_row = mysqli_fetch_array($machines)) {
                if ($plant_name == $machines_row['plant_name'] && $machine_model == $machines_row['machine_model']) {
                    $available_number++;
                } else {
                    break;
                }
            }

            if ($client == "consumer") {
                $submit_file = "c-plant-info.php";
            } else {
                $submit_file = "p-plant-info.php";
            }

            echo "<tr>
                <td>$plant_name</td>
                <td> <form method='post' action='$submit_file'> <button type='submit' name='machine_model' value='$machine_model'>$machine_model </button> </form> </td>
                <td>$available_number</td>
            </tr>
            ";
        }
        ?>
    </table>
</div>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $machine_model = $_POST['machine_model'];
    $machine_model_info = $mysqli->query("SELECT * FROM Operations_on_Machine_Models WHERE `machine_model` = '$machine_model'");

    echo "<div class='mt-4'>
    <div class='row justify-content-end'>
    <table border='2px' style='margin-left:150px; font-size:medium'>
        <th>Machine Model</th>
        <th>Operation Type</th>
        <th>Feasibility</th>
        <th>Time (Day)</th>
        <th>Expense (Dollar)</th>
        ";
    while ($operation_info = mysqli_fetch_array($machine_model_info)) {
        $operation_type = $operation_info['operation_type'];
        $feasibility = $operation_info['feasibility'] == 1 ? "Yes" : "No";
        $time = $operation_info['time'];
        $expense = $operation_info['expense'];
        echo "<tr>
                <td>$machine_model</td>
                <td>$operation_type</td>
                <td>$feasibility</td>
                <td>$time</td>
                <td>$expense</td>
            </tr>
            ";
    }
    echo "</table>
    </div>
    </div>";
}
?>