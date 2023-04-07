<h5 class="font-size-20 mb-4" style="margin-top: 20px;"><i class="mdi mdi-arrow-right text-primary me-1"></i>Your
    Processing Records</h5>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['gantt']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Processing ID');//unused but cannot be deleted because it's from Google Charts API
        data.addColumn('string', 'Processing Name');
        data.addColumn('string', 'Chip Model');//displayed as Resource but cannot be modified because it's from Google Charts API
        data.addColumn('date', 'Start Date');
        data.addColumn('date', 'End Date');
        data.addColumn('number', 'Duration');
        data.addColumn('number', 'Percent Done');
        data.addColumn('string', 'Dependencies');//unused but cannot be deleted because it's from Google Charts API

        data.addRows([
            <?php
            if ($client == "consumer") {
                $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Packages AS a ON p.package_ID = a.package_ID JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE a.consumer_name = '$consumer_name' AND p.start_time IS NOT NULL ORDER BY p.package_ID ASC, p.chip_model ASC, p.chip_ID ASC, o.priority ASC");
            } else {
                $processing_records = $mysqli->query("SELECT * FROM Processing_Records AS p JOIN Plants AS a ON p.plant_name = a.plant_name JOIN Operation_Types AS o ON p.chip_model = o.chip_model AND p.operation_type = o.operation_type WHERE a.plant_name = '$plant_name' AND p.start_time IS NOT NULL ORDER BY p.package_ID ASC, p.chip_model ASC, p.chip_ID ASC, o.priority ASC");
            }
            $processing_records_num = mysqli_num_rows($processing_records);

            $processing_ID = 0;
            while ($processing_record_row = mysqli_fetch_array($processing_records)) {
                $processing_ID++;
                $processing_name = "Package $processing_record_row[package_ID] - $processing_record_row[chip_model] - Chip $processing_record_row[chip_ID] - $processing_record_row[operation_type]";
                $chip_model = $processing_record_row['chip_model'];
                $start_time = $processing_record_row['start_time'];
                $end_time = $processing_record_row['end_time'];

                $duration = $mysqli->query("SELECT DATEDIFF('$end_time', '$start_time')");
                $duration = mysqli_fetch_array($duration)[0];
                $finished = $mysqli->query("SELECT DATEDIFF(CURDATE(), '$start_time')");
                $finished = mysqli_fetch_array($finished)[0];
                $percent_done = $finished / $duration * 100;
                if ($percent_done > 100) {
                    $percent_done = 100;
                } elseif ($percent_done < 0) {
                    $percent_done = 0;
                } else {
                    $percent_done = round($percent_done, 2);
                }

                echo "['$processing_ID', '$processing_name', '$chip_model',
                new Date('$start_time'), new Date('$end_time'), null, $percent_done, null]";

                if ($processing_ID < $processing_records_num) {
                    echo ",";
                }
            }
            ?>
        ]);

        var options = {
            height: <?php echo "$processing_records_num"; ?> * 31,
            gantt: {
                trackHeight: 30
            }
    };

    var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            <?php
            if ($processing_ID > 0) {
                echo "chart.draw(data, options);";
            } else {
                echo "<h5 class='font-size-20 mb-4' style='margin-top: 20px;'><i class='mdi text-primary me-1'></i>You have no operations yet!</h5>";
            }
            ?>
        }
</script>

<div id="chart_div" style="margin: 0 auto; width:1400px" ;></div>