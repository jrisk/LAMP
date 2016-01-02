<?php
include("pdo.php");
//Return list of activities under a specific DAY OF THE WEEK


// get the total number of DATES and iterate through each DAY OF THE WEEK in the subsequent loops
// for total calendar view, getting all the DAYS IN ORDER on page load 

$day = array();

$big_array = array();

$tempMon = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

for ($n = 0; $n <= ((count($tempMon)) - 1); $n++) {

$act_array = array();

$tempDay = $tempMon[$n];

    for ($i=0; $i <= ((count($result)) - 1); $i++) {

    //check each result to see which days its on (day == 1) by looping through each day
    
    //check if activity is on a certain day of the week
    if ($result[$i][$tempDay] == 1) {

             $act_array[] = array(
                        'id' => $result[$i]['ID'],
                        'title' => $result[$i]['Activity'],
                        'date' => $result[$i]['Adate'],
                        'start' => $result[$i]['Adate'] . 'T' . $result[$i]['Start'],
                        'end' => $result[$i]['Adate'] . 'T' . $result[$i]['End'],
                        'class' => $result[$i]['Class'],
                        'plan' => $result[$i]['Plan'],
                        'monday' => $result[$i]['Monday'],
                        'tuesday' => $result[$i]['Tuesday'],
                        'wednesday' => $result[$i]['Wednesday'],
                        'thursday' => $result[$i]['Thursday'],
                        'friday' => $result[$i]['Friday'],
                        'saturday' => $result[$i]['Saturday'],
                        'sunday' => $result[$i]['Sunday']
                        );
                }
            }

         $rand_arr[$tempDay] = $act_array;
    };

//ksort($big_array);
//not ordered in any way

echo json_encode($rand_arr);

?>