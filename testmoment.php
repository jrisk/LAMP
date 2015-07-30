// test moments objects

<html>
<head>
<title>Moment objects</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>
<body>

    <?php
include("pdo.php");

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

for ($i=0;$i<=(count($result) - 1); $i++) {

	$startobj[$i] = $result[$i]['Start'];
	$endobj[$i] = $result[$i]['End'];
	$dayobj[$i] = $result[$i]['Day'];
		}

for ($i=0; $i<=3; $i++) {
echo $startobj[$i];
echo "<br>";
echo $endobj[$i];
echo "<br>";
echo $dayobj[$i];
echo "<br><br>";
}

?>

<div class="well">Time is: <div id="dater"></div></div>

<div class="well well-inside">Moment object: <p id="timer"></p></div>

<script>

var start_array = <?php echo json_encode($startobj); ?>;

alert(start_array);

</script>
</body>
</html>
