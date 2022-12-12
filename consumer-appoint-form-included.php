<h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Appoint Form</h5>

<form action="consumer-appoint.php" method="post">
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Time budget</label>
        <div class="col-sm-9">
            <input type="range" min="100" max="1000" value="300" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="time_budget" required="required"/> 
            <output>300</output>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Expense budget</label>
        <div class="col-sm-9">
            <input type="range" min="100000" max="10000000" value="1000000" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="expense_budget" required="required"/> 
            <output>1000000</output>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i5</label>
        <div class="col-sm-9">
            <input type="range" min="1" max="10000" value="10" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="num_i5" required="required"/> 
            <output>10</output>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i7</label>
        <div class="col-sm-9">
            <input type="range" min="1" max="10000" value="10" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="num_i7" required="required"/> 
            <output>10</output>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Number of model i9</label>
        <div class="col-sm-9">
            <input type="range" min="1" max="10000" value="10" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="num_i9" required="required"/> 
            <output>10</output>
        </div>
    </div>

    <div class="row justify-content-end">
        <table border='2px' align='middle' style="margin-left:150px; font-size:medium">
            <th align='center'>Chip Model</th>
            <th align='center'>Operation Type</th>
            <th align='center'>Plant</th>
            <?php 
                $operation_types = $mysqli->query("SELECT `chip_model`, `operation_type` FROM Operation_Types ORDER BY `chip_model`, `priority`");
                $name = 1;
                while ($operation_type_row = mysqli_fetch_array($operation_types)) {
                echo "<tr>";
                    echo "<td align='center'>". "$operation_type_row[chip_model]". "</td>";
                    echo "<td align='center'>". "$operation_type_row[operation_type]". "</td>";
                    echo "<td align='center'>";
                        echo "<select name='$name' class='form-control' required='required'>";
                            $name++;
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