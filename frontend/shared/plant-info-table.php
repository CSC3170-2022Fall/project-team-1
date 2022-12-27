<?php
$client = "consumer";
if ($_SESSION['consumer_name']) {
    $consumer_name = $_SESSION['consumer_name'];
} else {
    echo '<script>window.location.assign("consumer-login.php");</script>';
}
$mysqli = new mysqli("localhost:3316", 'root', '', "chip_website");
?>



<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Avilable
    Machine Models
</h5>



<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- card -->
            <div class="card-body">

                <h4 class="card-title" >Click the model names to see
                their information</h4>

                <!-- table -->
                <!-- ---------- start ---------- -->
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Plant Name</th>
                            <th>Machine Model</th>
                            <th>Available Number</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                            $machines = $mysqli->query("SELECT * FROM machines_in_Plants WHERE `available` = 1 ORDER BY `plant_name` ASC, `machine_model` ASC");
                            while ($machines_row = mysqli_fetch_array($machines)) {
                                $available_number = 0;
                                $plant_name = $machines_row['plant_name'];
                                $machine_model = $machines_row['machine_model'];

                                while ($machines_row = mysqli_fetch_array($machines)) {
                                    if ($plant_name == $machines_row['plant_name'] && $machine_model == $machines_row['machine_model']) {
                                        $available_number++;
                                    }
                                }

                                echo "<tr>
                                    <td>$plant_name</td>
                                    <td> <form method='post' action='c-plant-info.php'> <button type='submit' name='machine_model' value='$machine_model' class='btn btn-link waves-effect'>$machine_model </button> </form> </td>
                                    <td>$available_number</td>
                                </tr>
                                ";
                            }
                        ?>
                        
                    </tbody>
                </table>
                <!-- table -->
                <!-- ---------- end -------------- -->

            </div>
            <!-- card end -->
            <!-- ------------ end --------------- -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title" >Machine Model Information</h4>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                        <th>Machine Model</th>
                            <th>Operation Type</th>
                            <th>Feasibility</th>
                            <th>Time (Day)</th>
                            <th>Expense (Dollar)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $machine_model = $_POST['machine_model'];
                                $machine_model_info = $mysqli->query("SELECT * FROM Operations_on_Machine_Models WHERE `machine_model` = '$machine_model'");

                                while ($operation_info = mysqli_fetch_array($machine_model_info)) {
                                    $operation_type = $operation_info['operation_type'];
                                    $feasibility = $operation_info['feasibility'];
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

