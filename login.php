<html>
<head>
	<title>Could not log in</title>
</head>
<body>

<?php

session_start();

// need server variables

include('connect.php');

mysqli_connect($server, $username, $password, $database) or die("cannot connect");

//username and password sent from main.php form

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// mysql injection security code

$myusername = stripslashes($myusername);

$mypassword = stripslashes($mypassword);

$myusername = mysqli_real_escape_string($connection, $myusername);

$mypassword = mysqli_real_escape_string($connection, $mypassword);

$sql = "SELECT * FROM $tablename WHERE user='$myusername' AND password='$mypassword'";

$result2 = mysqli_query($connection, $sql);

$count = mysqli_num_rows($result2);

//if result matches $myusername and $mypassword
if ($count==1) {

	//Register session and redirect to landing success page

	$_SESSION['myusername'] = $myusername;
	$_SESSION['mypassword'] = $mypassword;
	header("location:homepage.php");
}
else {
		echo ("Could not log in.");
}

?>

<form id="login" action="login.php" method="post">
<fieldset>

<div><input name='myusername' type='text' id='username'></div>

<div><input name='mypassword' type='text' id='password'></div>

<input type='submit' name='submit' value='Login'>
</fieldset>
</form>
</body>
</html>