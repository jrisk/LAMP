<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific DATE

$new_activity = array();
$new_array = array();

for ($n=0; $n <= ((count($result)) - 1); $n++) {

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
            };

echo json_encode($new_activity);

?>