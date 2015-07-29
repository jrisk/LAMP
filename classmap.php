<?php

/***not yet functioning***/

$user = "*****";
$password = "*****";
$dsn = "mysql:dbname=*****;host=localhost";


class User {
	public $username;

	public function fullname() {
		return $this->username;
	}

}

try {

$newpdo = new PDO($dsn, $user, $password);

$newpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$result = $newpdo->query("SELECT user FROM newtest WHERE id = 3");

//map results to object

$result->setFetchMode(PDO::FETCH_CLASS, 'User');

while ($user = $result->fetch()) {
	// call custom fullname method from object
		echo "why" . $user->fullname() . "wont this work";
	}

}

catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

echo "test";

?>