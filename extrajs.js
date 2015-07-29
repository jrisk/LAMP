$(function () {

$('#datetimepicker1').datetimepicker();

$('#submitter').submit(function() {
	alert("form id has been called via jquery onsubmit .submit function");
	var date = $('#ledate').val();
	var date2 = $('#ledate').html();
	alert(date2);
	event.preventDefault();
	return true;
});

$('#starttime').datetimepicker({
	format: 'LT'
});

$('#endtime').datetimepicker({
	format: 'LT'
});

$('#save').click(function() {
	var start = $('#start').val();
	var end = $('#end').val();
	var duration = start - end;
	alert("form has been submitted via jquery .submit function");
	event.preventDefault();
	return true;

});

// planner.php date

$('#datetimepickerplan').datetimepicker({
	format: 'dddd, MMMM Do'
});


$('#datetimepickerplan').datetimepicker({
	format: 'dddd, MMMM Do'
});


$('#datetimepickerplan').datetimepicker({
	format: 'dddd, MMMM Do'
});

var dateobject = $('#dateplan').val();



});