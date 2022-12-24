<div class="col-lg-2" id="big"></div>
<div class="col-lg-8" id="aaa">
    <div class="mt-4">
        <h5 class="font-size-20 mb-4" style="margin-top: 20px"><i
                class="mdi mdi-arrow-right text-primary me-1"></i>Publish A New Machine Model</h5>
        <form action="p-publish.php" method="post">
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Model name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="horizontal-firstname-input" name="machine_model_name"
                        required="required" />
                </div>
            </div>
            <div class="row mb-4">
                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Machine number</label>
                <div class="col-sm-6">
                    <input type="range" min="100" max="10000" value="100"
                        oninput="this.nextElementSibling.value = this.value" class="form-control"
                        id="horizontal-firstname-input" name="machine_model_num" required="required" />
                    <output>100</output>
                </div>
            </div>
            <div class="row justify-content-end col-md-28" id="bbb">
                <!-- editable tables -->
                <!-- ----------      start        -------------- -->
                <div class="table-responsive" id="ttt">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>Chip Model</th>
                                <th>Operation Type</th>
                                <th>Feasibility</th>
                                <th>Time</th>
                                <th>Expense</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $operation_types = $mysqli->query("SELECT `chip_model`, `operation_type` FROM Operation_Types ORDER BY `chip_model`, `priority`");
                            $i = 0;
                            $time = 10;
                            $expense = 100;
                            while ($operation_type_row = mysqli_fetch_array($operation_types)) {
                                echo "<tr>
                                <td data-field='Chip Model' style='width: 80px'>" . "$operation_type_row[chip_model]" . "</td>
                                <td data-field='Operation Type'>" . "$operation_type_row[operation_type]" . "</td>
                                <td data-field='Feasibility'> <input type='checkbox' name='$i' checked></input> </td>";
                                $i++;
                                echo "<td data-field='Time'>" . "<input type='range' min='1' max='100' value='$time' oninput='this.nextElementSibling.value = this.value' name='$i'/>" . "<output>$time</output>" . "</td>";
                                $i++;
                                $time = $time + 5;
                                echo "<td data-field='Expense'>" . "<input type='range' min='10' max='1000' value='$expense' oninput='this.nextElementSibling.value = this.value' name='$i'/>" . "<output>$expense</output>" . "</td>";
                                $i++;
                                $expense = $expense + 50;
                                echo "
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- editable tables -->
                <!-- -------      end     -------- -->
                <div class="col-sm-9" ;>
                    <button type="submit" style="margin-top:20px; margin-left:120px; font-size:larger;"
                        class="btn btn-primary w-md">Publish</button>
                </div>
            </div>
        </form>
    </div>
</div>