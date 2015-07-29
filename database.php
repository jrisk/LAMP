<?php
//connect2.php
//pdo version with lessonplan logins, user test and p testpass already there

include('credentials.php');

try {

$conn = new PDO($dsn, $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}

catch (PDOException $e) {
	echo "PDO Error: " . $e->getMessage();
}

?>