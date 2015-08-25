<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

$_SESSION["currentplan"] = $_POST["specplan"];

$dplan = $_SESSION["currentplan"];

//sort the returning rows in order or start time !!!

$sorted_array = array();

$date_array = array();

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

//duration and time fix: 
//changing database seconds into readable minutes/hours and start time into
//readable PM/AM time can be done in jquery now

// *** there is a bug where if the start time is the same, the loop will post the same activity
// *** twice because of the start=array i clause in the if statement not accounting for that**//


for ($i=0; $i<=(count($sorted_array) - 1); $i++) {

        foreach($result as $key) {
	       
               if ($key["Plan"] == $dplan && $key["Start"] == $sorted_array[$i]) {

		echo "<div class='well well-sm well-blue'><div class='row' id='enteracts'>
        <div class='col-sm-4 classactivity' id='enteractivity'>" . $key['Activity'] .
        "</div>
        <div class='col-sm-2 durater' id='enterduration" . $i . "'>" . $key['Duration'] / 60 .
        " minutes</div>
        <div class='col-sm-2 starter' id='enterstart" . $i . "'>" . $key['Start'] .
        "</div>
        <div class='col-sm-2 ender' id='enterend" . $i . "'>" . $key['End'] .
        "</div>
        <div class='col-sm-1'>
            <button class='btn btn-primary btn-md' type='button' id='editact2'>Edit</button>
        </div>
        <div class='col-sm-1'>
            <button class='btn btn-danger btn-md' type='button' id='delact2'>Delete</button>
        </div>
        <div hidden id='enterID'>" . $key['ID'] .
        "</div>
        <div hidden id='enterplan'>" . $dplan .
        "</div>
        <div hidden class='classclass' id='enterclass'>" . $key['Class'] .
        "</div>
        <div hidden class='classday' id='enterday'>" . $key['Adate'] .
        "</div>
        <div hidden class='classend' id='enterend'>" . $key['End'] .
        "</div>
        </div>
        </div>";

	}
}

}

?>