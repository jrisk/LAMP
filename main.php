<html>
</head>
<title>Login</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./lessonplanner.css">
<body>

<form id="login" action="login2.php" method="post">
<fieldset>
<legend>Log in</legend>

<?php

session_start();

if(isset($_SESSION['myusername'])) {
	header("location:homepage.php");
}

?>


<div><input name="myusername" type="text" id="username"></div>

<div><input name="mypassword" type="password" id="password"></div>

<input type="submit" name="submit" value="Login">
</fieldset>
</form>
</body>
</html>