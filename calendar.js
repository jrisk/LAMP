$(function () {

function datetimefunc() {
$('#datetimepickerplan2').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true
});

$('#starttime2').datetimepicker({
	format: 'HH:mm A',
    allowInputToggle: true,
    stepping: 5
});

$('#endtime2').datetimepicker({
	format: 'HH:mm A',
	allowInputToggle: true,
	stepping: 5
});

};

$('.calendar-table').scrollTop(310);
$('#plan-namehold').append('<h2>All Plans</h2>');
	
//Color in the Week Day that equals Today's Date

var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

for (i = 0; i <= weekDays.length - 1; i++) {
						if (weekDays[i] == moment().format('dddd')) {
							$('#' + weekDays[i] + '-head').css("color", "blue");
							}
						};

function weekPlan() {

	var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
	
	var rawDate = $('#enterday').html();

	var Dtime = moment(rawDate, 'YYYY-MM-DD');

	var Day = moment(Dtime).format('dddd');

		for (i = 0; i <= weekDays.length - 1; i++) {
		
			if (Day == weekDays[i]) {
				$('#' + weekDays[i] + '').html($('#enterplan').html());
				$('#' + weekDays[i] + '').append('<li>' + $('#enterclass').html() + '</ul>');
						
					for (j = 0; j < $('.classactivity').length; j++) {

						$('#' + weekDays[i] + '').append('<li>--' + $('#enterstart' + j).html() + '</li>');
					}
						
						$('#' + weekDays[i] + '').append('</ul>')
				}
			}

};

// for specific entry point in week calendar

function dayPlan() {

	var weekDaysShort = { 'Monday': 'Mon', 'Tuesday': 'Tues', 'Wednesday': 'Weds'
	, 'Thursday': 'Thurs', 'Friday': 'Fri', 'Saturday': 'Sat', 'Sunday': 'Sun'};
	
	var rawDate = $('#enterday').html();

	var Dtime = moment(rawDate, 'YYYY-MM-DD');

	var Day = moment(Dtime).format('dddd');

	for (i = 0; i < weekDays.length; i++) {

	if (Day == weekDays[i]) {

		for (j = 0; j < $('.starter').length; j++) {

		var firstStart = $('#enterstart' + j).html();

		var firstStartShort = firstStart.slice(0,2);

		var specAct = $('#enterstart' + j).siblings('#enteractivity').text();
			
			$('#' + weekDaysShort[Day] + '-' + firstStartShort).append(specAct).css("color", "green");
		}
		
	}

}

$('#plan-namehold').html('<h2>' + $('#enterplan').html() + '</h2>');

};

$('planlistload').load('planlist.php');

$('#dropdownplans').delegate('.planlist', 'click', function(event) {
	var aplan = $(this).html();

	$.ajax({
		type: 'POST',
		url: 'metaview.php',
		data: {specplan: aplan},
		success: function(data) {

			$('#planinfo').html(data);

			dayPlan();

		},

		error: function(jqXHR, textStatus, errorThrown) {
		alert(errorThrown);
		}
	});

});







})