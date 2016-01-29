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



?>