<?php

/* login to test database */

$server = 'localhost';

$username = 'root';

$password = 'password';

$database = 'testdb';

$tablename = 'testtable';

$connection = new mysqli($server, $username, $password, $database);

mysqli_report(MYSQLI_REPORT_ERROR);
?>