<!doctype html>
<html>
<head>
<title>Lesson Plan</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
<p><a href="/">Lesson Planner</a></p>
<div class="row">
<div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id='ledate'/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>

<form id="submitter" method="post" action="valpost.php" name="myform">
    <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
	<input type="text" class="form-control" placeholder="Lesson Name" id="lesson_name">
<br>
<input type="text" class="form-control" id="student_name" name="studentname" placeholder="Class or Student Name">
<br>
<input type="text" class="form-control" id="date" placeholder="Date of Lesson">
<hr>
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">Activity
<span class="glyphicon glyphicon-calendar"></span>
<input type="text" class="form-control" id="activity" placeholder="describe an activity">
</div>
<div class="col-sm-4">Duration
<input type="text" class="form-control" id="duration" name="durationtime" placeholder="minutes/hours it will last">
</div>
<div class="col-sm-4">Time
<input type="text" class="form-control" id="time" placeholder="start time">
</div>
</div>
</div>
<input type="submit" value="send plan">
</form>


</body>
</html>