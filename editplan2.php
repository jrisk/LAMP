<html>
<head>
    <title>Lesson Plan V3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://raw.githubusercontent.com/enyo/dropzone/master/dist/dropzone.js"></script>
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

<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="..." alt="...">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">Embed Media</h4>
  </div>
</div>

<div class="embed-styling-edit">
    <div class="embed-responsive embed-responsive-16by9">
         <iframe class="embed-responsive-item" src="//www.youtube.com/embed/Lo8dMqOQdz4"></iframe>
    </div>
</div>

<div id="preview-template" style="display: none;"></div>

<form
      class="dropzone"
      id="my-awesome-dropzone">

<div id="embed-styling-dropzone" class="dropzone-previews">
</div>

</form>

<?php

include('plans.php');

?>

<script>

$(function () {

$('#print-button').on('click tap', function(e) {

    window.print();
    
});

// INSTANTIATE THE DROPBOX


// TURN THE TIME INTO READABLE

var readTime = function(num) {

    var timeproto = $('#plan-time-specific-' + num).html();

    var endproto = moment(timeproto);

    var endhuman = moment(endproto).format('hh:mm A');

    $('#plan-time-specific-' + num).html(endhuman);
};

for (i = 0; i < ('.start-time-plans').length; i++) {
readTime(i);
};

Dropzone.options.myAwesomeDropzone = {

  url: '/prac.php',

  paramName:'file',

  maxFileSize: 2,

  previewsContainer: '#embed-styling-dropzone',

  previewTemplate: document.querySelector('preview-template').innerHTML


}

});
</script>
</body>
</html>