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

var theDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	dur1 = moment(durstart, 'HH:mm A');
	dur2 = moment(durend, 'HH:mm A');

	durfrom = dur2.from(dur1);

	duration = durfrom.replace(/^in\s/, ' ');

	return $('#duration').html(duration);
};

var inputDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	var dur1 = moment(durstart, 'HH:mm A');
	var dur2 = moment(durend, 'HH:mm A');

	var dur3 = dur1.subtract(dur2);

	var dur4 = moment('04/09/2013 23:59:59', 'HH:mm A')

	durate = dur4.subtract(dur3);

	//durdur = durate.replace(':', '');

	alert(durate);
};

$('#testyclick').click(function() {
	inputDuration();
});


//get time/duration between now and the start of an activity
var fromNow = function() {
	var now = moment();
};

setInterval(theDuration, 2000);

$('#buttest').click(function() {
	var duration1 = $('#start').val();
	alert(duration1);
});

//$('#durationtime').html(moment.duration(duration1));

$('#save').click(function() {
	var start = $('#start').val();
	var end = $('#end').val();
	var duration = start - end;
	alert("form has been submitted via jquery .submit function");
	event.preventDefault();
	return true;

});

var dateobject = $('#dateplan').val();

//getting time objects, getting duration, inserting again into page



// php variables into javascript

/*var momento = moment($.ajax({
	type: 'GET';
	url: 'testmoment.php'
	data:
}) */

// ajax example 

$('#formsubmit').submit( function () {
$.ajax({
type: 'POST',
url: 'formaction.php',
data: 'show=content',
dataType: 'html',
success: function (data) {
var formdata = data;
alert(data);
},
error: function(jqXHR, textStatus, errorThrown) { // could cause double entries
	$('#err1').html(errorThrown);
}
});
event.preventDefault(); // need this to prevent double mysql entries
})

});