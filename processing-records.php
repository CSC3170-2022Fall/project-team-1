<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your appoints in this month</title>
    <script type="text/javascript" src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.bootcss.com/echarts/3.7.1/echarts.min.js"></script>
</head>
<body>

<div id="container" style = "height:900px"></div>
<script>
var myCharts = echarts.init(document.getElementById("container"));
var ids = [], timebudget = [], design_import=[], etch0=[], bond0=[], drill0=[], test0=[],starts=[],ends=[];
var design_end = [], etch_end=[],bond_end=[],drill_end=[],test_end=[];
<?php
    $packages = $mysqli->query("SELECT * from Packages WHERE consumer_name='$consumer_name' and datediff(month,[dateadd],getdate())=0");
    $process = $mysqli->query("SELECT distinct start_time,end_time from Processing_Records WHERE package_ID in '$packages'and datediff(month,[dateadd],getdate())=0");
    $operation = $mysqli->query("SELECT time,operation_type from Processing_Records WHERE package_ID in '$packages' and datediff(month,[dateadd],getdate())=0");

?>
    for(var id in $packages.package_ID) ids.push(id);
    for(var budget in $packages.time_budget) timebudget.push(budget);
    for(var i in $process.start_time) starts.push(i);
    for(var j in $process.end_time) ends.push(j);
    var k = 0;
    for(var type in $operation){
        if(type=="design-import"){ 
            design_import.push($operation.time[k]);
            design_end.push(ends[k/5]+$operation.time[k]);
        }
        if(type=="etch"){
            etch0.push($operation.time[k]);
            etch_end.push(design_end[k/5]+$operation.time[k]);
        }
        if(type=="bond"){
            bond0.push($operation.time[k]);
            bond_end.push(etch_end[k/5]+$operation.time[k]);
        }
        if(type=="drill"){
            drill0.push($operation.time[k]);
            drill_end.push(bond_end[k/5]+$operation.time[k]);
        }
        if(type=="test"){
            test0.push($operation.time[k]);
            test_end.push(drill_end[k/5]+$operation.time[k]);
        }
    }

var option = {
    backgroundColor: "#fff",
    title: {
        text: "项目工期",
        padding: 20,
        textStyle: {
            fontSize: 17,
            fontWeight: "bolder",
            color: "#333"
        },
        subtextStyle: {
            fontSize: 13,
            fontWeight: "bolder"
        }
    },
    legend: {
        data: ["time_cost", "design-import", "etch", "bond", "drill", "test"],
        align: "right",
        right: 80,
        top: 50
    },
    grid: {
        containLabel: true,
        show: false,
        right: 130,
        left: 40,
        bottom: 40,
        top: 90
    },
    xAxis: {
        type: "time",
        axisLabel: {
            "show": true,
            "interval": 0
        }
    },
    yAxis: {
        axisLabel: {
            show: true,
            interval: 0,
            formatter: function(value, index) {
                var last = ""
                var max = 5;
                var len = value.length;
                var hang = Math.ceil(len / max);
                if (hang > 1) {
                    for (var i = 0; i < hang; i++) {
                        var start = i * max;
                        var end = start + max;
                        var temp = value.substring(start, end) + "\n";
                        last += temp; //凭借最终的字符串
                    }
                    return last;
                } else {
                    return value;
                }
            }
        },
        data: ids
    },
    tooltip: {
        trigger: "axis",
        formatter: function(params) {
            var res = "";
            var name = "";
            var start0 = "";
            var start = "";
            var end0 = "";
            var end = "";
            for (var i in params ) {

                if (i==0) {
                    name = params[i].seriesName;
                    res+= name + " : " + params[i].data;
                }
                else{
                    var k = i % 2;
                    if (k) {
                        start0 = params[i].data;
                        console.log(start0)
                        start = start0.getFullYear() + "-" + (start0.getMonth() + 1) + "-" + start0.getDate();
                    }
                    if (!k) {
                        name = params[i].seriesName;
                        end0 = params[i].data;
                        end = end0.getFullYear() + "-" + (end0.getMonth() + 1) + "-" + end0.getDate();
                        res += name + " : " + end + "~" + start + "</br>";
                    }
                }
            }
            return res;
        }
    },
    series: [{
            name: "time_budget",
            type: "bar",
            stack: "总量0",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "skyblue",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: timebudget
        },

        { 
            name: "time_cost",
            type: "bar",
            stack: "总量1",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "green",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: ends
        },
        {
            name: "time_cost",
            type: "bar",
            stack: "总量1",
            itemStyle: {
                normal: {
                    color: "white",
                }
            },
            zlevel: -1,
            z: 3,
            data: starts
        },
        
        {
            name: "design-import",
            type: "bar",
            stack: "总量2",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "green",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data : design_end
        },
        {
            name: "design-import",
            type: "bar",
            stack: "总量2",
            itemStyle: {
                normal: {
                    color: "white",
                }
            },
            zlevel: -1,
            z: 3,
            data: ends
        },
        {
            name: "etch",
            type: "bar",
            stack: "总量3",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "red",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: etch_end
        },
        {
            name: "etch",
            type: "bar",
            stack: "总量3",
            itemStyle: {
                normal: {
                    color: "white"
                }
            },
            zlevel: -1,
            z: 3,
            data: design_end
        },
        {
            name: "bond",
            type: "bar",
            stack: "总量4",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "brown",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: bond_end
        },
        {
            name: "bond",
            type: "bar",
            stack: "总量4",
            itemStyle: {
                normal: {
                    color: "white",
                }
            },
            zlevel: -1,
            z: 3,
            data: etch_end
        },
        {
            name: "drill",
            type: "bar",
            stack: "总量5",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: "yellow",
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: drill_end
        },
        {
            name: "drill",
            type: "bar",
            stack: "总量5",
            itemStyle: {
                normal: {
                    color: "white",
                }
            },
            zlevel: -1,
            z: 3,
            data : bond_end
        },
        {
            name: "test",
            type: "bar",
            stack: "总量6",
            label: {
                normal: {
                    show: true,
                    color: "#000",
                    position: "right",
                    formatter: function(params) {
                        return params.seriesName
                    }
                }
            },
            itemStyle: {
                normal: {
                    color: 'orange',
                    borderColor: "#fff",
                    borderWidth: 2
                }
            },
            zlevel: -1,
            data: test_end
        },
        {
            name: "test",
            type: "bar",
            stack: "总量6",
            itemStyle: {
                normal: {
                    color: 'white',
                }
            },
            zlevel: -1,
            z: 3,
            data: drill_end
        },
    ]
}

myCharts.setOption(option);
</script>
    
</body>
</html>
