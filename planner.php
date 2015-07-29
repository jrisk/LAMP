<html>
<head>
	<title>Lesson Plan V1</title>
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
<p><a href="homepage.php">Back to Control Panel</a></p>

<div class="jumbotron">Lesson Plan</div>
	<!--start lesson planner form -->
<form onsubmit="savePlan()" method="post" action="formaction.php">
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
<h2>Lesson
	<span class="glyphicon glyphicon-paperclip"></span>
</h2>
<input name="lesson-name" type="text" class="form-control" placeholder="Lesson Name">

</div> <!-- seperate containers for each input and label -->
</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
<h3>Class</h3>
	<span class="glyphicon glyphicon-education"></span>
</h3>
<input name="usergroup" type="text" class="form-control" placeholder="Class or Student Name">
</div>
</div>
</div>

<div class="container-fluid">
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
<hr>

<button type="submit" class="btn btn-lg" id="addplan">Start Plan</button>

<div class="container-fluid">
<div class="row">
<div class="col-sm-4">Activity <span class="glyphicon glyphicon-flag"></span><input name="activity" type="text" class="form-control span4" placeholder="describe an activity"></div>
<div class="col-sm-4">Duration <span class="glyphicon glyphicon-hourglass"></span><input name="duration"type="text" class="form-control" placeholder="minutes/hours it will last"></div>
<div class="col-sm-4">Time <span class=" glyphicon glyphicon-time"></span><input type="text" class="form-control" placeholder="start time"></div>
</div>
</div>
</form>


</body>

</html>