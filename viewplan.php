<?php
include("pdo.php");

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

if(!(isset($_SESSION['currentplan']))) {
  echo "";
}

?>

<html>
<head>
    <title>Lesson Plan V3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<body>


<div class="container">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownplan" 
  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Choose Plan
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownplan">
    <?php
    include("planlist.php");
    ?>
  </ul>
</div>
</div>

<hr>


<div class="hidden-xs">
<div class="container" id="activated">
    <div class="well">
    <div class="row well-edit">
        <div class="col-sm-6">
            <h3>Activity</h3>
        </div>
        <div class="col-sm-3">
            <h3>Duration</h3>
        </div>
        <div class="col-sm-3">
            <h3>Start</h3>
        </div>
    </div> <!-- row end -->
    <div class="well">
  <div class="row" id="planentry">
    <!--where activities are entered -->
  </div>
</div>
</div> <!-- well end -->
</div> <!-- end container of activity-row -->
</div> <!-- hidden mobile response div -->

<div class="container"> <!-- outer container for row of buttons -->
  <div class="row">
    <a href="planner.php">
<button class="btn btn-primary btn-lg" type="button" id="editplan">Edit Plan
  </button>
</a>
</div>
</div>


</body>
</html>