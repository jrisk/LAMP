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

// php variables into javascript

var momento = moment().hour();

// ajax example 

$('#formsubmit').submit( function () {
$.ajax({
type: 'POST',
url: 'formaction.php',
data: 'show=content',
dataType: 'html',
success: function (data) {
$('#outputdata').html(data);
},
error: function(jqXHR, textStatus, errorThrown) { // could cause double entries in database in future
this.retryCount++;
	if (this.retryCount <= this.retryLimit) {
	//try again
	$.ajax(this);
	return;
	};
return;
}
});
event.preventDefault(); // need this to prevent double mysql entries
});

});