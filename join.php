<?php

$newuser = $_POST['newusername'];

$newpass = $_POST['newpassword'];

// make statement object from database connection variable $conn

include("credentials.php");

try {

$conn = new PDO($dsn, $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT * FROM users WHERE name=:name");

$stmt->bindParam(":name", $newuser, PDO::PARAM_STR);

$stmt->execute();

if (count($stmt->fetchAll())) {
	exit("Username Taken");
	}

// if username not taken

$stmt = $conn->prepare('INSERT INTO users VALUES (NULL, :newuser, :newpass)');

$stmt->bindParam(':newuser', $newuser, PDO::PARAM_STR);

$stmt->bindParam(':newpass', $newpass, PDO::PARAM_STR);

$stmt->execute();


//try end

}

catch (PDOException $e) {
	echo "PDO Error: " . $e->getMessage();
}

echo "<html><head><title>Account Created</title></head><body>
<a href='main.php'>Thanks for joining. You can now login on the mainpage</a>
</body></html>"

?>

