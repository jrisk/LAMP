<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

$_SESSION["currentplan"] = $_POST["planning"];

$dplan = $_SESSION["currentplan"];

//sort the returning rows in order or start time !!!

$sorted_array = array();

$date_array = array();

        foreach ($result as $key) {
                $fix = str_replace(":", "", $key["Start"]);
        
                array_push($date_array, $fix);

                sort($date_array);
        }

for ($i=0; $i<=(count($date_array) - 1); $i++) {


$sorted = substr_replace($date_array[$i], ":", 2, 0);
$sorted = substr_replace($sorted, ":", 5, 0);

array_push($sorted_array, $sorted);

}

//duration and time fix: 
//changing database seconds into readable minutes/hours and start time into
//readable PM/AM time can be done in jquery now


for ($i=0; $i<=(count($sorted_array) - 1); $i++) {

        foreach($result as $key) {
	       
               if ($key["Plan"] == $dplan && $key["Start"] == $sorted_array[$i]) {

		echo "<div class='well well-sm well-blue'><div class='row' id='enteracts'>
                <div class='col-sm-2'>
                <button class='btn btn-primary btn-lg' type='button' id='editact'>Edit</button>
                </div>
        <div class='col-sm-4' id='enteractivity'>" . $key['Activity'] .
        "</div>
        <div class='col-sm-3' id='enterduration'>" . $key['Duration'] .
        "</div>
        <div class='col-sm-3' id='enterstart'>" . $key['Start'] . 
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