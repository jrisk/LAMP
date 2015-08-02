<?php
include("pdo.php");

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

$dplan = $_SESSION['currentplan'];

foreach($result as $key) {
if ($key['Plan'] == $dplan) {
	$LessonName = $key['Plan'];
	$LessonClass = $key['Class'];
	$LessonDay = $key['Day'];

}

}

/*function durationfix() {

	if($key['Duration'])
}

function startOrder() {
	sort($key['Start'])
}*/

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

	<b><?=$_SESSION['currentplan']?></b>

<div class="page-header">
    <div class="text-center"><b><?=$_SESSION['myusername']?>'s Planner</b></div>
</div>

<div class="well well-sm"><div>
    <b>
        <div id="successdiv"></div>
    </b>
</div>

<div id="err1"></div>
	<!--start lesson planner form -->
<form onsubmit="savePlan()" method="post" action="editform.php">


<div class="container-fluid">
<!-- insert fore each for activity and stuff here -->
<?php
		echo "<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-4'>
<h2><span class='glyphicon glyphicon-paperclip'></span>Lesson</h2>
<div class='col-sm-8'>
<input name='lesson-name' type='text' class='form-control' 
placeholder='" . $LessonName. "' value='" . $LessonName . "'>

</div>
</div> <!-- seperate containers for each input and label -->
</div>
</div>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-4'>
<h3><span class='glyphicon glyphicon-education'></span>Class</h3>
<div class='col-sm-8'>
<input name='user-group' type='text' class='form-control' 
placeholder='" . $LessonClass . "' value='" . $LessonClass . "'>
</div>
</div>
</div>
</div>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-4'>
<h3><span class='glyphicon glyphicon-calendar'></span>Date</h3>
<div class='col-sm-8'>
            <div class='form-group'>
                <div class='input-group date' id='datetimepickerplan'>
                    <input type='text' id='dateplan' name='date-plan' class='form-control' 
                    placeholder='" . $LessonDay . "' value='" . $LessonDay . "'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-calendar'></span>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div>
</div>

<hr>

<div class='container'>
	<div class='row'>
		<div class='col-sm-4'>
			Activity
		</div>
		<div class='col-sm-3'>
			<div class='label label-warning'>Start Time</div>
		</div>
		<div class='col-sm-3'>
			<span class='label label-primary'>End Time</span>
		</div>
		<div class='col-sm-2'>
			Comment
		</div>
	</div>
</div>";

foreach($result as $key) {
	if ($key['Plan'] == $dplan) {

	echo "<div class='well well-sm well-blue'><div class='row'>
        <div class='col-sm-4'>
            <input name='activity' type='text' class='form-control input-lg' 
            value='" . $key['Activity'] . "' placeholder='" . $key['Activity'] .  "'>
            </div>
        <div class='col-sm-3'>
            <div class='form-group'>
                <div class='input-group date' id='starttime'>
                    <input type='text' class='form-control input-lg' name='start-time' id='start'
                    value='" . $key['Start'] . "' placeholder='" . $key['Start'] . "'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-time'></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-3'>
            <div class='form-group'>
                <div class='input-group date' id='endtime'>
            <input type='text' class='form-control input-lg' name='end-time' id='end'
            value='" . $key['End'] . "' placeholder='" . $key['End'] . "'>
            <span class='input-group-addon'>
                <span class='glyphicon glyphicon-time'></span>
            </span>
        </div>
    </div>
</div>
<div class='form-group'>
        <input type='hidden' class='form-control' name='duration-time' id='durationtime'>
    </div>
    <input type='hidden' class='form-control' name='identify' id='identifier'
    value='" . $key['ID'] . "'>
<br>
    <div class='col-sm-2'>
        <input type='hidden' class=' form-control' id='commentnote' name='commentnote'>
        <textarea class='form-control' rows='2' id='comment-note' name='comment-note' 
        value='" . $key['Comment'] . "' placeholder='" .$key['Comment'] . "'></textarea>
    </div>
</div>
</div>";

	}

}

?>
</div>


<button type="submit" class="btn btn-primary btn-lg" id="addplan">Update</button>
</form>


</body>

</html>