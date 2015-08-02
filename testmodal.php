<?php
include("pdo.php");

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<body>

<div class="page-header">
    <div class="text-center"><b><?=$_SESSION['myusername']?>'s Planner</b></div>
</div>

<p><a href="homepage.php">Back to Control Panel</a></p>

<div class="well well-sm"><div>
    <b>
        <div id="successdiv"></div>
    </b>
</div>

<div id="err1"></div>
    
    <!--start lesson planner form -->

<form id="planform" method="post" action="formaction.php">

    <!--lesson plan in well -->
<div class="well well-watch">
<div class="container-fluid text-center">
    <div class="row">
        <div class="col-xs-12">
<h2>Lesson
    <span class="glyphicon glyphicon-paperclip"></span>
</h2>

<input name="lesson-name" type="text" class="form-control" placeholder="Lesson Name">

</div> <!-- seperate containers for each input and label -->
</div>
</div>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-xs-12">
<h2>Class
    <span class="glyphicon glyphicon-education"></span>
</h2>
<input name="user-group" type="text" class="form-control" placeholder="Class or Student Name">
</div>
</div>
</div>

<div class="container-fluid text-center">
<h3>Date</h3>
<div class="container">
    <div class="row">
        <div class='col-xs-12'>
            <div class="form-group">
                <div class='input-group date' id='datetimepickerplan'>
                    <input type='text' id="dateplan" name="date-plan" class="form-control" placeholder="Date of Lesson">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- row of activities before the modal code -->
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
    </div> <!--1st Activity Row -->
    <hr>

    <div id="actphp">

    <!-- inserts actrow.php loop code, from nested ajax request on click event for id savedurate-->

    </div>

<!--Activity modal button end, modal form start -->
</div>
</div> <!-- end activites list code -->

<!-- Activity part of form start. outside of modal -->

<div class="container text-center">
<button data-toggle="modal" data-target="#form-content" type="button"
class="btn btn-primary btn-lg" id='firstact'>Add Activity</button>
</div>
<hr>
<div class="jumbotron well-inside">
<div class="container-fluid">
    <div class="col-xs-12 text-center">
    <button type="submit" class="btn-primary tn bbtn-lg" id="save">Save Plan (non-auto)
        <span class="glyphicon glyphicon-saved"></span>
    </button>
</div>
<hr>
    <div class="col-xs-12 text-center">
    <a href="editplan.php">
        <button type="button" class="btn btn-primary btn-lg" id="save">View Plan
        <span class="glyphicon glyphicon-saved"></span>
    </button>
    </a>
</div>
</div>
</div>

<hr>

</div>

<div id="form-content" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">X</a>
        <h3>Add an Activity to your lesson plan</h3>
    </div>
    <div class="modal-body">
        <form role="form" name="modal-activity" method="post" action="#">
            <div class="well well-inside">
<div class="container-fluid text-center">
        <div class="col-xs-12">
            <h2>Activity</h2>
            <input name="activity" type="text" class="form-control input-lg" placeholder="Activity">
            </div>
        </div>
<br>

<div class="container-fluid text-center">
<div class="label label-warning">Start Time</div>
</div>

<br>

<div class="container-fluid">
<div class="row-fluid">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="input-group date" id="starttime">
                    <input type="text" class="form-control input-lg" name="start-time" id="start">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container-fluid text-center">
<span class="label label-primary">End Time</span>
</div>

<br>

<div class="container-fluid">

<div class="row-fluid">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="input-group date" id="endtime">
            <input type="text" class="form-control input-lg" name="end-time" id="end">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
        </div>
    </div>
</div>
</div>
</div>

<div class="col-xs-12 text-center">
    <div class="form-group">
        <input type="hidden" class="form-control" name="duration-time" id="durationtime">
        <b><span class="glyphicon glyphicon-hourglass"></span>
            Duration
            <h5 id="durationmodal"></h5>
        </b>
    </div>
</div>

<br>

<div class="container-fluid">
    <div class="col-xs-12">
        <input type="hidden" class="form-control" id="commentnote" name="commentnote">
        <textarea class="form-control" rows="2" id="comment-note" name="comment-note" placeholder="Comments and Notes"></textarea>
    </div>
</div>
    </div>
    <div class="modal-footer">
        <div class="col-xs-6 text-center">
<!--button type='submit' for php--><button type="button" class="btn btn-lg" id="savedurate" data-dismiss="modal">Save
        </button>
        </div>
        <div class="col-xs-6 text-center">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
        </div>

    </div> <!-- modal footer end -->
    </div> <!-- modal content end -->
</div> <!-- modal dialog end -->
</div> <!-- modal div end -->

</form>

</body>
</html>