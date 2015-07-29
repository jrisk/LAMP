<?php
//logout

session_start();

unset($_SESSION['myusername']);
header("Location: main.php");


?>