<?php

$user = "*****";
$password = "*****";
$dsn = "mysql:dbname=*****;host=localhost";

$id = 5;

try {

$db = new PDO($dsn, $user, $password);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*

$stmt = $db->prepare("INSERT INTO newtest VALUES ('', :name, :pass, '')");

//bind both params

$stmt->bindParam(':name', $name, PDO::PARAM_INT);
$stmt->bindParam(':pass', $pass, PDO::PARAM_INT);

// 1st execution

$name = "goerge";
$pass = "thepass";

$stmt->execute();

// 2nd execution

$name = "dan";
$pass = "thepass2";

$stmt->execute();

*/ 

/**************************the above code worked **********************************/

/**************************so did the below code ********************************

$stmt = $db->prepare("DELETE FROM newtest WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

**************/


$stmt2 = $db->prepare("SELECT * FROM newtest");

$stmt2->execute();

$result = $stmt2->fetchAll();

if (count($result)) {
	foreach ($result as $row) {
		print_r($row);
	}
}

else {
	echo "no results returned";
}


}

catch(PDOException $e) {
	echo 'ERROR:' . $e->getMessage();
}

echo "testwork";

?>