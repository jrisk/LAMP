<?php

$formbool = $_POST;

$formstuff = $_POST['myform'];

if ($formbool) {
	var_dump($formstuff);
}
else {

echo "hello post variable of name: my form did not work";

}

echo "<br>";
print_r($_POST);
?>