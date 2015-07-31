// test moments objects

<html>
<head>
<title>Moment objects</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>
<body>

<?php
include("pdo.php");

$new_activity = array();
$plan = array();
$new_array = array();

$new_start = array();

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

			//iterate through every instance of the saved plan in the original result array

			if ($result[$n]['Plan'] == $saved) {

			$new_activity[$n] = $result[$n]['Activity'];
			//make the new associative array with the plan key and pair it with the activity array 
			$new_array[$saved] = $new_activity;
			}
		
		}
	}
// I worked all day on this one measly function, like 8 hours of time
};

echo "<br><br>";
var_dump($new_array);
echo "<br><br>";

	foreach($new_array as $key => $value) {
		echo "<div class='well well-watch'><h2>" . $key . "</h2>";
		foreach($value as $activities) {
			echo "<div class='well well-inside'><b>Activity|| " . $activities . "</b><br></div>";
			foreach($result as $row) {
					if (($row['Plan'] == $key) && ($row['Activity'] == $activities)) {
						echo "<div class='well well-edit' id='timeview'>Time: " . $row['Start'] . "</div>";
						echo "<b>Duration: </b><div class='well' id='durationview'>" . $row['Duration'] . "</div>";
						echo "<p id='fromnow'></p><b>from now</b>";
					}
				} 
			} echo "</div>";
		}
		

?>

</script>
</body>
</html>
