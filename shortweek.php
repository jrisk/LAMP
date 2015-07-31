<html>
<head>
<title>Bootstrap Stuff</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<!--<script src="extrajs.js"></script> -->

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<body>
    <?php
session_start();

if (!(isset($_SESSION['myusername']))) {
  header("location:main.php");
}

?>

<div class="page-header">
    <div class="text-center"><b><?=$_SESSION['myusername']?>'s Planner</b></div>
</div>

//jquery overflow table data-role and ui NOT bootstrap
<table data-role="table" class="helldod">
    <tr class="active">
        <td class="col-xs-2" id="head-subject">
            Subject
        </td>
        <td class="col-xs-2" id="head-monday">
            Monday
        </td>
        <td class="col-xs-2" id="head-tuesday">
            Tuesday
        </td>
        <td class="col-xs-2" id="head-wednesday">
            Wednesday
        </td>
        <td class="col-xs-2" id="head-thursday">
            Thursday
        </td>
        <td class="col-xs-2" id="head-friday">
            Friday
        </td>

    </tr>
    <!-- end header row start activity days rows -->

        <tr class="warning">
            <td class="col-md-2" id="subject">
            </td>
        <td class="col-md-2" id="Monday">
            BBB BBBBBBBCCCCCCCCCC CCCCCCCCCCCCDDDDD DDDDDDDDDDDDDDD DDDDDDD
            <div class="container-fluid">AAAAAAABBBB BBBBBBBCCCCCCCCCC CCCCCCCCCCCCDDDDD DDDDDDDDDDDDDDD DDDDDDDDDDDD DDDDDDDDD DDD EEE</div>
        </td>
        <td class="col-md-2" id="Tuesday">
            <div class="well">AAAABBBB BBBBBBBCCCCCCCCCC CCCCCCCCCCCCDDDDD DDDDDDD</div>
        </td>
        <td class="col-md-2" id="Wednesday">
        </td>
        <td class="col-md-2" id="Thursday">
        </td>
        <td class="col-md-2" id="Friday">
        </td>
            </tr>
             <!--thead -->
        </table> <!--table-->

</body>
</html>