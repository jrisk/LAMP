<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific DATE


// get the total number of DATES and iterate through each DAY OF THE WEEK in the subsequent loops
// for total calendar view, getting all the DATES on page load 

$new_activity = array();
$date = array();
$new_array = array();

$big_array = array();

/***

this sort probably doesnt scale

***/

for ($i=0; $i <= ((count($result)) - 1); $i++) {
    //check if plan has already been pushed into array
    if (!(in_array(($result[$i]['Adate']), $date))) {
    $date[$i] = $result[$i]['Adate'];

    //save state of plan index for next check of similar plan names and inserting of activities
    $saved = $date[$i];
    //reset activity array for new association with new plan key
    $new_activity = array();
    //take the plan name and array position and check for other instances of plan name in result

        for ($n=0; $n <= ((count($result)) - 1); $n++) {

            //iterate through every instance of the saved DATE in the original result array

            if ($result[$n]['Adate'] == $saved) {

             $new_activity[] = array(
                        'id' => $result[$n]['ID'],
                        'title' => $result[$n]['Activity'],
                        'date' => $result[$n]['Adate'],
                        'start' => $result[$n]['Adate'] . 'T' . $result[$n]['Start'],
                        'end' => $result[$n]['Adate'] . 'T' . $result[$n]['End'],
                        'class' => $result[$n]['Class'],
                        'plan' => $result[$n]['Plan'],
                        'monday' => $result[$n]['Monday'],
                        'tuesday' => $result[$n]['Tuesday'],
                        'wednesday' => $result[$n]['Wednesday'],
                        'thursday' => $result[$n]['Thursday'],
                        'friday' => $result[$n]['Friday'],
                        'saturday' => $result[$n]['Saturday'],
                        'sunday' => $result[$n]['Sunday']
                        );

             // sort the start-times in order of $array[$innerarray][$start]

             //array_multisort($new_activity, SORT_DESC);
            //make the new associative array with the plan key and pair it with the activity array

             $new_array[$saved] = $new_activity; //unnecessary, new_activity is iterated and overwritten on each loop
            }
        }

        usort($new_activity, function($a, $b) {
            // MUST CAST ISO 8601 TIME FORMAT WITH strtotime FUNCTION in PHP !!!
                return strtotime($a['start']) - strtotime($b['start']);
             });

        $big_array[$saved] = $new_activity; // !!! put date sort in php serverside instead of jquery clientside?
    }

};

//deleted the sort function for dates, can do sort in json javascript or usort once encoded in json
//print_r($big_array);
// ksort the multiarray first here to get the dates in order before sending to jqueryscript

ksort($big_array); // sort key 

echo json_encode($big_array);

/*foreach($new_array as $key => $row) {

    for ($i = 0; $i < count($row); $i++) {
    if ($new_array[$key][$]['start'] < $new_array[$key][$b]['start'] ? -1 : 1;

    }
}*/


?>