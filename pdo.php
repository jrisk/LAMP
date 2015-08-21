<?php

session_start();

$_SESSION['myusername'] = "test";
$_SESSION['mypassword'] = "testpass";

include("credentials.php");

// auto-login for site i guess
$_SESSION['user_ID'] = 1;

$id = $_SESSION['user_ID'];

try {

	$db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $db->prepare("SELECT * FROM lessonplan WHERE Owner = :id");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	// get result array containing all values in prepared statement execution

	$result = $stmt->fetchAll();

} catch (PDOException $e) {
	echo 'Connection didnt work' . $e->getMessage();

}

?>