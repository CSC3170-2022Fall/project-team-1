<h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i>Machine Model Form</h5>

<form action="plant-publish.php" method="post">

    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Model name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="horizontal-firstname-input" name="machine_model_name" required="required"/>
        </div>
    </div>
    <div class="row mb-4">
        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Machine number</label>
        <div class="col-sm-9">
            <input type="range" min="100" max="10000" value="1000" oninput="this.nextElementSibling.value = this.value" class="form-control" id="horizontal-firstname-input" name="machine_model_num" required="required"/> 
            <output>1000</output>
        </div>
    </div>

    <div class="row justify-content-end">
        <table border='2px' align='middle'>
            <th>Chip Model</th>
            <th>Operation Type</th>
            <th>Time</th>
            <th>Expense</th>
            <?php
                $operation_types = $mysqli->query("SELECT `chip_model`, `operation_type` FROM Operation_Types ORDER BY `chip_model`, `priority`");
                $name = 1;
                $time = 10;
                $expense = 100;
                while ($operation_type_row = mysqli_fetch_array($operation_types)) {
                    echo "<tr>";
                        echo "<td align='center'>". "$operation_type_row[chip_model]". "</td>";
                        echo "<td align='center'>". "$operation_type_row[operation_type]". "</td>";
                        echo "<td align='center'>". "<input type='range' min='1' max='100' value='$time' oninput='this.nextElementSibling.value = this.value' name='$name'/>" . "<output>$time</output>". "</td>";
                        $name++;
                        $time = $time + 5;
                        echo "<td align='center'>". "<input type='range' min='10' max='1000' value='$expense' oninput='this.nextElementSibling.value = this.value' name='$name'/>" . "<output>$expense</output>". "</td>";
                        $name++;
                        $expense = $expense + 50;
                    echo "</tr>";
                } 
            ?>
        </table>
        <div class="col-sm-9"; >
            <button type="submit" style="margin-top:20px; margin-left:120px; font-size:larger;" class="btn btn-primary w-md">Publish</button>
        </div>
    </div>


</form>