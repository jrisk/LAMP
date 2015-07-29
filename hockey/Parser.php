<?php

// class and function definitions

function gameStatMaker($gamefile) {

	$statsarray = [];

	$gamefile = "./" .$gamefile . "";

	$content = file_get_contents($gamefile);

	$stats = explode("\n", $content);

	$counter = (sizeof($stats));

for ($i=0; $i<=$counter; $i++)
{
	$statstring = $stats[$i];
	$statstemp = explode("\t", $statstring);
	$statstemp = preg_grep('/^\s*\z/', $statstemp, PREG_GREP_INVERT);
	$statstemp = array_values($statstemp);
	array_push($statsarray, $statstemp);


}

$statsarray = array_values(array_filter($statsarray));

$counter2 = (sizeof($statsarray));

for ($i=0; $i<=$counter2; $i++)
{
	print_r($statsarray[$i]);
	echo "<br><br>";
}

for ($i=0; $i<$counter2; $i++){
$statsarray[$i][0] = "'" . $statsarray[$i][0] . "'";
}

//include("connect.php");

for ($i=1; $i<$counter2; $i++) {

	$stat_query;
	$stat_string = "";
	$stat_query = implode(",", $statsarray[$i]);

	echo $stat_query;
	echo "<br>";
	if ($stat_query) {
	$stat_string .= $stat_query;
	}

	echo $stat_query;
	echo "<br>";

	$columns = "`Name`, `Stat1`, `Stat2`, `Stat3`, `Stat4`, 
	`Stat5`, `Stat6`, `Stat7`, `Stat8`, `Stat9`, `Stat10`, 
	`Stat11`, `Stat12`, `Stat13`, `Stat14`, `Stat15`, `Stat16`, 
	`Stat17`, `Stat18`, `Stat19`, `Stat20`, `Stat21`, `Stat22`, 
	`Stat23`, `Stat24`, `Stat25`";

	$query = "INSERT INTO gamestats ($columns) VALUES ($stat_query)";

	$result = mysqli_query($connection, $query);
}

echo "<br><br>";

var_dump($stat_string);
//$stats_query = implode(",", $statsarray);

}

gameStatMaker("GameApril172015.txt");

?>