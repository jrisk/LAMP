<?php
//logout

session_start();

session_destroy();
header("Location: main.php");


?>