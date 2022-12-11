<form action="plant-publish.php" method="post">
    Enter the name of the machine model:  <input type="text" name="machine_model_name" required="required"/> <br/>
	Enter the number of the machine model: <input type="text" name="machine_model_num" required="required"/> <br/>
    <table border='2px' align='left'>
        <th>Chip Model</th>
        <th>Operation Type</th>
        <th>Time</th>
        <th>Expense</th>
        <?php
            $operation_types = $mysqli->query("SELECT `chip_model`, `operation_type` FROM Operation_Types ORDER BY `chip_model`, `priority`");

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i5_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i5_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i5_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i5_expense"/>' . "</td>";
            Print "</tr>";
            
            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i5_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i5_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i5_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i5_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i5_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i5_expense"/>' . "</td>";
            Print "</tr>";



            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i7_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i7_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i7_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i7_expense"/>' . "</td>";
            Print "</tr>";
            
            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i7_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i7_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i7_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i7_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i7_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i7_expense"/>' . "</td>";
            Print "</tr>";


            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i9_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="design-import_i9_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i9_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="etch_i9_expense"/>' . "</td>";
            Print "</tr>";
            
            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i9_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="bond_i9_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i9_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="drill_i9_expense"/>' . "</td>";
            Print "</tr>";

            $operation_type_row = mysqli_fetch_array($operation_types);
            Print "<tr>";
                Print '<td align="center">'. $operation_type_row['chip_model'] . "</td>";
                Print '<td align="center">'. $operation_type_row['operation_type'] . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i9_time"/>' . "</td>";
                Print '<td align="center">'. '<input type="text" name="test_i9_expense"/>' . "</td>";
            Print "</tr>";
        ?>
	<input type="submit" value="Publish"/>
</form>