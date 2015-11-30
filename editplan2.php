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
<!-- first script try ><script src="./extrajs.js"></script> -->
 
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
               <a class="btn btn-lg btn-primary" href="./calplug.php">Calendar</a>

                <a href="./makeplan2.html" class="btn btn-lg btn-primary">New Plan</a>
                
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
</div>

<hr><hr>

<div id="previews-container" class="dropzone-previews"></div>

<hr><hr>

<form class="dropzone" id="my-awesome-dropzone">
  <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
  <button id="upload-form">Upload</button>
</form>

<?php

include('plans.php');

?>

</body>

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

$('#upload-form').on('click tap', function(e) {

    console.log(thisImage);

    /*$.get('/uploads/' + thisImage, function(data) {
      $('.embed-styling-edit').html('<img alt="did not work at all" src="' + thisImage + '" />');

    });*/

    Dropzone.processQueue();

    e.preventDefault();
});

//$('.plan-holder').attr('id', 'previews-container').addClass('dropzone dropzone-previews');

$('.plan-holder').dropzone({

  url: 'upload.php',
  paramName: "file", // The name that will be used to transfer the file
  parallelUploads: 1,
  maxFilesize: 2, // MB
  previewsContainer: '#previews-container',
  previewTemplate: '<div id="preview-template" style="display: none;">'
    + '<div class="dz-preview dz-file-preview"><div class="dz-details">'
    + '<div class="dz-filename"><span data-dz-name></span></div><div class="dz-size" data-dz-size>'
    + '</div><img data-dz-thumbnail /></div></div></div>',
  //clickable: this,
  headers: { 'activityid': headerThis },
  clickable: '#previews-container',
  maxFiles: 3,
  autoProcessQueue: true,
  accept: function(file, done) {
    console.log(file);

    console.log($(this).html());

    var block_preview = this.options.previewTemplate;
      }

});

$('.plan-holder').on('click', function(e) {

  //.attr('id', 'my-awesome-specific-dropzone');
  //Dropzone.options.this = {
    // make it so the preview element goes into the targeted dropzone
    // }
    // or programmtically
    // $('mydiv').dropzone({
      // url: blah lah
      //previewTemplate = specifically in this one now
      //}
   // })

  console.log(this);

  console.log(" i was clicked");

  console.log(this.element);

})

});

var headerThis = 1234;

/*Dropzone.options.myAwesomeDropzone = {
  url: 'upload.php',
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  previewsContainer: '#previews-container',
  previewTemplate: '<div id="preview-template" style="display: none;">'
    + '<div class="dz-preview dz-file-preview"><div class="dz-details">'
    + '<div class="dz-filename"><span data-dz-name></span></div><div class="dz-size" data-dz-size>'
    + '</div><img data-dz-thumbnail /></div></div></div>',
  clickable: '#previews-container',
  headers: { 'activityid': headerThis },
  maxFiles: 3,
  autoProcessQueue: true,
  accept: function(file, done) {
    console.log(file);

    console.log(this);

    var block_preview = this.options.previewTemplate;
      }
      //console.log(thisImage);
  }; */



</script>
</html>