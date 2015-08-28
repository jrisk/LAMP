<html>
<head>
<title>Week View</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css">
<link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.print.css">

</head>
<body>

<?php
session_start();

if (!(isset($_SESSION["myusername"]))) {
  header("location:main.php");
}

?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="row">

        <div class="col-xs-2">

        <div class="dropdown" id="dropdownplans">
            <button class="btn btn-lg btn-info dropdown-toggle" type="button" id="dropdownplan" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Lesson Plans
            <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownplan" id="planlistload">
            </ul>
        </div>
    </div>

        <div class="col-xs-8">

        <div class="btn-group btn-group-lg" role="group">

            <button class="btn btn-info" id="today-button">Today</button>

            <button class="btn btn-info" id="week-button">Week</button>

            <button class="btn btn-info" id="month-button">Month</button>

        </div>

        </div>

            <div class="col-xs-2">

            <a href="viewplan.php"><button class="btn btn-lg btn-warning" id="backtoedit">Back to Plan Edit</button></a>

        </div>

    </div>
</div><!-- column row for buttons -->
</div><!-- /.container-fluid -->
</nav>

<hr>
<br>

<div class="text-center" id="plan-namehold">
</div>

<div class="text-center" id="namehold">
    </div>

<div class="text-center" id="today">
</div>

<!-- Table, 7 day week -->

<div class="container" id="day-table">

<table class="table table-bordered">
    <tr class="active">
        <th id="Time-head">
        <span class="glyphicon glyphicon-time" aria-hidden="true">&nbsp</span>
        </th>
        <td class="col-xs-2" id="Monday-head">
            Monday
        </td>
        <td class="col-xs-2" id="Tuesday-head">
            Tuesday
        </td>
        <td class="col-xs-2" id="Wednesday-head">
            Wednesday
        </td>
        <td class="col-xs-2" id="Thursday-head">
            Thursday
        </td>
        <td class="col-xs-2"id="Friday-head">
            Friday
        </td>
        <td class="col-xs-1" id="Saturday-head">
            Saturday
        </td>
        <td class="col-xs-1"id="Sunday-head">
            Sunday
        </td>
    </tr>
</table>
</div>

<div class="container" id="time-table">
<div class="calendar-table">
<div class="inner-help-div">
<table class="table table-bordered" id="week-table">

<tr class="danger">
    <th>
    1 AM
    </th>
        <td id="Mon-01"></td>
        <td id="Tues-01"></td>
        <td id="Weds-01"></td>
        <td id="Thurs-01"></td>
        <td id="Fri-01"></td>
        <td id="Sat-01"></td>
        <td id="Sun-01"></td>
    </tr>
<tr class="danger">
    <th>
    2 AM
    </th>
        <td id="Mon-02"></td>
        <td id="Tues-02"></td>
        <td id="Weds-02"></td>
        <td id="Thurs-02"></td>
        <td id="Fri-02"></td>
        <td id="Sat-02"></td>
        <td id="Sun-02"></td>
    </tr>

<tr class="danger">
    <th>
    3 AM
    </th>
        <td id="Mon-03"></td>
        <td id="Tues-03"></td>
        <td id="Weds-03"></td>
        <td id="Thurs-03"></td>
        <td id="Fri-03"></td>
        <td id="Sat-03"></td>
        <td id="Sun-03"></td>
    </tr>
<tr class="danger">
    <th>
    4 AM
    </th>
        <td id="Mon-04"></td>
        <td id="Tues-04"></td>
        <td id="Weds-04"></td>
        <td id="Thurs-04"></td>
        <td id="Fri-04"></td>
        <td id="Sat-04"></td>
        <td id="Sun-04"></td>
    </tr>

<tr class="danger">
    <th>
    5 AM
    </th>
        <td id="Mon-05"></td>
        <td id="Tues-05"></td>
        <td id="Weds-05"></td>
        <td id="Thurs-05"></td>
        <td id="Fri-05"></td>
        <td id="Sat-05"></td>
        <td id="Sun-05"></td>
    </tr>
<tr class="danger">
    <th>
    6 AM
    </th>
        <td id="Mon-06"></td>
        <td id="Tues-06"></td>
        <td id="Weds-06"></td>
        <td id="Thurs-06"></td>
        <td id="Fri-06"></td>
        <td id="Sat-06"></td>
        <td id="Sun-06"></td>
    </tr>

