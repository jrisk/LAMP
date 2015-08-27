<form onsubmit="savePlan()" id="makeform" method="post" action="formaction.php">


<div class="container-fluid" id="makeplanspace">
<!-- insert fore each for activity and stuff here -->
<?php
include("pdo.php");

		echo "<div class='container'>
	<div class='row'>
		<div class='col-sm-2'>
<h2><div class='glyphicon glyphicon-paperclip'></div>Lesson</h2>
</div>
<div class='col-sm-6'>
<h2><input name='lesson-name' id='lessonname3' type='text' class='form-control' placeholder='Your Lesson Plan Name Here'></h2>
</div>
</div>
</div>

<div class='container'>
	<div class='row'>
		<div class='col-sm-2'>
<h3><span class='glyphicon glyphicon-education'></span>Class</h3>
</div>
<div class='col-sm-6'>
<h3><input name='user-group' type='text' class='form-control' placeholder='Class/Student Name Here'></h3>
</div>
</div>
</div>

<div class='container-fluid'>
	<div class='row'>
		<div class='col-sm-2'>
<h3><span class='glyphicon glyphicon-calendar'></span>Date</h3>
</div>
<div class='col-sm-6'>
            <h3><div class='form-group'>
                <div class='input-group date' id='datetimepickerplan3'>
                    <input type='text' id='dateplan3' name='date-plan' class='form-control'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-calendar'></span>
                    </span>
                </div>
        </div></h3>
	</div>
</div>
</div>
<input type='hidden' id='datefix3' name='date-planfix' class='form-control'>


<hr>

<div class='container'>
	<div class='row'>
		<div class='col-sm-4'>
			<h4><div class='label label-success'>Activity</div></h4>
		</div>
		<div class='col-sm-2'>
			<h4><div class='label label-warning'>Start Time</div></h4>
		</div>
		<div class='col-sm-2'>
			<h4><div class='label label-primary'>End Time</div></h4>
		</div>
		<div class='col-sm-4'>
			<h4><div class='label label-default'>Comment</div></h4>
		</div>
	</div>
</div>


<br>


<div class='well well-sm well-blue'><div class='row'>
        <div class='col-sm-4'>
            <input name='activity' type='text' class='form-control input-lg'>
            </div>
        <div class='col-sm-2'>
            <div class='form-group'>
                <div class='input-group date' id='starttime3'>
                    <input type='text' class='form-control input-lg' name='start-time' id='start3'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-time'></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-2'>
            <div class='form-group'>
                <div class='input-group date' id='endtime3'>
            <input type='text' class='form-control input-lg' name='end-time' id='end3'>
            <span class='input-group-addon'>
                <span class='glyphicon glyphicon-time'></span>
            </span>
        </div>
    </div>
</div>
    <div class='col-sm-4'>
        <textarea class='form-control' rows='2' id='comment-note3' name='comment-note'></textarea>
    </div>
    <input type='hidden' class=' form-control' id='commentnote3' name='commentnote'>
    <div class='form-group'>
        <input type='hidden' class='form-control' name='duration-time' id='durationtime3'>
    </div>
</div>
</div>";

?>
</div>
<script>
$(function () {
$('#starttime3').on("dp.change", function (e) {
$('#endtime3').data("DateTimePicker").minDate(e.date);
});

});
</script>

<div class="container" id="makedelegate">
<button type="button" class="btn btn-primary btn-lg" id="updater2">Add to Plan</button>
</div>
</form>