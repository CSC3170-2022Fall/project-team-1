<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="/static/js/echarts.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css" />
    <style>
      body {
        font-family: Roboto, Times
      }
      h1 {
        display: inline-block;
      }
    </style>
	<link rel="stylesheet" type="text/css" href="../../assets/js/js/stacked-gantt-master/dist/jquery.stacked-gantt.css">
	<script type="text/javascript" src="../../assets/js/js/stacked-gantt-master/libs/jquery/jquery.js"></script>
	<script type="text/javascript" src="../../assets/js/js/stacked-gantt-master/dist/jquery.stacked-gantt.min.js"></script>


</head>
<body>
    <h1>StackedGantt Example</h1>
    <div id="timeline" style="width: 100%"></div>

    <h1>Schedules Example</h1>
    <div id="jobschedules" style="height: 400px; width: 50%"></div>

    
</body>
<script>

    function createDate(time, daysToSum)
    {
      var split = time.split(':');
      var ret = new Date();
      ret.setHours(split[0]);
      ret.setMinutes(split[1]);

      if(daysToSum) ret.setDate(ret.getDate()+daysToSum);
        return ret;
    }

    // {# description: 行标题； thresholds: 中间黑色划线；markers: 提醒事件，长度极短； #}
    // {# activities: 甘特图中的区域； code: 在style里可以设置不同的颜色；#}
    var timedata = [
      {
        description: 'Joe Montana',
        thresholds: [{ begin: createDate('09:00'), end: createDate('12:00') },
                     { begin: createDate('13:00'), end: createDate('18:00') }],
        markers: [ { description: 'Remember to take a break!', when: createDate('15:30'), onClick: null }],
        activities: [
          { code: 'STDUP', description: 'Standup Meeting', begin: createDate('09:00'), end: createDate('09:30') },
          { code: 'DEV', description: 'Users CRUD', begin: createDate('09:00'), end: createDate('12:00') },
          { code: 'REV', description: 'Code Review', begin: createDate('13:00'), end: createDate('14:00') },
          { code: 'DEV', description: 'Permissions CRUD', begin: createDate('14:00'), end: createDate('18:00') },
        ]
      },
      {
        description: 'Jack Wimbledon',
        thresholds: [{ begin: createDate('08:00'), end: createDate('11:00') },
                     { begin: createDate('12:30'), end: createDate('17:00') }],
        markers: [ { description: 'Remember to take a break!', when: createDate('14:30'), onClick: null }],
        activities: [
          { code: 'REV', description: 'Code Review', begin: createDate('08:00'), end: createDate('09:00') },
          { code: 'STDUP', description: 'Standup Meeting', begin: createDate('09:00'), end: createDate('09:30') },
          { code: 'DEV', description: 'Calendar CRUD', begin: createDate('09:30'), end: createDate('11:30') },
          { code: 'DEV', description: 'Calendar CRUD', begin: createDate('12:30'), end: createDate('17:00') },
        ]
      },
      {
        description: 'Stella Alberton',
        activities: [
          { code: 'STDUP', description: 'Standup Meeting', begin: createDate('09:00'), end: createDate('09:30') },
          { code: 'DEVOPS', description: 'Config Kubernetes', begin: createDate('09:30'), end: createDate('12:00') },
          { code: 'DEVOPS', description: 'Config Kubernetes', begin: createDate('20:15'), end: createDate('02:00', 1) },
        ]
      },
    ];

    var generalMarkers = [
        { description: "Investor's visit", when: createDate('13:15'), color: "#e942cd", width: "5px",
          onClick: function(marker) {
            alert('Very important! - '+marker.description);
          }
        }
    ];

    var generalHighlights = [
        { begin: createDate('08:00'), end: createDate('18:00'), color: "#5cea67" },
        { begin: createDate('20:00'), end: createDate('02:15', 1) },
    ];

    var timeoptions = {
      data: timedata,
      generalMarkers: generalMarkers,
      generalHighlights: generalHighlights,
      style: {
        months: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
        activityStyle: {
          'STDUP': { color: "#8e87ea", height: "30px" },
          'DEV': { color: "#ea8787" },
          'DEVOPS': { color: "#e8e44e" },
        },
        showDateOnHeader: true,
        dateHeaderFormat: function(date)
        {
          var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
          var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

          return days[date.getDay()] + ", " + months[date.getMonth()] + " " + date.getDate() +"th - " + date.getFullYear();
        },
        descriptionContainerWidth: '200px'
      }
    };

    var jobdata = [
      {
        description: 'job1',
        activities: [
          { code: 'OK',      begin: createDate('09:00'),    end: createDate('16:30'),    description: 'job1.sh 09:00 full' },
          { code: 'WARNING', begin: createDate('15:00'),    end: createDate('15:50'),    description: 'job1.sh 15:00 incr' },
          { code: 'OK',      begin: createDate('21:00'),    end: createDate('21:25'),    description: 'job1.sh 21:00 incr' },
          { code: 'ERROR',   begin: createDate('03:00', 1), end: createDate('08:10', 1), description: 'job1.sh 03:00 full' },
          { code: 'OK',      begin: createDate('09:00', 1), end: createDate('09:25', 1), description: 'job1.sh 09:00 full' },
          { code: 'OK',      begin: createDate('15:00', 1), end: createDate('15:20', 1), description: 'job1.sh 15:00 incr' },
          { code: 'OK',      begin: createDate('21:00', 1), end: createDate('21:30', 1), description: 'job1.sh 21:00 incr' },
          { code: 'OK',      begin: createDate('03:00', 2), end: createDate('03:10', 2), description: 'job1.sh 03:00 full' },
        ]
      },
      {
        description: 'job2',
        activities: [
          { code: 'OK',      begin: createDate('09:10'),    end: createDate('09:40'),    description: 'job1.sh 09:10 full' },
          { code: 'WARNING', begin: createDate('15:10'),    end: createDate('16:00'),    description: 'job1.sh 15:10 incr' },
          { code: 'OK',      begin: createDate('21:10'),    end: createDate('21:35'),    description: 'job1.sh 21:10 incr' },
        ]
      },
      {
        description: 'job3',
        activities: [
          { code: 'OK',      begin: createDate('09:20'),    end: createDate('09:50'),    description: 'job1.sh 09:20 full' },
          { code: 'WARNING', begin: createDate('15:20'),    end: createDate('16:10'),    description: 'job1.sh 15:20 incr' },
          { code: 'OK',      begin: createDate('21:20'),    end: createDate('21:45'),    description: 'job1.sh 21:20 incr' },
        ]
      },
      {
        description: 'job4',
        activities: [
          { code: 'OK',      begin: createDate('09:30'),    end: createDate('10:00'),    description: 'job1.sh 09:30 full' },
          { code: 'WARNING', begin: createDate('15:30'),    end: createDate('16:20'),    description: 'job1.sh 15:30 incr' },
          { code: 'OK',      begin: createDate('21:30'),    end: createDate('21:55'),    description: 'job1.sh 21:30 incr' },
        ]
      },
      {
        description: 'job5',
        activities: [
          { code: 'OK',      begin: createDate('09:40'),    end: createDate('10:40'),    description: 'job1.sh 09:40 full' },
          { code: 'WARNING', begin: createDate('15:40'),    end: createDate('16:30'),    description: 'job1.sh 15:40 incr' },
          { code: 'OK',      begin: createDate('21:40'),    end: createDate('22:05'),    description: 'job1.sh 21:40 incr' },
        ]
      },
      {
        description: 'job6',
        activities: [
          { code: 'OK',      begin: createDate('09:50'),    end: createDate('10:50'),    description: 'job1.sh 09:50 full' },
          { code: 'WARNING', begin: createDate('15:50'),    end: createDate('16:40'),    description: 'job1.sh 15:50 incr' },
          { code: 'OK',      begin: createDate('21:50'),    end: createDate('22:15'),    description: 'job1.sh 21:50 incr' },
        ]
      },
      {
        description: 'job7',
        activities: [
          { code: 'OK',      begin: createDate('09:00'),    end: createDate('09:30'),    description: 'job1.sh 09:00 full' },
          { code: 'WARNING', begin: createDate('15:00'),    end: createDate('15:50'),    description: 'job1.sh 15:00 incr' },
          { code: 'OK',      begin: createDate('21:00'),    end: createDate('21:25'),    description: 'job1.sh 21:00 incr' },
        ]
      },
      {
        description: 'job8',
        activities: [
          { code: 'OK',      begin: createDate('09:10'),    end: createDate('09:40'),    description: 'job1.sh 09:10 full' },
          { code: 'WARNING', begin: createDate('15:10'),    end: createDate('16:00'),    description: 'job1.sh 15:10 incr' },
          { code: 'OK',      begin: createDate('21:10'),    end: createDate('21:35'),    description: 'job1.sh 21:10 incr' },
        ]
      },
      {
        description: 'job9',
        activities: [
          { code: 'OK',      begin: createDate('09:20'),    end: createDate('09:50'),    description: 'job1.sh 09:20 full' },
          { code: 'WARNING', begin: createDate('15:20'),    end: createDate('16:10'),    description: 'job1.sh 15:20 incr' },
          { code: 'OK',      begin: createDate('21:20'),    end: createDate('21:45'),    description: 'job1.sh 21:20 incr' },
        ]
      },
      {
        description: 'job10',
        activities: [
          { code: 'OK',      begin: createDate('09:30'),    end: createDate('10:00'),    description: 'job1.sh 09:30 full' },
          { code: 'WARNING', begin: createDate('15:30'),    end: createDate('16:20'),    description: 'job1.sh 15:30 incr' },
          { code: 'OK',      begin: createDate('21:30'),    end: createDate('21:55'),    description: 'job1.sh 21:30 incr' },
        ]
      },
    ];

    var nights = [
        { begin: createDate('19:00'),    end: createDate('07:00', 1), color: "#5cea67" },
        { begin: createDate('19:00', 1), end: createDate('07:00', 2), color: "#5cea67" },
    ];

    var joboptions = {
          data: jobdata,
          generalMarkers: [],
          generalHighlights: nights,
          style: {
            activityStyle: {
              'OK':      { color: "green" },
              'WARNING': { color: "yellow" },
              'ERROR':   { color: "red" },
            },
            showDateOnHeader: true,
            showTimeOnHeader: true,
            hourWidth:        50,
            formatDate:       function(date){ return ('0' + (date.getMonth()+1)).substr(-2) + '-' + ('0' + (date.getDate())).substr(-2); },
            dateHeaderFormat: function(date){ return date.getFullYear() + '-' + ('0' + (date.getMonth()+1)).substr(-2) + '-' + ('0' + date.getDate()).substr(-2);},
            descriptionContainerWidth: '150px'
          }
        };

;

  	$(document).ready(function() {
      var $timeline = $('#timeline').stackedGantt(timeoptions);
      var jobschedules = $('#jobschedules').stackedGantt(joboptions);
  	});

</script>

</html>