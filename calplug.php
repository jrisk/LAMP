<html>
<head>
<title>Week View</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./cal.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>
<script src="https://raw.githubusercontent.com/enyo/dropzone/master/dist/dropzone.js"></script>

<link href="http://fonts.googleapis.com/css?family=Montserrat+Alternates:700&subset=latin,latin-ext" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.css">
<link rel="stylesheet" media="print" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.print.css">
<link rel="stylesheet" href="./lessonplanner.css">
</head>

<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Skoolia" src="">
                </a>
            </div>
               <a href="./editplan2.php"><button type="button" class="btn btn-lg btn-primary">Edit Plans</button></a>
            </div>

        </div>
    </nav>

<?php

var_dump($_FILES['file']);

?>
<div id="test-div"></div>


<body>

<div id="fullcal"></div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Plan Title</h4>
      </div>
      <div class="modal-body" id="activity-plan-insert">
        
        <!-- insert activity of specific plan and media upload option -->
  </div>
      <div class="modal-footer">
              <form class="dropzone" id="pop-awesome-dropzone">
              <div class="fallback">
                <input name="file" type="file" multiple />
              </div>
              <button id="upload-form">Upload</button>
              </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

Dropzone.options.popAwesomeDropzone = {
  url: 'prac.php',
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  previewTemplate: 
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { 
      done(); 
    }
  }

}

</script>
</body>
</html>