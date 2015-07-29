<?php

session_start();

include("credentials.php");

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