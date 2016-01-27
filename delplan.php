<?php

//Delete form for specific plan and all activities under plan

session_start();

include("credentials.php");


//$_SESSION['currentplan'] = $_POST['lesson-name'];

// Post variables

$id = $_POST['deleteid'];

//$owner = $_SESSION['user_ID'];

//$plan = $_POST['lesson-name'];

// pdo stuff

try {

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare("DELETE FROM lessonplan WHERE ID = :id");

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

//execute the prepared statement

$stmt->execute();

//end try
}

//start catch

catch (PDOException $e) {
	echo "Error retrieving data: " . $e->getMessage();
}

echo "act number " . $id . " is deleted";

?>