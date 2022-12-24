<?php
$client = "consumer";
session_start();
if ($_SESSION['consumer_name']) {
    $consumer_name = $_SESSION['consumer_name'];
} elseif ($_SESSION['plant_name']) {
    $plant_name = $_SESSION['plant_name'];
    $client = "plant";
} else {
    echo '<script>window.location.assign("index.php");</script>';
}

$mysqli = new mysqli("localhost:3316", 'root', '', "chip_website");
?>



<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Analysis of
    Your Operations</h5>

<div class="row justify-content-end">

    <div class="row justify-content-end">
        <table border='2px' style="margin-left:150px; font-size:medium">
            <th>Package ID</th>
            <th>Chip Model</th>
            <th>Chip ID</th>
            <th>Operation Type</th>
            <th>Expense</th>
            <th>Machine Model</th>
            <th>Machine ID</th>
            <?php
            $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Packages AS a ON p.package_ID = a.package_ID JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.start_time IS NOT NULL ORDER BY p.package_ID ASC, p.chip_model ASC, p.chip_ID ASC, o.priority ASC");
            $processing_records_num = mysqli_num_rows($processing_records);
            while ($processing_records_row = mysqli_fetch_array($processing_records)) {
                echo '<tr>
                <td>' . $processing_records_row['package_ID'] . '</td>
                <td>' . $processing_records_row['chip_model'] . '</td>
                <td>' . $processing_records_row['chip_ID'] . '</td>
                <td>' . $processing_records_row['operation_type'] . '</td>
                <td>' . $processing_records_row['expense'] . '</td>
                <td>' . $processing_records_row['machine_model'] . '</td>
                <td>' . $processing_records_row['machine_ID'] . '</td>
                </tr>';
            }
            ?>
        </table>

    </div>