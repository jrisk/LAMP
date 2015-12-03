<?php
include("pdo.php");
//Activities row in php, returns list of activities under a specific lesson plan name

$_SESSION["currentplan"] = $_POST["planning"];

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

echo "<div class='container label-row-insert' id='label-row-copy'>
    <div class='row'>
        <div class='col-sm-5 col-xs-12'>
            <h4><div class='well well-acts'>Activity</div></h4>
        </div>
        <div class='col-sm-2 col-xs-12'>
            <h4><div class='well well-starts'>Start Time</div></h4>
        </div>
        <div class='col-sm-2 col-xs-12'>
            <h4><div class='well well-ends'>End Time</div></h4>
        </div>
        <div class='col-sm-2 col-xs-12'>
            <h4><div class='well well-media'>Media</div></h4>
        </div>
        <div class='col-sm-1 col-xs-12'>
            <h4><div class='well well-options'>Del</div></h4>
        </div>
    </div>
</div>";


for ($i=0; $i<=(count($sorted_array) - 1); $i++) {

        foreach($result as $key) {
	       
               if ($key["Plan"] == $dplan && $key["Start"] == $sorted_array[$i]) {

		echo

"<br>

<div class='container container-insert' id='activity-container-copy'>
    <!--mobile label in order -->
    <div class='row' id='activity-molab-copy'>
    <div class='activity-insert'>
        <div class='col-xs-12'>
         <button class='btn btn-danger btn-md delact-copy' type='button'>delete</button>
            <h3><div class='label label-primary'>Activity</div></h3>
            <div hidden class='mobileID'>" . $key['ID'] .
        "</div>
        </div>
    </div>
    </div>
    <!-- activity label end -->
    <div class='row act-start-end-row'>
        <div class='col-xs-12 col-sm-5 activity-col'>
        <div id='act" . $key['ID'] . "' class='well well-sm activity-inserted'>" . $key['Activity'] .
        "</div></div>

        <!-- start 2nd row on mobile <div class='row' id='start-time-molab-copy'>-->
        <div class='col-xs-12 start-insert' id='start-time-molab-copy'>
            <h3><div class='label label-warning'>Start</div></h3>
        </div>
        <!-- end start label row mobile -->
        
        <div class='col-xs-12 col-sm-2'><div class='well well-sm start-time-insert'>" . $key['Start'] .
        "</div></div>

        <!-- end time mobile label <div class='row' id='end-time-molab-copy'>-->
        <div class='col-xs-12 end-insert' id='end-time-molab-copy'>
            <h3><div class='label label-success'>End</div></h3>
        </div>
        <!--end end time molab -->

        <div class='col-xs-12 col-sm-2'><div class='well well-sm end-time-insert'>" . $key['End'] .
        "</div></div>

        <div hidden class='activityID'>" . $key['ID'] . 
        "</div>

        <div class='col-xs-12 col-sm-2'><div class='well well-sm media-insert'>" . "media" .
        "</div></div>

        <div class='col-sm-1'>
            <button class='btn btn-danger btn-md delact delact-full' type='button' id='delactid'>X</button>
        </div>

    </div>

</div> <!-- end activity input row container -->";

	}
}

}


?>