<html>
<head>
<title>Week View</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="./cal.js"></script>
<script src="./dropzone.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.4.0/fullcalendar.min.js"></script>

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
               <a href="./agenda.html"><button type="button" class="btn btn-lg btn-primary">Agenda View</button></a>
              <a href="./makeplan2.html" class="btn btn-lg btn-primary">New Plan</a>
            </div>

        </div>
    </nav>

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
              <button id="upload-form">Upload</button>
              <div class="fallback">
                <input name="file" type="file" multiple />
              </div>

              <div id="previews-container" class="dropzone-previews"></div>

              
        </form>
        <div id="video-container"></div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

$(function () {

/*Dropzone.options.popAwesomeDropzone = {
  url: 'upload.php',
  paramName: "file", // The name that will be used to transfer the file
  parallelUploads: 10,
  maxFilesize: 2, // MB
  autoProcessQueue: true,
  init: function() {
    var popAwesomeDropzone = this;
    console.log(popAwesomeDropzone);
    document.getElementById('upload-form').onclick = function(event) {
    event.preventDefault();
    popAwesomeDropzone.processQueue();
    console.log("im being pressed");
  };
  },
   accept: function(file, done) {
    console.log(file.name);
    if (file.name == "justinbieber.jpg") {
      console.log("test jb.jpg");
    }
    else { 
      console.log(file);
    }
  }
}; */

var called = 0;

var vidRegEx = /video/;

var gifRegEx = /image\/gif/;

var imgRegEx = /image\/(?!gif)/; // any string with '/image/' not followed by 'gif'

Dropzone.autoDiscover = false;

var num = 0;

$("#pop-awesome-dropzone").dropzone({
  clickable: '#previews-container',
  previewsContainer: '#previews-container',
  previewTemplate: '<div id="preview-template" class="preview-class">'
    + '<div class="dz-preview dz-file-preview"><div class="dz-details">'
    + '<div class="dz-filename"><span data-dz-name></span></div>'
    + '<img data-dz-thumbnail /></div>'
    + '</div></div>',
  init: function() {

    var dropper = this;

    $('#upload-form').on('click tap', function(e) {
      e.preventDefault();
      console.log(dropper);
      dropper.processQueue();
    });

    this.on('removedfile', function(file) {
      num--;
    });

    this.on('addedfile', function(file) {

      fileType = file.type;

          var reader = new FileReader();

            reader.onload = function(e) {

              if (vidRegEx.test(fileType)) {

              console.log('vid reg ex test passed');

              $('#previews-container').append('<div id="video-template"><video width="116" height="96" controls>'
              + '<source src="' + e.target.result + '" type="' + fileType + '">is this working?</video>'
              + '<a class="remove-shim" style="cursor: pointer; cursor: hand">Remove File</a></div>');

              console.log("i added a video i hope");

              var template1 = $('.preview-class:eq(' + num + ')');

              console.log(template1);
              console.log(' and number ' + num);

              //remove the empty preview class
              template1.remove();

              console.log('after num dec the num is: ' + num);

                  $('video').on('click tap', function(e) {
                    e.stopPropagation();

                  });


                  $('.remove-shim').on('click tap', function(e) {
                  e.preventDefault();
                  e.stopPropagation();

                  $(this).parent().remove();

                  console.log(file);

                  dropper.removeFile(file);

                });

            }

            else if (imgRegEx.test(fileType)) {
              console.log('its a non-gif image');
              num++;
            }

            else {
              console.log('move to hthumbnail now its prob a gif');
            }

          }

           reader.readAsDataURL(file);

          console.log("num is " + num + " in addedfile webm function last line");

          });

    this.on('thumbnail', function(file) {

        console.log("this is a " + fileType + " video but IN THE THUMBNAIL FUNCTION");

          var reader = new FileReader();

            reader.onload = function(e) {

              var fileSource = e.target.result;

             if (gifRegEx.test(fileType)) {

              console.log('gif test passed');

              var template = $('.preview-class:eq(' + num + ')');

              console.log(template);
              console.log(' and num is' + num + 'in gif test func');

              template.find('img').attr('src', e.target.result);

                num++;

            }


            console.log('num is incremented now to: ' + num + ' after tests in reader loader');

          }

            reader.readAsDataURL(file);

            console.log("num is " + num + "in thumbnail function last line of it lastlastlast");


        });

    this.on('complete', function(file) {
        console.log(file);
      dropper.removeFile(file);

      //if ()
    });

    this.on('#upload-form', 'click tap', function(e) {
      e.preventDefault();
      this.processQueue();
    });

  },
  url: 'upload.php',
  parallelUploads: 5,
  maxFiles: 5,
  maxFilesize: 2, //MB
  addRemoveLinks: true,
  paramName: "file",
  headers: {'fileActivity': 'avariableofsomesort'},
  acceptedFiles: "audio/*,video/*,image/*,.pdf,application/*,.avi,.wmv,.webm,.mp3", 
  autoProcessQueue: false,
  thumbnailWidth: 100,
  thumbnailHeight: 100,
  resize: function(file) {

    var resizeInfo = {
      srcX: 0,
      srcY: 0,
      trgX: 0,
      trgY: 0,
      srcWidth: file.width,
      srcHeight: file.height,
      trgWidth: this.options.thumbnailWidth,
      trgHeight: this.options.thumbnailHeight
    };

    return resizeInfo;

  },
  accept: function(file, done) {

    //using 'this' doesnt return the dropzone object
/*
    var fileType = file.type;

    console.log("this is a " + fileType + " video but IN THE ACCEPT FUNCTION");

    var reader = new FileReader();

         reader.onload = function(e) {

          var fileSource = e.target.result;

            if (vidRegEx.test(fileType)) {

              console.log('vid reg ex test passed');

              $('#previews-container').append('<div id="video-template"><video width="96" height="96" controls>'
              + '<source src="' + fileSource + '" type="' + fileType + '">is this working?</video>'
              + '<a id="remove-shim" style="cursor: pointer; cursor: hand">Remove File</a></div>');

              console.log("i added a video i hope");

              var template1 = $('.preview-class:eq(' + num + ')');

              console.log(template1);
              console.log(' and number ' + num);

              template1.remove();

              num--;

              console.log('after num dec the num is: ' + num);

              $('video').on('click tap', function(e) {
                e.stopPropagation();

              });


                  $('#remove-shim').on('click tap', function(e) {
                  e.preventDefault();
                  e.stopPropagation();

                  $(this).parent().remove();

                });

            }
            
            else {
              console.log('not a gif or a vid');
            }

            num++;
            console.log('num is incremented now to: ' + num + ' after tests in reader loader');

          }

            reader.readAsDataURL(file);

            done();

            console.log("num is " + num + "after done function called at bottom"); */

            console.log("before done");

            done();

            console.log("after done");
  }

});

});

</script>
</body>
</html>