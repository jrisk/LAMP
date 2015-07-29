
<html>
<head>
<title>Table</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<table class="table">
<thead>
<row class="row">
<th>GPs</th>
<th>Total TOI</th>
<th>Percent of Game Played</th>
<th>Total Shifts</th>
<th>Average Shift Length</th>
<th>5-5 TOI</th>
<th>PP TOI</th>
<th>PK TOI</th>
<th>GOIF</th>
<th>GOIA</th>
</thead>
</row>
<?php
require('connect.php');

$contents = file_get_contents("./sheatheodore.txt");

$arr = explode("\n", $contents);

$arr_count = count($arr);

echo "<br>";

$numbers_array = [];

for ($i=0; $i<=$arr_count; $i++) {
	if ($i >= 21 && $i <= 30) {
	echo $arr[$i];
	echo "<br>";
	array_push($numbers_array, ($arr[$i]));
	}
}

$testtable = "testtable";

// $query2 = "DESCRIBE testtable";

$query = "SELECT * FROM testtable";

//$query = "SHOW table status";

$result = mysqli_query($connection, $query);

echo "<row class='row'>";



for ($i=0; $i<count($numbers_array); $i++) {
	echo "<td>" . $numbers_array[$i] . "</td>";
}

echo "</row>";


var_dump($result);

?>

<table class="table">
<thead>
<row class="row">
<th>G</th>
<th>A</th>
<th>P</th>
<th>+/-</th>
<th>SOG</th>
<th>Shooting Percentage</th>
<th>PIM</th>
<th>DZOs Per Game</th>
<th>Statistical Rating</th>
<th>Team Value Rating</th>
</row>
</thead>

<?php

// 45-54 2nd row stats (11-19 in numbers array)

echo "Would this actually work?";

for ($i=0; $i<=$arr_count; $i++) {
		if ($i >= 45 && $i <= 54) {
			echo $arr[$i];
			array_push($numbers_array, ($arr[$i]));
		}
}

echo "<row>";
for ($i=10; $i < count($numbers_array); $i++) {
	echo "<td>" . $numbers_array[$i] . "</td>";
}

echo "</row>";

?>

<thead>
<row>
	<th>PP GOIF</th>
<th>PP GOIA</th>
<th>PPG</th>
<th>PPA</th>
<th>PP Efficiency</th> 
<th>PK GOIF</th>
<th>PK GOIA</th>
<th>SHG</th>
<th>SHA</th>
<th>PK Efficiency</th>
</row>
</thead>

<?php

// 71-80

for ($i=0; $i<=$arr_count; $i++) {
		if ($i >= 71 && $i <= 80) {
			echo $arr[$i];
			array_push($numbers_array, ($arr[$i]));
		}
}

echo "<row>";
for ($i=20; $i < count($numbers_array); $i++) {
	echo "<td>" . $numbers_array[$i] . "</td>";
}

echo "</row>";

?>

<thead>
	<row class="row">
		<th>Points Per Min</th>
		<th>SA Per Min</th>
		<th>Good/Smart Passes Per Min</th>
		<th>Hits Per min</th>
		<th>Positive Plays Per Min</th>
		<th>Negative Plays Per Min</th>
		<th>BS Per Game</th>
		<th>Takeaways to Turnovers</th>
		<th>Positive to Negative Plays</th>
		<th>DZOs to Turnovers</th>
	</row>
</thead>

<?php

// 98-107

for ($i=0; $i<=$arr_count; $i++) {
		if ($i >= 98 && $i <= 107) {
			echo $arr[$i];
			array_push($numbers_array, ($arr[$i]));
		}
}

echo "<row>";
for ($i=30; $i < count($numbers_array); $i++) {
	echo "<td>" . $numbers_array[$i] . "</td>";
}

echo "</row>";

?>

</table>
</body>
</html>

<?php

var_dump($numbers_array);

?>