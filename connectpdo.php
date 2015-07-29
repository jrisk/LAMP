<?php
$user = "root";
$password = "password";
$dsn = 'mysql:dbname=testdb;host=localhost';

$id = 2;

try {

	$db = new PDO($dsn, $user, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $db->prepare("SELECT * FROM newtest");
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();

	// get result array containing all values in prepared statement execution

	$result = $stmt->fetchAll();

	// if one or more results returned

	if (count($result)) {
		foreach($result as $row) {
		print_r($row);
			echo "hello <br>";
		}
	}
	else {
			echo "no results returned";
		}

} catch (PDOException $e) {
	echo 'Connection didnt work' . $e->getMessage();

}


echo "<br><br>";
echo "test print";


?>