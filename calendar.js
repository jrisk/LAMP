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

$('.calendar-table').scrollTop(300); //set initial position of scrolling table to 6am-ish

$('#plan-namehold').append('<h2>All Plans</h2>');

$('#today-button').on('click tap', function(e) {

	var theDate = moment();

	var today = moment(theDate).format('dddd, MMMM Do');

	$('#today').show();

	$('#day-table').hide();

	$('#plan-namehold').hide();

	$('#time-table').hide();

	$('#day-times').show();

	$('#today').html("<h2>" + today + "</h2><hr>");

});

$('#week-button').on('click tap', function(e) {

	$('#plan-namehold').show()

	$('#day-table').show();

	$('#time-table').show();

	$('#today').hide();

	$('#day-times').hide();

	dayPlan();

});

/*$.ajax({
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
	});*/
	
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

		$('.calendar-table').append('<div class="overlay" id="overlay-div' + i + '"></div>')

		for (j = 0; j < $('.starter').length; j++) {

		var firstStart = $('#enterstart' + j).html();

		var firstStartShort = firstStart.slice(0,2);

		var specAct = $('#enterstart' + j).siblings('#enteractivity').text();

		var specEnd = $('#enterstart' + j).siblings('#enterend' + j).html(); //test
			
		var currentActID = $('#' + weekDaysShort[Day] + '-' + firstStartShort);

		currentActID.append(specAct).css("color", "green");

			if (j == 0) {
			var curPosTop = currentActID.position().top;
			var curPosLeft = currentActID.position().left;
			var curPosWidth = currentActID.width();
			}

		}

	var specEndTime = specEnd.slice(0,2); //only gets the first 2 digits, or the hour, not minutes

	alert(specEnd);

	var specEndTimeID = $('#' + weekDaysShort[Day] + '-' + specEndTime);

	var curPosBottom = specEndTimeID.position().top;

	var totalHeight = (curPosBottom - curPosTop) + "px";

	}


	$('#overlay-div' + i).css({
		position: 'absolute',
		top: curPosTop,
		left: curPosLeft,
		width: curPosWidth,
		height: totalHeight,
		background: "#66CCFF", 

		//z-index: 1000
	}); 

	}

	$('#plan-namehold').html('<h2>' + $('#enterplan').html() + '</h2>');

};

//scroll and the divs scroll with it, assume the overlay divs exist on page load
var overArr = [];
var divArr = [];

$('.calendar-table').on('scroll', function(e) {


	for (i = 0; i <= $('.overlay').length; i++) {

	if ($('#overlay-div' + i).length) {

		var tempDiv = $('#overlay-div' + i);

		var tempPos = TempDiv.offset().top;

		overArr[i] = tempPos;
		divArr[i] = tempDiv;
		}
	}

	var LastScrollTop = 0;

	var scrollTop = $(this).scrollTop();

	var scrollLeft = 0 - $(this).scrollLeft();

	console.log(scrollTop);
	console.log(tempPos);

		console.log(tempDiv);

	/*if (scrollTop <= LastScrollTop) {
		for (j = 0; j <= divArr.length; j++) {
			divArr[j].addClass('fixed');
			divArr[j].offset({'top' : overArr[j] - scrollTop});

		}
	}

	else {
		for (i = 0; i <= divArr.length; i++)  {
		divArr[i].removeClass('fixed');
		}
	}*/

});

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

function moveBigBlock() {


var mon03 = $('#today-3am-row').position();

var monTop = mon03.top;

var monLeft = mon03.left;

var monWidth = $('#today-3am-row').css('width');

var monHeight = $('#today-3am-row').css('height');

$('#overlay-div').css({
	position: 'absolute',
	top: monTop,
	left: monLeft
});

};

//setInterval(moveBigBlock, 2000);

})