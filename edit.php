<?php

session_start();

include("credentials.php");

$id = NULL; // no ID right now, prevent login // cant be null on website

$activity = htmlentities($_POST['activity']);
$oldActivity = htmlentities($_POST['old_activity']);

$start_time = htmlentities($_POST['start_time']);
$oldStart = htmlentities($_POST['old_start']);

$end_time = htmlentities($_POST['end_time']);
$oldEnd = htmlentities($_POST['old_end']);

$date = htmlentities($_POST['date_planfix'];);
$oldEnd = htmlentities($_POST['old_']);

$plan = htmlentities($_POST['lesson_name']);
$oldPlan = htmlentities($_POST['old_plan']);

$class = htmlentities($_POST['user_group']);
$oldClass = htmlentities($_POST['old_class']);

$comment_note = NULL; // cant be null in website

$weekly = NULL // cant be null on website. changed to weekly yes/no to copy to future weeks

$media = NULL; //$_POST['media']; // url for media objects stored in activities

$entry_time = NULL; // cant be null on website

$owner = 1;

//this only works because the 2 identical name parameters sent collapse to 1, the last 1 sent, in php
//with the hidden input div set first, if the checkbox isnt checked, thats the only 1, if it IS checked,
//its the 2nd and last input with that name, so it's the one read by php in the POST variable

$monday = $_POST['Monday'];
$tuesday = $_POST['Tuesday'];
$wednesday = $_POST['Wednesday'];
$thursday = $_POST['Thursday'];
$friday = $_POST['Friday'];
$saturday = $_POST['Saturday'];
$sunday = $_POST['Sunday'];

//start try/catch PDO
//this is bad coding practice to put pdo in try/catch apparently

//start of try normally, deleted try/catch

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($activity!= $oldActivity && $oldActivity != 'NULL') {

$stmt = $db->prepare("UPDATE lessonplan SET Activity=:activity WHERE ID=:id");

$stmt->bindParam(":activity", $activity, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

if ($start_time != $oldStart) {

$stmt = $db->prepare("UPDATE lessonplan SET Start=:start WHERE ID=:id");

$stmt->bindParam(":start", $start_time, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

if ($end_time != $oldEnd) {

$stmt = $db->prepare("UPDATE lessonplan SET End=:end WHERE ID=:id");

$stmt->bindParam(":end", $end_time, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

if ($end_time != $oldEnd) {

$stmt = $db->prepare("UPDATE lessonplan SET End=:end WHERE ID=:id");

$stmt->bindParam(":end", $end_time, PDO::PARAM_STR);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

}

echo "error or something ?";


?>

