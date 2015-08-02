$(function () {

//$('#datetimepicker1').datetimepicker();

$('#submitter').submit(function() {
	alert("form id has been called via jquery onsubmit .submit function");
	var date = $('#ledate').val();
	var date2 = $('#ledate').html();
	alert(date2);
	event.preventDefault();
	return true;
});

$('#datetimepickerplan').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true
});

$('#starttime').datetimepicker({
	format: 'HH:mm A',
    allowInputToggle: true
});

$('#endtime').datetimepicker({
	format: 'HH:mm A',
	allowInputToggle: true
});

//$('#durationtime').val() = theDuration.durstart;

//get duration between start and end time

var activityDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	dur1 = moment(durstart, 'HH:mm A');
	dur2 = moment(durend, 'HH:mm A');

	durfrom = dur2.from(dur1, true);

	$('#durationmodal').html(durfrom);

	return durfrom;
};

//

var inputDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	var dur1 = moment(durstart, 'HH:mm:ss');
	var dur2 = moment(durend, 'HH:mm:ss');

	var dur3 = dur1.subtract(dur2);

	var dur3sub = dur3.subtract(60, 'seconds', true);

	var dur4 = moment('23:59:00', 'HH:mm:ss');

	var during = dur4.subtract(dur3sub);

	var during2 = moment.duration(during).asSeconds();

	return during2;
};

//save button on first activity modal, starts ajax

 $("#savedurate").click(function(e) {

 	$('#durationtime').val(inputDuration());

 	var durstartview = $('#start').val();
 	$('#startview').html(durstartview);
 	//$('#firstact').hide();
 	$('#secondact').show();

 	var textareafix = $('#comment-note').val();
 	$('#commentnote').val(textareafix);
 	var formdata = $('#planform input').serialize();

 	//$("#planform").submit();
	$.ajax({
		type: 'POST',
		url: 'formaction.php',
		data: formdata,
		dataType: 'html',
		success: function (data) {
		$('#successdiv').html(data);
		// call another ajax request to GET php file to update activities row
		$.ajax({
			type: 'GET',
			url: 'actrow.php',
			cache: false,
			dataType: 'html',
			success: function(datas) {
				$('#actphp').html(datas);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrow);
			}
		}); // end 2nd ajax requrest
		}, //end original upon success function
		error: function(jqXHR, textStatus, errorThrown) { // could cause double entries
			$('#err1').html(errorThrown);
		}
	});
	
	e.preventDefault();
});


//get time/duration between now and the start of an activity
var fromNow = function() {
	var now = moment();
};

setInterval(activityDuration, 2000);

$('#buttest').click(function() {
	var duration1 = $('#start').val();
	alert(duration1);
});

//$('#durationtime').html(moment.duration(duration1));

$('#save').click(function(event) {
	var start = $('#start').val();
	var end = $('#end').val();
	var duration = start - end;
	alert("form has been submitted via jquery .submit function");
	event.preventDefault();
	return true;

});

var dateobject = $('#dateplan').val();

// currentplan.php code dropdown stuff

$('.planlist').click(function(event) {
	var plantitle = $(this).html();
	$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(datam) {
				$('#planentry').html(datam);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrow);
			}
		});
}) 




/***sorting function for a time array with : ********
sortTimes: function (array) {
    return array.sort(function (a, b) {
        if (parseInt(a.split(":")[0]) - parseInt(b.split(":")[0]) === 0) {
            return parseInt(a.split(":")[1]) - parseInt(b.split(":")[1]);
        } else {
            return parseInt(a.split(":")[0]) - parseInt(b.split(":")[0]);
        }
    })
} */

});