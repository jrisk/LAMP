<?php


$contents = file_get_contents("./testlines.txt");

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
/*foreach ($arr as $key => $value) {
	echo "key is " . $key . " and value is" . $value;
	echo "<br>";
}
*/
echo "<br><br>";

print_r($numbers_array);

echo "<br><br>";

var_dump($numbers_array);

echo "<br><br>";

echo array_keys($arr);

echo "<br>";

echo $arr[6] . $arr[7];

// $newarray = newarray()
?>