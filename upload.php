<?php

$file = $_FILES['file'];

$contents = file_get_contents($file);

echo $contents;

?>