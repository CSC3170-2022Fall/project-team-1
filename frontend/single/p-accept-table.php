<?php
$appointed_operations = $mysqli->query("SELECT p.package_ID, p.chip_ID, p.operation_type, p.chip_model FROM Processing_Records As p INNER JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE p.plant_name = '$plant_name' AND p.start_time IS NULL ORDER BY p.chip_ID ASC, o.priority ASC");
$appointment_num = mysqli_num_rows($appointed_operations);
?>


<div class="row">
    <div class="col-12">
        <div >
            <!-- card -->
			<form action="p-accept.php" method="post">
				<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi text-primary me-1"></i>
					You have received
					<?php echo "$appointment_num"; ?> appointments. Click to accept!</h5>

				<div class="row justify-content-end" >
					<div class="col-sm-9" >

						<button type="submit" class="btn btn-primary w-md"
							style="margin-bottom:30px; font-size:large; float:right;">Accept using
							all available machines!</button>
					</div>
					<div class="card-body">
				
						<!-- table -->
						<!-- ---------- start ---------- -->
						<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<tr>
								<th>Package ID</th>
								<th>Chip Model</th>
								<th>Chip ID</th>
								<th>Operation Type</th>
								</tr>
							</thead>

							<tbody>
								<?php
								while ($appointed_operation_row = mysqli_fetch_array($appointed_operations)) {
									echo '<tr>
									<td>' . $appointed_operation_row['package_ID'] . '</td>
									<td>' . $appointed_operation_row['chip_model'] . '</td>
									<td>' . $appointed_operation_row['chip_ID'] . '</td>
									<td>' . $appointed_operation_row['operation_type'] . '</td>
								</tr>';
								}
								?>
								
							</tbody>
						</table>
						<!-- table -->
						<!-- ---------- end -------------- -->
					</div>
				</div>
			</form>
            <!-- card end -->
            <!-- ------------ end --------------- -->
        </div>
    </div>
</div>
