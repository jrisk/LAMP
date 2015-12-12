<?php

$test = "<script>alert(0);</script><b>hello</b>helloagain";

$st = strip_tags($test)

echo $st . "<br>";


echo "<br>" . $htmlsc = htmlspecialchars($test);

echo "<br>" . $htmlent = htmlentities($test);
?>