<?php

//Activities list for dropdown in php, returns list of plans
//include("pdo.php");

//$cplan = $_SESSION['currentplan'];

/*function durationfix() {

	if($key['Duration'])
}

function startOrder() {
	sort($key['Start'])
} */

$new_activity = array();
$plan = array();
$new_array = array();

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

foreach($new_array as $key => $value) {
	echo "<li><a id='" . $key . "' class='planlist' name='plan' href='#'>" . $key . "</a></li>";
}

?>