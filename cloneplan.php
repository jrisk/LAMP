<?php

include("credentials.php");

//clone plans, make activities equal to 1 if that day is clicked, 0 otherwise

//this only works because the 2 identical name parameters sent collapse to 1, the last 1 sent, in php
//with the hidden input div set first, if the checkbox isnt checked, thats the only 1, if it IS checked,
//its the 2nd and last input with that name, so it's the one read by php in the POST variable

$monday = $_POST['Monday'];
$tuesday = $_POST['Tuesday'];
$wednesday = $_POST['Wednesday'];
$thursday = $_POST['Thursday'];
$friday = $_POST['Friday'];
$saturday = $_POST['Saturday'];
$sunday = $_POST['Sunday'];

$id = $_POST['idact'];

$conn = new PDO($dsn, $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("UPDATE lessonplan SET Monday = :monday
	, Tuesday = :tuesday
	, Wednesday = :wednesday
	, Thursday = :thursday
	, Friday = :friday
	, Saturday = :saturday
	, Sunday = :sunday WHERE ID = :id");

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->bindParam(":monday", $monday, PDO::PARAM_INT);
$stmt->bindParam(":tuesday", $tuesday, PDO::PARAM_INT);
$stmt->bindParam(":wednesday", $wednesday, PDO::PARAM_INT);
$stmt->bindParam(":thursday", $thursday, PDO::PARAM_INT);
$stmt->bindParam(":friday", $friday, PDO::PARAM_INT);
$stmt->bindParam(":saturday", $saturday, PDO::PARAM_INT);
$stmt->bindParam(":sunday", $sunday, PDO::PARAM_INT);

$stmt->execute();

//no error handling
// instead of try/catch ????
?>