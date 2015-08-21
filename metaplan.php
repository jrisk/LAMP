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
    $new_activity = [];
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

var_dump($plan);

//sort the returning rows in order or start time !!!

$sorted_array = array();

$date_array = array();

        foreach ($result as $key) {
            for ($k = 0; $k < count($plan); $k++) {
                // this is where i stopped for the night //////////////////////////////// .....


                    ///...........................///////////STOPPED HERE, NEED TO MAKE MORE ARRAY 
                //HOLDERS FOR DATE ARRAY AND FOR NEXT ITERATION PROBLEM AT BOTTOM

                //ALSO HAVE TO NORMALIZE KEYS to 0-5 INSTEAD OF 0, 5 , 10, 11, rand
                //random numbers of keys from database map count
                $dplan = $plan[$k];

                if ($key['Plan'] == $dplan) {
                    $fix = str_replace(":", "", $key["Start"]);
        
                    array_push($date_array, $fix);

                    sort($date_array);
        }
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
            <button class='btn btn-primary btn-md' type='button' id='editact'>Edit</button>
        </div>
        <div class='col-sm-1'>
            <button class='btn btn-danger btn-md' type='button' id='delact'>Delete</button>
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