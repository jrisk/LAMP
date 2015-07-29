<html>
</head>
<title>Join Riskweb</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./lessonplanner.css">
</head>
<body>

<form id="newuser" action="join.php" method="post">

<div class="row">
<div class="col-xs-12">Make New Account</div>
</div>

<?php

session_start();

if(isset($_SESSION['myusername'])) {
	header("location:homepage.php");
}


?>


<span>Name</span>
<div class="container-fluid">
<div class="row">
<div class="col-xs-6"><input class="form-control" name="newusername" type="text" id="username"></div>
</div>
</div>

<span>Password</span>
<div class="container-fluid">
<div class="row">
<div class="col-xs-6"><input class="form-control" name="newpassword" type="password" id="password"></div>
</div>
</div>

<div class="col-xs-6 text-center">
<button class="btn btn-lg center">
<input type="submit" name="submit" value="Join">
</button>
</div>

</form>
</body>
</html>