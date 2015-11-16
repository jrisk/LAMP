$(function () {

var called = 0;

var vidRegEx = /video/;

var gifRegEx = /image\/gif/;

var imgRegEx = /image\/(?!gif)/; // any string with '/image/' not followed by 'gif'

Dropzone.autoDiscover = false;

console.log("is this working?");

var num = 0;

$("div#new-dropzone").dropzone({
  url: 'upload.php',
  clickable: '#drop-container',
  previewsContainer: '#drop-container',
  previewTemplate: '<div id="drop-template" class="preview-class">'
    + '<div class="dz-preview dz-file-preview"><div class="dz-details">'
    + '<div class="dz-filename"></div>'
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

              $('#drop-container').append('<div id="video-template1"><video width="116" height="96" controls>'
              + '<source src="' + e.target.result + '" type="' + fileType + '">is this working?</video>'
              + '<a class="remove-shim" style="cursor: pointer; cursor: hand">Remove File</a></div>');

              var template1 = $('.preview-class:eq(' + num + ')');

              //remove the empty preview class
              template1.remove();

                  $('video').on('click tap', function(e) {
                    e.stopPropagation();
                  });


                  $('.remove-shim').on('click tap', function(e) {
                  e.preventDefault();
                  e.stopPropagation();

                  $(this).parent().remove();

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

          } //end of reader.onload function

           reader.readAsDataURL(file);

          }); // end of this.on('addedfile')

    this.on('thumbnail', function(file) {

        console.log("this is a " + fileType + " video but IN THE THUMBNAIL FUNCTION");

          var reader = new FileReader();

            reader.onload = function(e) {

              var fileSource = e.target.result;

             if (gifRegEx.test(fileType)) {

              console.log('gif test passed');

              var template = $('.preview-class:eq(' + num + ')');

              template.find('img').attr('src', e.target.result);

                num++;

            }

          }
            reader.readAsDataURL(file);
        });

    this.on('complete', function(file) {
        console.log(file);
      dropper.removeFile(file);
    });

    this.on('#add-act', 'click tap', function(e) {
      e.preventDefault();
      this.processQueue();
    });

  },
  parallelUploads: 3,
  maxFiles: 3,
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

      console.log("before done");

      done();

      console.log("after done");
  }

});

});