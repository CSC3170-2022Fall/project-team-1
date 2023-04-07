<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Analysis of
    Your Packages</h5>

<div class="row justify-content-end">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Package Information</h4>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Package ID</th>
                                <th>Time Budget</th>
                                <th>Time Needed</th>
                                <th>Expense Budget</th>
                                <th>Expense Needed</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $packages = $mysqli->query("SELECT * FROM Packages WHERE consumer_name = '$consumer_name'");
                            while ($packages_row = mysqli_fetch_array($packages)) {
                                $package_ID = $packages_row['package_ID'];
                                $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Packages AS a ON p.package_ID = a.package_ID WHERE a.consumer_name = '$consumer_name' AND p.start_time IS NOT NULL AND p.package_ID = '$package_ID' ORDER BY p.end_time ASC");
                                $processing_records_num = mysqli_num_rows($processing_records);
                                $i = 1;
                                $expense_needed = 0;
                                while ($processing_records_row = mysqli_fetch_array($processing_records)) {
                                    if ($i == 1) {
                                        $start_time = $processing_records_row['start_time'];
                                    }
                                    if ($i == $processing_records_num) {
                                        $end_time = $processing_records_row['end_time'];
                                    }
                                    $i++;
                                    $expense_needed += $processing_records_row['expense'];
                                }

                                $time_needed = $mysqli->query("SELECT DATEDIFF('$end_time', '$start_time')");
                                $time_needed = mysqli_fetch_array($time_needed)[0];

                                echo '<tr>
                                        <td>' . $package_ID . '</td>
                                        <td>' . $packages_row['time_budget'] . '</td>
                                        <td>' . $time_needed . '</td>
                                        <td>' . $packages_row['expense_budget'] . '</td>
                                        <td>' . $expense_needed . '</td>
                                        </tr>';
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

    <h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i
            class="mdi mdi-arrow-right text-primary me-1"></i>Analysis of Your Operations</h5>

    <!-- responsive table start -->
    <!-- ------------ start -------------- -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Processing information</h4>
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>Package ID</th>
                                        <th>Chip Model</th>
                                        <th>Chip ID</th>
                                        <th>Operation Type</th>
                                        <th data-priority="6">Start Date</th>
                                        <th data-priority="6">End Date</th>
                                        <th data-priority="6">Expense</th>
                                        <th data-priority="3">Plant</th>
                                        <th data-priority="3">Machine Model</th>
                                        <th data-priority="1">Machine ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Packages AS a ON p.package_ID = a.package_ID JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE a.consumer_name = '$consumer_name' AND p.start_time IS NOT NULL ORDER BY p.package_ID ASC, p.chip_model ASC, p.chip_ID ASC, o.priority ASC");
                                    $processing_records_num = mysqli_num_rows($processing_records);
                                    while ($processing_records_row = mysqli_fetch_array($processing_records)) {
                                        echo '<tr>
                                            <th>' . $processing_records_row['package_ID'] . '</th>
                                            <td>' . $processing_records_row['chip_model'] . '</td>
                                            <td>' . $processing_records_row['chip_ID'] . '</td>
                                            <td>' . $processing_records_row['operation_type'] . '</td>
                                            <td>' . $processing_records_row['start_time'] . '</td>
                                            <td>' . $processing_records_row['end_time'] . '</td>
                                            <td>' . $processing_records_row['expense'] . '</td>
                                            <td>' . $processing_records_row['plant_name'] . '</td>
                                            <td>' . $processing_records_row['machine_model'] . '</td>
                                            <td>' . $processing_records_row['machine_ID'] . '</td>
                                            </tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <!-- responsive table  -->
    <!-- ------------ end -------------- -->

</div>