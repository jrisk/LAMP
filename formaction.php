<?php

session_start();

include("credentials.php");

//register the current plan as the default session plan
// if its the last plan to be uploaded during a session

//deserialize the jquery string back to PHP Post variables

//parse_str($_POST["data"], $_POST);

$_SESSION['currentplan'] = $_POST['lesson-name'];

// Post variables

$id = "NULL"; // no ID right now, prevent login

$plan = $_POST['lesson-name'];

$class = $_POST['user-group'];

$activity = $_POST['activity'];

$date = $_POST['date-planfix'];

// for specific day of week $day_db = strstr($day, ",", true);

$start_time = $_POST['start-time'];

$start_time_db = substr($start_time, 0, -3);

$end_time = $_POST['end-time'];

$end_time_db = substr($end_time, 0, -3);

$comment_note = $_POST['commentnote'];

$duration = $_POST['duration-time'];

$entry_time = NULL;

$owner = $_SESSION['user_ID'];

// pdo stuff

try {

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare("INSERT INTO lessonplan VALUES (:id, :plan, :class, :activity, :adate, :start_time, :end_time,
:comment_note, :duration, :entry_time, :owner)");

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->bindParam(":plan", $plan, PDO::PARAM_STR);

$stmt->bindParam(":class", $class, PDO::PARAM_STR);

$stmt->bindParam(":activity", $activity, PDO::PARAM_STR);

$stmt->bindParam(":adate", $date, PDO::PARAM_STR);

$stmt->bindParam(":start_time", $start_time_db, PDO::PARAM_INT);

$stmt->bindParam(":end_time", $end_time_db, PDO::PARAM_INT);

$stmt->bindParam(":comment_note", $comment_note, PDO::PARAM_STR);

$stmt->bindParam(":duration", $duration, PDO::PARAM_STR);

$stmt->bindParam(":entry_time", $entry_time, PDO::PARAM_INT);

$stmt->bindParam(":owner", $owner, PDO::PARAM_STR);

//execute the prepared statement

$stmt->execute();

//end try
}

//start catch

catch (PDOException $e) {
	echo "Error retrieving data: " . $e->getMessage();
}

echo "Plan and Activity have been saved";

?>