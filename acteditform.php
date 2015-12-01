<?php

session_start();

include("credentials.php");

//register the current plan as the default session plan
// if its the last plan to be uploaded during a session

//deserialize the jquery string back to PHP Post variables

//parse_str($_POST["data"], $_POST);

$_SESSION['currentplan'] = $_POST['old_plan'];

// Post variables

$id = $_POST['id'];

$activity = $_POST['activity'];

$oldActivity = $_POST['old_activity'];

$start_time = $_POST['start_time'];

$oldStart = $_POST['old_start'];

$end_time = $_POST['end_time'];

$oldEnd = $_POST['old_end'];



//start of try normally, deleted try/catch

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($activity!= $oldActivity && $oldActivity != 'NULL') {

$stmt = $db->prepare("UPDATE lessonplan SET Activity=:activity WHERE ID=:id");

$stmt->bindParam(":activity", $activity, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

else if ($start_time != $oldStart) {

$stmt = $db->prepare("UPDATE lessonplan SET Start=:start WHERE ID=:id");

$stmt->bindParam(":start", $start_time, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

else if ($end_time != $oldEnd) {

$stmt = $db->prepare("UPDATE lessonplan SET End=:end WHERE ID=:id");

$stmt->bindParam(":end", $end_time, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

else {
	echo "error or something ?";
}

//start catch

echo "Plan and Activity have been saved";

?>