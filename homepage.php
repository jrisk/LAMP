<html>
<head>
<title>Skoolia Lesson Planner App</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
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


  <!-- Nav tabs -->
  <div class="container-fluid">
  <ul class="nav nav-pills nav-stacked" role="tablist">
    <li role="presentation"><a href="mobileplan.php">Add Activity</a></li>
    <li role="presentation"><a href="baseplan.php" role="tab">Add Lesson Plan</a></li>
    <li role="presentation"><a href="weekboot.php" role="tab">View Weekly Schedule</a></li>
    <li role="presentation"><a href="shortweek.php" aria-controls="messages" role="tab">View 5-day</a></li>
    <li role="presentation"><a href="topdowndays.php" role="tab">View Activities</a></li>
    <li role="presentation"><a href="planview.php" role="tab>">View Plans</a></li>
    <hr>
    <li role="seperator"><a href="logout.php" aria-controls="settings" role="tab">Skoolia Home</a></li>
  </ul>
<hr>
</div>

<div class="container">
  <a href="session_stuff.php">Session</a>
</div>
<hr>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <p><span class="glyphicon glyphicon-bed"><a href="#">Disable Alerts</a></span></p>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <p><span class="glyphicon glyphicon-apple"><a href="#">Feedback and Suggestions</a></span></p>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <p><span class="glyphicon glyphicon-erase"><a href="#">Delete Plan Or Activity</a></span></p>
    </div>
  </div>

<div id='outputdata'>this is output</div>

</body>
</html>