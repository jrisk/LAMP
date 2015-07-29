<?php

session_start();

$myusername = $_SESSION['myusername'];

if (isset($_SESSION['myusername'])) {
	echo "you have been logged in as " . $myusername . "";
	header("location:homepage.php");
}
else {
	header("location:main.php");
}
?>