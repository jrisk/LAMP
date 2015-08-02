<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

$_SESSION['currentplan'] = $_POST['planning'];

$dplan = $_SESSION['currentplan'];

/*function durationfix() {

	if($key['Duration'])
}

function startOrder() {
	sort($key['Start'])
}*/



foreach($result as $key) {
	if ($key['Plan'] == $dplan) {

		echo "<div class='well well-sm well-blue'><div class='row'>
        <div class='col-sm-6'>" . $key['Activity'] .
        "</div>
        <div class='col-sm-3' id='durationtime2'>" . $key['Duration'] .
        " minutes</div>
        <div class='col-sm-3' id ='startview'>" . $key['Start'] . 
        "</div>
        </div>
        </div>";

	}

}

?>