<?php

include('connect.php');

$key1 = array("'NULL'", "'person2'", "'password2'", '0');

$output = implode(",", $key1);

echo $output;

/*$query = "INSERT INTO testtable VALUES (" . $output . ")";

echo $query;

echo "<br>";

print_r($query);

echo "<br>";

var_dump($query);

$result = mysqli_query($connection, $query);

echo "<br>" . $result . "<br>";

$query2 = "SELECT * FROM testtable";

$result2 = mysqli_query($connection, $query2);

while($row=mysqli_fetch_row($result2))
{
	for ($i=0; $i<count($row); $i++) 
	{
		echo $row[$i];
	}

}
*/

echo "<br><br>";

$columns = "`Name`, `Stat1`, `Stat2`, `Stat3`, `Stat4`, 
	`Stat5`, `Stat6`, `Stat7`, `Stat8`, `Stat9`, `Stat10`, 
	`Stat11`, `Stat12`, `Stat13`, `Stat14`, `Stat15`, `Stat16`, 
	`Stat17`, `Stat18`, `Stat19`, `Stat20`, `Stat21`, `Stat22`, 
	`Stat23`";

	mysql_real_escape_string($columns);

echo $columns;



?>