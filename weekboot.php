<html>
<head>
<title>Bootstrap Stuff</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>
<body>

<?php
session_start();

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

?>

<div class="page-header">
    <div class="text-center"><b><?=$_SESSION['myusername']?>'s Planner</b></div>
</div>


<div class="table-responsive">
<table class="table table-bordered">
    <tr class="active">
        <td class="col-xs-2" id="head-monday">
            Monday
        </td>
        <td class="col-xs-2" id="head-tuesday">
            Tuesday
        </td>
        <td class="col-xs-2" id="head-wednesday">
            Wednesday
        </td>
        <td class="col-xs-2" id="head-thursday">
            Thursday
        </td>
        <td class="col-xs-2"id="head-friday">
            Friday
        </td>
        <td class="col-xs-2" id="head-saturday">
            Saturday
        </td>
        <td class="col-xs-2"id="head-sunday">
            Sunday
        </td>
    </tr>

<?php

include("pdo.php");

$day_array = array();

for ($i=0; $i <= (count($result) - 1); $i++) {

        array_push($day_array, $result[$i]['Day']);
    }

echo "
    <div class='row'>
        <tr class='warning'>
        <td class='col-xs-2' id='Monday'>";

            for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Monday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
            echo "
        </td>
        <td class='col-xs-2' id='Tuesday'>";

            for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Tuesday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
        <td class='col-xs-2' id='Wednesday'>";

        for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Wednesday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
        <td class='col-xs-2' id='Thursday'>";

        for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Thursday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
        <td class='col-xs-2' id='Friday'>";

        for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Friday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
        <td class='col-xs-2' id='Saturday'>";

        for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Saturday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
        <td class='col-xs-2' id='Sunday'>";

        for ($i = 0; $i <= (count($result) - 1); $i++) {
            if ($day_array[$i] == "Sunday") {

            echo "<div class='well'>";
            echo $result[$i]['Plan'] . "<br>";
            echo $result[$i]['Activity'] . "<br>";
            echo $result[$i]['Start'] . " to <br>";
            echo $result[$i]['End'] . "<br>";
            echo "</div>";
                }

            }
        echo "
        </td>
            </tr>
        </div>
             <!--thead -->
        </table> <!--row-->
    </div><!--table-->
    ";

?>

</body>
</html>