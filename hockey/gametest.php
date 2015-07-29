<?php

$content = file_get_contents('./Gamestats.txt');

$stats = explode("\t", $content);

echo "<br>";

echo $stats[0];

$stats = explode("\n", $content);

//$strings = preg_split('/\s+/', $stats);

echo "<br><br>";

echo $stats[0];

echo "<br><br>";

echo $stats[1];

echo "<br><br>";

echo $stats[2];

echo "<br><br>";

echo $stats[3];

echo "<br><br>";

echo $stats[4];

echo "<br><br>";


$counter = (sizeof($stats));

echo "<br>";

$stats0 = $stats[0];

echo $stats0;

echo "<br><br>";

print_r($stats0);

echo "<br><br>";

var_dump($stats0);

var_dump($stats);

echo "<br><br><br>";

$stats0arr = explode("\t", $stats0);

print_r($stats0arr);

echo "<br><br><br>";

$stats0arr = preg_grep('/^\s*\z/', $stats0arr, PREG_GREP_INVERT);

print_r($stats0arr);

$stats0arr = array_values($stats0arr);

echo "<br><br><br>";

print_r($stats0arr);


$statsarray = [];

echo "<br><br><br>";

for ($i=0; $i<=$counter; $i++)
{
	$statstring = $stats[$i];
	$statstemp = explode("\t", $statstring);
	$statstemp = preg_grep('/^\s*\z/', $statstemp, PREG_GREP_INVERT);
	$statstemp = array_values($statstemp);
	array_push($statsarray, $statstemp);

}

echo "<br><br>";

$statsarray = array_values(array_filter($statsarray));

print_r($statsarray);

echo "<br><br>";



for ($i=0; $i<=$counter; $i++)
{
	print_r($statsarray[$i]);
	echo "<br><br>";
}

?>