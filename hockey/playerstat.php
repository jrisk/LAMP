<?php

// hockey player stat array push file
//gets an array of numbers to insert into mysql table as values 

function playerParser($playerfile) {

	//add regex if test for playerfile argument already in quotes
	$playerfile = "./" . $playerfile. "";

	$playerstats = file_get_contents($playerfile);

	$playerarray = explode("\n", $playerstats);

	$numbers_array = [];

	$extra_array = [];

	$extra_array[0] = "NULL";

	$extra_array[1] = $playerarray[0];

	$extra_array[2] = $playerarray[1];

	$extra_array[3] = $playerarray[3];

	var_dump($extra_array);

	$arr_count = count($playerarray);

	for ($i=0; $i<=$arr_count; $i++) {
	if ($i >= 21 && $i <= 30 || ($i >= 45 && $i <= 54) || ($i >= 71 && $i <= 80) || ($i >= 98 && $i <= 107)) {
	array_push($numbers_array, ($playerarray[$i]));
	}
}

	echo "<br><br>";

	$numbers_string = implode(",", $numbers_array);

	$extra_query = implode("','", $extra_array);

	$extra_query = str_replace("'1", "1", $extra_query);

	$extra_query .= ",";

	$query = substr_replace ($numbers_string, $extra_query, 0, 0);

	echo "<br><br>";

	$query = "'" . $query;

	$query = str_replace("%", "", $query);

	$query = str_replace(":", "", $query);

	echo $query;

	echo "<br>";

	$columns = "`ID`, `Player Name`, `Season`, `Analytic Player Rating`, 
		`GPs`, `Total TOI`, `Percent of Game Played`, `Total Shifts`, 
		`Average Shift Length`, `5-5 TOI`, `PP TOI`, `PK TOI`, `GOIF`, 
		`GOIA`, `G`, `A`, `P`, `+/-`, `SOG`, `Shooting Percentage`, 
		`PIM`, `Faceoff Percentage`, `Stastitical Rating`, `Team Value Rating`, 
		`PP GOIF`, `PP GOIA`, `PPG`, `PPA`, `PP Efficiency`, `PK GOIF`, `PK GOIA`, 
		`SHG`, `SHA`, `PK Efficiency`, `Point Per Min`, `SA Per Min`, 
		`Good/Smart Passes Per Min`, `Hits Per MIn`, `Positive Plays Per Min`, 
		`Negative Plays Per Min`, `BS Per Game`, `Takeaways to Turnovers`, 
		`Positive to Negative Plays`, `SOG to SA`";

	$sql_query = "INSERT INTO hockeytest ($columns) VALUES ($query)";

	// include("connect.php");

	$result = mysqli_query($connection, $sql_query);

}

playerParser("sheatheodore.txt");








?>