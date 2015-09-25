<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

// get the total number of plans and iterate through each one in the subsequent loops
// for total calendar view, getting all the plans on page load 

$specific_plan;

$specific_plan = $_POST['specific_plan'];

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

$big_array = array();

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

    array_push($big_array, $sorted_array);

}
//duration and time fix: 
//changing database seconds into readable minutes/hours and start time into
//readable PM/AM time can be done in jquery now

// *** there is a bug where if the start time is the same, the loop will post the same activity
// *** twice because of the start=array i clause in the if statement not accounting for that**//

$specific_array = array();

for ($i=0; $i<=(count($big_array) - 1); $i++) {

        foreach($result as $key) {

           for ($j = 0; $j <= (count($big_array[$i])) - 1; $j++) {
	       
               if ($key["Plan"] == $plan[$i] && $plan[$i] == $specific_plan && $key["Start"] == $big_array[$i][$j]) {

                    $specific_array[] = array(
                        'id' => $key['ID'],
                        'title' => $key['Activity'],
                        'start' => $key['Adate'] . 'T' . $key['Start'],
                        'end' => $key['Adate'] . 'T' . $key['End'],
                        'class' => $key['Class'],
                        'plan' => $key['Plan'],
                        );
        }
    }

}

}

echo "<div class='Activity-Time'>
        <div class='col-md-4 col-xs-6'>Activity</div>
        <div class='col-md-8 col-xs-6'>Time</div>
      </div>";

for ($i = 0; $i < count($specific_array); $i++) {

echo "<div class='row plan-holder'><div class='col-md-4 col-xs-6' id='plan-specific-" . $i .
    "'>" . $specific_array[$i]['title'] . "</div><div id='plan-time-specific-" . $i .
    "' class='col-md-8 col-xs-6 start-time-plans'>" . $specific_array[$i]['start'] .
    "</div></div><br>";
    }

?>