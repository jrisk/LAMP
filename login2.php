<?php

//server variables 

include("credentials.php");

//get Post data from main login form

$username = $_POST["myusername"];

$userpass = $_POST["mypassword"];

//start PDO try/catch database search for login info

try {

$conn = new PDO($dsn, $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM users WHERE name = :name AND password = :password");

// prevent any chance of SQL injection by binding parameters 

$stmt->bindParam(":name", $username, PDO::PARAM_STR);
$stmt->bindParam(":password", $userpass, PDO::PARAM_STR);

$stmt->execute();

// put database column items into an array

$resultfetch = $stmt->fetch();

$rowtrue = $stmt->fetchAll();

$fetchbool = count($stmt->fetch());

// if user exists, create session variable and go to login success redirect page

if ($resultfetch) {

	session_start();
	$_SESSION['myusername'] = $username;
	$_SESSION['mypassword'] = $userpass;

	// user ID in users table is foreign key to owner column in lessonplan table
	$_SESSION['user_ID'] = $resultfetch["user_ID"];

	header("location:homepage.php");
}

else {
	echo "Username or Password was Incorrect. Try again.";

	header("location:main.php");
}

//end try
}

//start catch

catch (PDOException $e) {
	echo "Error in retrieving data: " . $e->getMessage();
}


?>