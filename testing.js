$(function () {

function weekPlan() {
	

	var dayWrite = function() {

	var rawDate = $('#enterday').html();

	var Dtime = moment(rawDate, 'YYYY-MM-DD');

	var Day = moment(Dtime).format('dddd');

	return Day;

	}
	
	$('#dayinsert').html(dayWrite());


	var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

		for (i = 0; i <= weekDays.length - 1; i++) {
		
			if (dayWrite() == weekDays[i]) {
				$('#' + weekDays[i] + '').html($('#enterplan').html());
				$('#' + weekDays[i] + '').append('<li>' + $('#enterclass').html() + '</ul>');
						
					for (j = 0; j < $('.classactivity').length; j++) {

						$('#' + weekDays[i] + '').append('<li>--' + $('#enterstart' + j).html() + '</li>');
					}
						
						$('#' + weekDays[i] + '').append('</ul>')
				}
			}

};

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
	allowInputToggle: true,
});
//test duration problem, return exact seconds over 12 pm and 12 am

var inputDuration2 = function() {
	var durstart = $('#start2').val();

	var durend = $('#end2').val();

	var dur1 = moment(durstart, 'HH:mm:ss');
	var dur2 = moment(durend, 'HH:mm:ss');

	var dur3 = dur1.subtract(dur2);

	var dur3sub = dur3.subtract(60, 'seconds', true);

	var dur4 = moment('23:59:00', 'HH:mm:ss');

	var during = dur4.subtract(dur3sub);

	var during2 = moment.duration(during).asSeconds(); // returns total seconds for database

	$('#durationmodal').html(during2);
};

setInterval(inputDuration2, 2000);

});