<html>
<head>
    <title>Lesson Plan V3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>
<script src="./extrajs.js"></script>

<!-- testing purposes <script src="./testing.js"></script> -->
<script src="//www.modernizr.com/downloads/modernizr
-latest.js" type ="text/javascript"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
               <a href="./calplug.php">
                    <button type="button" class="btn btn-lg btn-primary">Calendar</button>
                </a>
                <a href="./makeplan2.html">
                    <button type="button" id="make-plan-btn" class="btn btn-lg btn-primary">New Plan</button>
                </a>
            <div class="navbar-right">
            <h3>
                    <button id="print-button">
                        <span class="glyphicon glyphicon-print"></span>
                    </button>
            </h3>
            </div>
        </div>
    </nav>

<?php

include('plans.php');

?>

<script>

$(function () {

$('#print-button').on('click tap', function(e) {

    window.print();
    
});

});
</script>
</body>
</html>