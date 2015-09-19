<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

// get the total number of plans and iterate through each one in the subsequent loops
// for total calendar view, getting all the plans on page load 

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
    $new_activity = array();
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
// I worked all day on this one measly function
};

//normalize the keys in order, enum 1,2,3...etc

sort($plan, SORT_NUMERIC);

//sort the returning rows in order or start time !!!

$big_array_start = array();

for ($k = 0; $k < count($plan); $k++) {
        $sorted_array = array();
        $date_array = array();
        $dplan = $plan[$k];

        foreach ($result as $key) {

                if ($key['Plan'] == $dplan) {
                    $fix = str_replace(":", "", $key["Start"]);

                    array_push($date_array, $fix);

                    sort($date_array);
        }
    }
    
    for ($i=0; $i<=(count($date_array) - 1); $i++) {


    $sorted = substr_replace($date_array[$i], ":", 2, 0);
    $sorted = substr_replace($sorted, ":", 5, 0);

    array_push($sorted_array, $sorted);

    }

    array_push($big_array_start, $sorted_array);

}

//sort end times as well

$big_array_end = array();

for ($k = 0; $k < count($plan); $k++) {
        $sorted_array = array();
        $date_array = array();
        $dplan = $plan[$k];

        foreach ($result as $key) {

                if ($key['Plan'] == $dplan) {
                    $fix = str_replace(":", "", $key["End"]);

                    array_push($date_array, $fix);

                    sort($date_array);
        }
    }
    
    for ($i=0; $i<=(count($date_array) - 1); $i++) {


    $sorted = substr_replace($date_array[$i], ":", 2, 0);
    $sorted = substr_replace($sorted, ":", 5, 0);

    array_push($sorted_array, $sorted);

    }

    array_push($big_array_end, $sorted_array);

}
//duration and time fix: 
//changing database seconds into readable minutes/hours and start time into
//readable PM/AM time can be done in jquery now

// *** there is a bug where if the start time is the same, the loop will post the same activity
// *** twice because of the start=array i clause in the if statement not accounting for that**//
$endtime_arr = array();

function endtimeSort(&$fix) {

	for ($i=0; $i <= (count($fix)) - 1; $i++) {

	echo count($fix);
	echo "<br>stahp</br>";

	str_replace(":", "", $fix[$i]);
	echo "this is the fix: " . $fix[$i];

	}

	sort($fix); //only care about the first element (latest time) so not gonna loopsort

    $sorted = substr_replace($fix[0], ":", 2, 0);
    $sorted = substr_replace($fix[0], ":", 5, 0);

   $endtime_arr[] = $sorted;

   var_dump($endtime_arr);

}

$master_plan = array();

for ($i=0; $i<=(count($big_array_end) - 1); $i++) {

	       for ($j = 0; $j <= (count($big_array_end[$i])) - 1; $j++) {

	       	  foreach($result as $key) {

               if ($key["Plan"] == $plan[$i] && $key["End"] == $big_array_end[$i][$j]) {

               	$last_time = $key["Adate"] . "T" . $key["End"];
               	$plan_end_id = $key["ID"];
               
               	$start_time = $key["Adate"] . "T" . $big_array_start[$i][0];
               }
	       }

		}

		$master_plan[] = array(
			'title' => $plan[$i],
			'start' => $start_time,
			'end' => $last_time,
			'id' => $plan_end_id
			); 
	}

//echo json_encode($master_plan);

for ($i = 0; $i < count($master_plan); $i++) {

echo "<div class='container'><div class='row'><div class='col-sm-4 col-xs-12'>
    <button class='btn btn-lg btn-warning' id='plan-specific-" . $i .
    "'>" . $master_plan[$i]['title'] . "</button></div></div></div>";
    }

?>