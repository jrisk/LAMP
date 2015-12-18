<?php

session_start();

include("credentials.php");

//register the current plan as the default session plan
// if its the last plan to be uploaded during a session

$_SESSION['currentplan'] = $_POST['lesson_name'];

// Post variables

$id = NULL; // no ID right now, prevent login // cant be null on website

$plan = htmlentities($_POST['lesson_name']);

//check before insert that plan is unique and day-time values dont collide with other

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare("SELECT * FROM lessonplan WHERE Plan=:plan");

$stmt->bindParam(":plan", $plan, PDO::PARAM_STR);

$stmt->execute();

$rows = $stmt->rowCount();

if ($rows == 0) { //there is no duplicate

	echo "<p id='plan_good'>Plan " . $plan . " Saved</p>";

	}

	else { //theres a dupe plan name or error maybe
		echo "<p id='plan-dupe'>Plan Name " . $plan . "already exists</p>";
	}

?>