<?php
//auto-login in pdo now

include("pdo.php");

// regular login
/*if (!(isset($_SESSION['myusername']))) {
  header("location:main.php"); }*/
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
<script src="./testing.js"></script>

<!-- testing purposes <script src="./testing.js"></script> -->
<script src="//www.modernizr.com/downloads/modernizr-
latest.js" type ="text/javascript"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<div class="container" id='addoptions'> <!-- outer container for row of buttons -->
  <div class="row">
<button class="btn btn-primary btn-lg" data-toggle="modal" 
data-target="#form-content" type="button" id="addactivity">Add Activity
  </button>
</div>
</div>

<div id="form-content" class="modal fade in" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">X</a>
        <br>
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
                    <input type="text" class="form-control input-lg" name="start-time" id="start2">
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
            <input type="text" class="form-control input-lg" name="end-time" id="end2">
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
        <input type="hidden" class="form-control" id="commentnote2" name="commentnote">
        <textarea class="form-control" rows="2" id="comment-note2" name="comment-note" placeholder="Comments and Notes"></textarea>
    </div>
</div>
    </div>
    <div class="modal-footer">
        <div class="col-xs-6 text-center">
<!--button type='submit' for php--><button type="button" class="btn btn-lg" id="addnewact" data-dismiss="modal">Add
        </button>
        </div>
        <div class="col-xs-6 text-center">
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
        </div>

</div> <!-- modal footer end -->
    </div> <!-- modal content end -->
</div> <!-- modal dialog end -->
</div> <!-- modal div end -->