<tr class="danger">
    <th>
    7 AM
    </th>
        <td id="Mon-07"></td>
        <td id="Tues-07"></td>
        <td id="Weds-07"></td>
        <td id="Thurs-07"></td>
        <td id="Fri-07"></td>
        <td id="Sat-07"></td>
        <td id="Sun-07"></td>
    </tr>
<tr class="danger">
    <th>
    8 AM
    </th>
        <td id="Mon-08"></td>
        <td id="Tues-08"></td>
        <td id="Weds-08"></td>
        <td id="Thurs-08"></td>
        <td id="Fri-08"></td>
        <td id="Sat-08"></td>
        <td id="Sun-08"></td>
    </tr>

<tr class="danger">
    <th>
    9 AM
    </th>
        <td id="Mon-09"></td>
        <td id="Tues-09"></td>
        <td id="Weds-09"></td>
        <td id="Thurs-09"></td>
        <td id="Fri-09"></td>
        <td id="Sat-09"></td>
        <td id="Sun-09"></td>
    </tr>

<tr class="danger">
    <th>
    10 AM
    </th>
        <td id="Mon-10"></td>
        <td id="Tues-10"></td>
        <td id="Weds-10"></td>
        <td id="Thurs-10"></td>
        <td id="Fri-10"></td>
        <td id="Sat-10"></td>
        <td id="Sun-10"></td>
    </tr>

<tr class="danger">
    <th>
    11 AM
    </th>
        <td id="Mon-11"></td>
        <td id="Tues-11"></td>
        <td id="Weds-11"></td>
        <td id="Thurs-11"></td>
        <td id="Fri-11"></td>
        <td id="Sat-11"></td>
        <td id="Sun-11"></td>
    </tr>

<tr class="danger">
    <th>
    12 PM
    </th>
        <td id="Mon-12"></td>
        <td id="Tues-12"></td>
        <td id="Weds-12"></td>
        <td id="Thurs-12"></td>
        <td id="Fri-12"></td>
        <td id="Sat-12"></td>
        <td id="Sun-12"></td>
    </tr>

<tr class="danger">
    <th>
    1 PM
    </th>
        <td id="Mon-13"></td>
        <td id="Tues-13"></td>
        <td id="Weds-13"></td>
        <td id="Thurs-13"></td>
        <td id="Fri-13"></td>
        <td id="Sat-13"></td>
        <td id="Sun-13"></td>
    </tr>

<tr class="danger">
    <th>
    2 PM
    </th>
        <td id="Mon-14"></td>
        <td id="Tues-14"></td>
        <td id="Weds-14"></td>
        <td id="Thurs-14"></td>
        <td id="Fri-14"></td>
        <td id="Sat-14"></td>
        <td id="Sun-14"></td>
    </tr>

<tr class="danger">
    <th>
    3 PM
    </th>
        <td id="Mon-15"></td>
        <td id="Tues-15"></td>
        <td id="Weds-15"></td>
        <td id="Thurs-15"></td>
        <td id="Fri-15"></td>
        <td id="Sat-15"></td>
        <td id="Sun-15"></td>
    </tr>

<tr class="danger">
    <th>
    4 PM
    </th>
        <td id="Mon-16"></td>
        <td id="Tues-16"></td>
        <td id="Weds-16"></td>
        <td id="Thurs-16"></td>
        <td id="Fri-16"></td>
        <td id="Sat-16"></td>
        <td id="Sun-16"></td>
    </tr>

<tr class="danger">
    <th>
    5 PM
    </th>
        <td id="Mon-17"></td>
        <td id="Tues-17"></td>
        <td id="Weds-17"></td>
        <td id="Thurs-17"></td>
        <td id="Fri-17"></td>
        <td id="Sat-17"></td>
        <td id="Sun-17"></td>
    </tr>

<tr class="danger">
    <th>
    6 PM
    </th>
        <td id="Mon-18"></td>
        <td id="Tues-18"></td>
        <td id="Weds-18"></td>
        <td id="Thurs-18"></td>
        <td id="Fri-18"></td>
        <td id="Sat-18"></td>
        <td id="Sun-18"></td>
    </tr>

<tr class="danger">
    <th>
    7 PM
    </th>
        <td id="Mon-19"></td>
        <td id="Tues-19"></td>
        <td id="Weds-19"></td>
        <td id="Thurs-19"></td>
        <td id="Fri-19"></td>
        <td id="Sat-19"></td>
        <td id="Sun-19"></td>
    </tr>

