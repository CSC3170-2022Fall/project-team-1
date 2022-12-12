<h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Appoint Form</h5>

<form action="consumer-appoint.php" method="post">
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Time budget</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="time_budget" required="required"/>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Expense budget</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="expense_budget" required="required"/>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i5</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i5" required="required"/>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i7</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i7" required="required"/>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i9</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="num_i9" required="required"/>
        </div>
    </div>

    <div class="row justify-content-end">
        <table border='2px' align='middle' style="margin-left:150px; font-size:medium">
            <th align='center'>Chip Model</th>
            <th align='center'>Operation Type</th>
            <th align='center'>Plant</th>
            <?php 
                $operation_types = $mysqli->query("SELECT `chip_model`, `operation_type` FROM Operation_Types ORDER BY `chip_model`, `priority`");
                $submited_names = range(1, 15, 1);

                while ($operation_type_row = mysqli_fetch_array($operation_types)) {
                echo "<tr>";
                    echo "<td align='center'>". "$operation_type_row[chip_model]". "</td>";
                    echo "<td align='center'>". "$operation_type_row[operation_type]". "</td>";
                    echo "<td align='center'>";
                        $name = array_shift($submited_names);
                        echo "<select name='$name' class='form-control' required='required'>";
                            $plants = $mysqli->query("SELECT plant_name FROM Plants");
                            while ($plant_row = mysqli_fetch_array($plants)) 
                                echo '<option>'. $plant_row['plant_name']. '</option>';
                        echo "</select>";
                    echo "</td>";
                echo "</tr>";
                } 
            ?>
        </table>
        <div align='center' style="margin-top:20px;">
            <button type="submit" class="btn btn-primary w-md" style="font-size:larger">Appoint</button>
        </div>
    </div>

</form>