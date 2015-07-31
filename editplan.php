<?php

session_start();

include("pdo.php");

$db = new PDO($dsn, $username, $password;

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db->prepare("DELETE FROM lessonplanner VALUES ")