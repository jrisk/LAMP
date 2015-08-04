<?php

include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

$_SESSION['currentplan'] = "Coding";

$dplan = $_SESSION['currentplan'];

/*function durationfix() {

	if($key['Duration'])
}
*/


$fuck_array = array();

	$date_array = array();

	foreach ($result as $key) {
		$fix = str_replace(":", "", $key["Start"]);
	
		array_push($date_array, $fix);

		sort($date_array);
	}

for ($i=0; $i<=(count($date_array) - 1); $i++) {


$fuck = substr_replace($date_array[$i], ":", 2, 0);
$fuck = substr_replace($fuck, ":", 5, 0);

array_push($fuck_array, $fuck);

}

var_dump($fuck_array);

echo "<br><br>";

/*function durationfix() {

	if($key['Duration'])
}
*/
for($i=0; $i <= (count($fuck_array) - 1); $i++) {

foreach($result as $key) {
	if ($key["Plan"] == $dplan && $key["Start"] == $fuck_array[$i]) {

		echo "<div class='well well-sm well-blue'><div class='row' id='enteracts'>
                <div class='col-sm-2'>
                <button class='btn btn-primary btn-lg' type='button' id='editact'>Edit</button>
                </div>
        <div class='col-sm-4' id='enteractivity'>" . $key['Activity'] .
        "</div>
        <div class='col-sm-3' id='enterduration'>" . $key['Duration'] .
        " minutes</div>
        <div class='col-sm-3' id ='enterstart'>" . $key['Start'] . 
        "</div>
        <div hidden id='enterID'>" . $key['ID'] .
        "</div>
        <div hidden id='enterplan'>" . $dplan .
        "</div>
        <div hidden id='enterclass'>" . $key['Class'] .
        "</div>
        <div hidden id='enterday'>" . $key['Adate'] .
        "</div>
        </div>
        </div>";

	}

}

}

?>