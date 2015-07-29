<html>
<head>
<title>Activity Viewer</title>
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
<div class="container">
	<div class="row">
<div class="col-xs-12">

<?php
	include("pdo.php");

	if (count($result)) {
		foreach($result as $row) {
			echo "<div class='well well-watch'>";
			echo "<div class='row'>" . $row['Day'] . "<br>";
			echo "<div class='col-xs-6'><b>Plan Name: " . $row['Plan'] . "</b></div></div><br>";
			echo "<p>Class: " . $row['Class'] . "</p><br>";
			echo "<div class='well well-inside'>Activity: " . $row['Activity'] . "<br>";
			echo "<b>Start Time: " . $row['Start'] . "</b><br>";
			echo "<b>End Time: " . $row['End'] . "</b></div><br>";
			echo "Comments: " . $row['comment'] . "<br>";
			echo "Duration: " . $row['Duration'] . "<br>";
			echo "<br>";
			echo "<a href='editplan.php'><div class='well text-center well-edit'>
			<button class='btn btn-lg'>EDIT</button></div></a>";
			echo "</div>";
		}
	}

	?>

</div>
</div>

</body>
</html>