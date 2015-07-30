<html>
<head>
<title>Plan Viewer</title>
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

	<?php
session_start();

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

?>

<div class="page-header">
    <div class="text-center"><b><?=$_SESSION['myusername']?>'s Planner</b></div>
</div>

<div class="container">
	<div class="row">
<div class="col-xs-12">

<?php
	include("pdo.php");

//$result variable comes from pdo.php

/*foreach($result as $row) {
	array_push($activity_array, $row['Activity']);
} */

$new_activity = array();
$plan = array();
$new_array = array();

//Inserting an array of values into another array iteratively to create an associative array

for ($i=0; $i <= ((count($result)) - 1); $i++) {
	//check if plan has already been pushed into array
	if (!(in_array(($result[$i]['Plan']), $plan))) {
	$plan[$i] = $result[$i]['Plan'];

	//save state of plan index for next check of similar plan names and inserting of activities
	$saved = $plan[$i];
	//reset activity array for new association with new plan key
	$new_activity = [];

	//take the plan name and array position and check for other instances of plan name in result

		for ($n=0; $n <= ((count($result)) - 1); $n++) {

			if ($result[$n]['Plan'] == $saved) {

			$new_activity[$n] = $result[$n]['Activity'];
			//making the new associative array with the plan key and giving the key a value 
			$new_array[$saved] = $new_activity;

			}
		
		}
	}
// I worked all day on this one measly function, like 8 hours of time
} 

echo "<br><br>";
var_dump($new_array);
echo "<br><br>";


	foreach($new_array as $key => $value) {
		echo "<div class='well well-watch'><h2>" . $key . "</h2><hr>";
		foreach($value as $activities) {
			echo "<div class='well well-inside'><b>" . $activities . "</b><br></div>";
			}
		echo "</div>";
		}

?>

</body>
</html>