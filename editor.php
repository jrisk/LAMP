<form onsubmit="savePlan()" id="editform" method="post" action="editform.php">


<div class="container-fluid">
<!-- insert fore each for activity and stuff here -->
<?php
include("pdo.php");

$_SESSION['currentplan'] = $_POST['enterplan'];

$theplan = $_SESSION['currentplan'];

$_SESSION['idact'] = $_POST['idact'];

$idplan = $_SESSION['idact'];

foreach($result as $key) {
    if ($key['Plan'] == $theplan && $key['ID'] == $idplan) {

		echo "<div class='container'>
	<div class='row'>
		<div class='col-sm-2'>
<h2><div class='glyphicon glyphicon-paperclip'></div>Lesson</h2>
</div>
<div class='col-sm-6'>
<h2><input name='lesson-name' id='lessonname' type='text' class='form-control' 
placeholder='" . $key['Plan'] . "' value='" . $key['Plan'] . "'></h2>
</div>
</div>
</div>

<div class='container'>
	<div class='row'>
		<div class='col-sm-2'>
<h3><span class='glyphicon glyphicon-education'></span>Class</h3>
</div>
<div class='col-sm-6'>
<h3><input name='user-group' type='text' class='form-control' 
placeholder='" . $key['Class'] . "' value='" . $key['Class'] . "'></h3>
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
                <div class='input-group date' id='datetimepickerplan2'>
                    <input type='text' id='dateplan' name='date-plan' class='form-control'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-calendar'></span>
                    </span>
                </div>
        </div></h3>
	</div>
</div>
</div>
<input type='hidden' id='datefix' name='date-planfix' class='form-control' 
placeholder='" . $key['Adate'] . "' value='" . $key['Adate'] . "'>


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
            <input name='activity' type='text' class='form-control input-lg' 
            value='" . $key['Activity'] . "' placeholder='" . $key['Activity'] .  "'>
            </div>
        <div class='col-sm-2'>
            <div class='form-group'>
                <div class='input-group date' id='starttime2'>
                    <input type='text' class='form-control input-lg' name='start-time' id='start'
                    value='" . $key['Start'] . "' placeholder='" . $key['Start'] . "'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-time'></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-2'>
            <div class='form-group'>
                <div class='input-group date' id='endtime2'>
            <input type='text' class='form-control input-lg' name='end-time' id='end'
            value='" . $key['End'] . "' placeholder='" . $key['End'] . "'>
            <span class='input-group-addon'>
                <span class='glyphicon glyphicon-time'></span>
            </span>
        </div>
    </div>
</div>
    <div class='col-sm-4'>
        <textarea class='form-control' rows='2' id='comment-note' name='comment-note'
        value='" . $key['Comment'] . "' placeholder='" .$key['Comment'] . "'></textarea>
    </div>
    <input type='hidden' class=' form-control' id='commentnote' name='commentnote'>
    <div class='form-group'>
        <input type='hidden' class='form-control' name='duration-time' id='durationtime2'>
    </div>
    <input type='hidden' class='form-control' name='identify' id='identifier'
    value='" . $key['ID'] . "'>
</div>
</div>";

	}

}

?>
</div>


<button type="button" class="btn btn-primary btn-lg" id="updater">Update</button>
</form>