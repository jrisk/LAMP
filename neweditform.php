<?php

session_start();

include("credentials.php");

//register the current plan as the default session plan
// if its the last plan to be uploaded during a session

//deserialize the jquery string back to PHP Post variables

//parse_str($_POST["data"], $_POST);

$_SESSION['currentplan'] = $_POST['old_plan'];

// Post variables

$plan = $_POST['new_plan'];

$oldPlan = $_POST['old_plan'];

$class = $_POST['new_class'];

$oldClass = $_POST['old_class'];

$date = $_POST['new_date'];

$oldDate = $_POST['old_date'];

//start of try normally, deleted try/catch

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($plan != $oldPlan && $oldPlan != 'NULL') {

$stmt = $db->prepare("UPDATE lessonplan SET Plan=:plan WHERE Plan=:oldplan");

$stmt->bindParam(":oldplan", $oldPlan, PDO::PARAM_STR);

$stmt->bindParam(":plan", $plan, PDO::PARAM_STR);

$stmt->execute();

}

else if ($class != $oldClass) {

$stmt = $db->prepare("UPDATE lessonplan SET Class=:class WHERE Plan=:newplan");

$stmt->bindParam(":newplan", $plan, PDO::PARAM_STR);

$stmt->bindParam(":class", $class, PDO::PARAM_STR);

$stmt->execute();

}

else if ($date != $oldDate) {

$stmt = $db->prepare("UPDATE lessonplan SET Adate=:adate WHERE Plan=:newplan");

$stmt->bindParam(":newplan", $plan, PDO::PARAM_STR);

$stmt->bindParam(":adate", $date, PDO::PARAM_INT);

$stmt->execute();

}

else {
	echo "what happened?";
}

//start catch

echo "Plan and Activity have been saved";

?>