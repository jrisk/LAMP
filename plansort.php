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

             $new_activity[] = array(
                        'id' => $result[$n]['ID'],
                        'title' => $result[$n]['Activity'],
                        'date' => $result[$n]['Adate'],
                        'start' => $result[$n]['Adate'] . 'T' . $result[$n]['Start'],
                        'end' => $result[$n]['Adate'] . 'T' . $result[$n]['End'],
                        'class' => $result[$n]['Class'],
                        'plan' => $result[$n]['Plan'],
                        );
            //make the new associative array with the plan key and pair it with the activity array
             $new_array[$saved] = $new_activity;
            }
        
        }
    }

};

//deleted the sort function for dates, can do sort in json javascript or usort once encoded in json
echo json_encode($new_array); 

?>