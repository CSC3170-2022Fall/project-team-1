<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Analysis of
    Your Operations</h5>


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
                                    <th data-priority="1">Package ID</th>
                                    <th data-priority="3">Chip Model</th>
                                    <th data-priority="1">Chip ID</th>
                                    <th data-priority="3">Operation Type</th>
                                    <th data-priority="6">Start Date</th>
                                    <th data-priority="6">End Date</th>
                                    <th data-priority="6">Expense</th>
                                    <th data-priority="3">Machine Model</th>
                                    <th data-priority="1">Machine ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Packages AS a ON p.package_ID = a.package_ID JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.start_time IS NOT NULL ORDER BY p.package_ID ASC, p.chip_model ASC, p.chip_ID ASC, o.priority ASC");
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