<tr class="danger">
    <th>
    8 PM
    </th>
        <td id="Mon-20"></td>
        <td id="Tues-20"></td>
        <td id="Weds-20"></td>
        <td id="Thurs-20"></td>
        <td id="Fri-20"></td>
        <td id="Sat-20"></td>
        <td id="Sun-20"></td>
    </tr>

<tr class="danger">
    <th>
    9 PM
    </th>
        <td id="Mon-21"></td>
        <td id="Tues-21"></td>
        <td id="Weds-21"></td>
        <td id="Thurs-21"></td>
        <td id="Fri-21"></td>
        <td id="Sat-21"></td>
        <td id="Sun-21"></td>
    </tr>

<tr class="danger">
    <th>
    10 PM
    </th>
        <td id="Mon-22"></td>
        <td id="Tues-22"></td>
        <td id="Weds-22"></td>
        <td id="Thurs-22"></td>
        <td id="Fri-22"></td>
        <td id="Sat-22"></td>
        <td id="Sun-22"></td>
    </tr>

<tr class="danger">
    <th class="thtest">
    11 PM
    </th>
        <td id="Mon-23"></td>
        <td id="Tues-23"></td>
        <td id="Weds-23"></td>
        <td id="Thurs-23"></td>
        <td id="Fri-23"></td>
        <td id="Sat-23"></td>
        <td id="Sun-23"></td>
    </tr>

<tr class="danger">
    <th>
    12 AM
    </th>
        <td class="col-xs-2" id="Mon-00"></td>
        <td class="col-xs-2" id="Tues-00"></td>
        <td class="col-xs-2" id="Weds-00"></td>
        <td class="col-xs-2" id="Thurs-00"></td>
        <td class="col-xs-2" id="Fri-00"></td>
        <td class="col-xs-1" id="Sat-00"></td>
        <td class="col-xs-1" id="Sun-00"></td>
    </tr>


</table>
</div>
</div>
</div>

<div class="container-fluid" id="day-times">
    <table class="table">

        <tbody>

    <tr class="info">
        <th style="width: 5%">1AM</th>
        <td id="today-01">more info here</td>
    </tr>

    <tr class="info">
        <th>2AM</th>
        <td id="today-02"></td>
    </tr>

    <tr class="info">
        <th>3AM</th>
        <td id="today-03"></td>
    </tr>

    <tr class="info">
        <th>4AM</th>
        <td id="today-04">eyoo</td>
    </tr>

    <tr class="info">
        <th>5AM</th>
        <td id="today-05"></td>
    </tr>

    <tr class="info">
        <th>6AM</th>
        <td id="today-06"></td>
    </tr>

    <tr class="info">
        <th>7AM</th>
        <td id="today-07"></td>
    </tr>

    <tr class="info">
        <th>8AM</th>
        <td id="today-08"></td>
    </tr>

    <tr class="info">
        <th>9AM</th>
        <td id="today-09"></td>
    </tr>

    <tr class="info">
        <th>10AM</th>
        <td id="today-10"></td>
    </tr>

    <tr class="info">
        <th>11AM</th>
        <td id="today-11"></td>
    </tr>

    <tr class="info">
        <th>12PM</th>
        <td id="today-12"></td>
    </tr>

    <tr class="info">
        <th>1PM</th>
        <td id="today-13"></td>
    </tr>

    <tr class="info">
        <th>2PM</th>
        <td id="today-14"></td>
    </tr>

    <tr class="info">
        <th>3PM</th>
        <td id="today-15"></td>
    </tr>

    <tr class="info">
        <th>4PM</th>
        <td id="today-16"></td>
    </tr>

    <tr class="info">
        <th>5PM</th>
        <td id="today-17"></td>
    </tr>

    <tr class="info">
        <th>6PM</th>
        <td id="today-18"></td>
    </tr>

    <tr class="info">
        <th>7PM</th>
        <td id="today-19"></td>
    </tr>

    <tr class="info">
        <th>8PM</th>
        <td id="today-20"></td>
    </tr>

    <tr class="info">
        <th>9PM</th>
        <td id="today-21"></td>
    </tr>

    <tr class="info">
        <th>10PM</th>
        <td id="today-22"></td>
    </tr>

    <tr class="info">
        <th>11PM</th>
        <td id="today-23"></td>
    </tr>

    <tr class="info">
        <th>12AM</th>
        <td id="today-24"></td>
    </tr>

</tbody>

    </table>
</div>



<!-- end calendar table class div -->

<div id="planinfo"></div>

<div id="planinfosimple"></div>

<div id="mycal"></div>

<script src="./calendar.js"></script>
</body>
</html>
