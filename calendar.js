$(function () {

$('#mycal').fullCalendar({
	header: {
    left:   'title',
    center: '',
    right:  'today prev,next'
	},

	buttonIcons: {
    prev: 'left-single-arrow',
    next: 'right-single-arrow',
    prevYear: 'left-double-arrow',
    nextYear: 'right-double-arrow'
	}
});

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
$('.calendar-table').scrollTop(310); //set initial position of scrolling table to 6am-ish

$('#plan-namehold').append('<h2>All Plans</h2>');

$('#today').hide();

$('#day-times').hide();

$('#mycal').hide();

$('#today-button').on('click tap', function(e) {

	var theDate = moment();

	var today = moment(theDate).format('dddd, MMMM Do');

	$('#today').html("<h2>" + today + "</h2><hr>");

	$('#today').show();

	$('#day-table').hide();

	$('#plan-namehold').hide();

	$('#time-table').hide();

	$('#day-times').show();

	$('#mycal').hide(); // month calendar

});

$('#week-button').on('click tap', function(e) {

	$('#plan-namehold').show()

	$('#day-table').show();

	$('#time-table').show();

	$('#today').hide();

	$('#day-times').hide();

	$('#mycal').hide();

	$('.calendar-table').scrollTop(310);

});

$('#month-button').on('click tap', function(e) {

	$('#day-table').hide();

	$('#time-table').hide();

	$('#day-times').hide();

	$('#mycal').show();

	$('#planinfosimple').hide();

});

//Color in the Weekday corresponding to Today

var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

for (i = 0; i <= weekDays.length - 1; i++) {
						if (weekDays[i] == moment().format('dddd')) {
							$('#' + weekDays[i] + '-head').css({color: "white", background: "blue"});
							}
						};

//original single dayplan function is the filter for only 1 plan to be viewed ****

function specificAct() {

	/****** if activity is today add an if for TODAY activities only ****/

	var weekDaysShort = { 'Monday': 'Mon', 'Tuesday': 'Tues', 'Wednesday': 'Weds'
	, 'Thursday': 'Thurs', 'Friday': 'Fri', 'Saturday': 'Sat', 'Sunday': 'Sun'};
	
	var rawDate = $('#enterday').html();

	var Dtime = moment(rawDate, 'YYYY-MM-DD');

	var Day = moment(Dtime).format('dddd');

	for (i = 0; i < weekDays.length; i++) {

	if (Day == weekDays[i]) {

		for (j = 0; j < $('.starter').length; j++) {

		console.log($('.starter').length);

		var firstStart = $('#enterstart' + j).html();

		console.log(firstStart);

		var firstStartShort = firstStart.slice(0,2); // work for specific hours, not minutes

		var specAct = $('#enterstart' + j).siblings('#enteractivity').text();

		var specEnd = $('#enterstart' + j).siblings('#enterend' + j).html(); //test
			
		var currentActID = $('#today-' + firstStartShort);

		var currentActLEFT = $('#' + Day + '-' + 'head');

		var theDate2 = moment();

			if (Day == moment(theDate2).format('dddd')) {
				currentActID.html('<div class="well">' + specAct + '</div>').css("color", "green");
			}

		}
	}

	$('#plan-namehold').html('<h2>' + $('#enterplan').html() + '</h2>');

	}

};

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

// load all of the plans on pageload and call DayPlan to get the overlay divs
$.get('metaplan.php', function(data) {

	$('#planinfo').html(data);
	$('#planinfo').hide();
	dayPlan();
});

// for specific entry point in week calendar

function dayPlan() {

	var weekDaysShort = { 'Monday': 'Mon', 'Tuesday': 'Tues', 'Wednesday': 'Weds'
	, 'Thursday': 'Thurs', 'Friday': 'Fri', 'Saturday': 'Sat', 'Sunday': 'Sun'};

	for (p = 0; ($('.enterplan' + p).length); p++) { // multiple plans iterator
	
	var rawDate = $('.classday' + p).html();

	var Dtime = moment(rawDate, 'YYYY-MM-DD');

	var Day = moment(Dtime).format('dddd');

	for (i = 0; i < weekDays.length; i++) {

	var k = 0;	 //for multiple lesson plans on same day else if below

	if (Day == weekDays[i]) {

		if ($('#overlay-div' + p + i).length && $('.enterplan' + p).length) {
			console.log($('.enterplan' + p).length);
		}

		else if ($('#overlay-div' + p + i).length && !($('.enterplan' + p).length)) { // 2 plans 1 day, this could be trouble

		$('.inner-help-div').append('<button class="btn btn-info"><div class="overlay" id="overlay-div' + p + i + k + '"></div></button>');
		k++;

		}

		else {

		$('.inner-help-div').append('<button class="btn btn-info overlay" id="overlay-div' + p + i + '"></div></button>')

		}

		for (j = 0; j <= $('.enterplan' + p).length - 1 && ($('.enterplan' + p).length); j++) { // have to iterate the first specific activity, attached as 0, in the array from php file

		var firstStart = $('#enterstart' + p + '-' + j).html();

		var firstStartShort = firstStart.slice(0,2);

		var specAct = $('#enterstart' + p + '-' + j).siblings('#enteractivity' + p + '-' + j).text();

		var specEnd = $('#enterstart' + p + '-' + j).siblings('#enterend' + p + '-' + j).html(); //test
			
		var currentActID = $('#' + weekDaysShort[Day] + '-' + firstStartShort);

		var todayActID = $('#today-' + firstStartShort);

		var theDate2 = moment();

			if (Day == moment(theDate2).format('dddd')) { // Add events for current day on the Today view
				todayActID.html('<div class="well">' + specAct + '</div>').css("color", "green");
				}

		var currentActHEAD = $('#' + Day + '-' + 'head');

		//currentActID.append(specAct).css("color", "green"); throws off the overlay div

			if (j == 0) {
			var curPosTop = currentActID.position().top;
			var curPosLeft = currentActID.position().left;
			var curPosWidth = 17 + currentActID.width();
			var curPosRight = currentActID.right;
			}

		}

	var specEndTime = specEnd.slice(0,2); //only gets the first 2 digits, or the hour, not minutes

	var specEndTimeID = $('#' + weekDaysShort[Day] + '-' + specEndTime);

	var curPosBottom = specEndTimeID.position().top;

	var totalHeight = (curPosBottom - curPosTop) + "px";

	}


	$('#overlay-div' + p + i).css({
		position: 'absolute',
		top: curPosTop,
		left: curPosLeft,
		right: curPosRight,
		width: curPosWidth,
		height: totalHeight,
		background: "#66CCFF",
		overflow: "hidden"

		//z-index: 1000
	}); 
	$('#overlay-div' + p + i).html("<h3 style='text-align: center'><div class='label label-primary'>" +
	"<div class='glyphicon glyphicon-paperclip'></div>" + $('.enterplan' + p).html() + '</div></h3><br>' +
	"<h4 style='text-align: center'><div class='label label-warning'><div class='glyphicon glyphicon-education'>" +
	"</div>" + $('.classclass' + p).html() + '</div></h4>');

	}

	} // multiple plans iterator

};

//scroll and the divs scroll with it, assume the overlay divs exist on page load
var overArr = [];
var divArr = [];

$('.calendar-table').on('scroll', function(e) {

	for (p = 0, v = 0; p <= $('.enterplan' + v); p++, v++) {

	for (i = 0; i <= weekDays.length - 1; i++) {

	if ($('#overlay-div' + p + i).length) {

		console.log("the over lay div" + i + "exists and has a length");
		console.log("the divs top position is: " + $('#overlay-div' + i).position().top);
		
		var tempDiver = $('#overlay-div' +  p + i).offset().top;
		var anObject = $('#overlay-div' + p + i);

		}
	else {
		console.log("that overlay div" + p + i + " doesnt exist");
		}
	}

	var LastScrollTop = 0;

	var scrollTop = $(this).scrollTop();

	var scrollLeft = 0 - $(this).scrollLeft();

	console.log(scrollTop);

	if (scrollTop <= LastScrollTop) {
			anObject.addClass('fixed');
			anObject.offset({'top' : tempDiver - scrollTop});
		
	}

	else {
		anObject.removeClass('fixed');
		}
	
}

});

$('planlistload').load('planlist.php');

$('#dropdownplans').delegate('.planlist', 'click', function(event) {
	var aplan = $(this).html();

	$.ajax({
		type: 'POST',
		url: 'metaview.php',
		data: {specplan: aplan},
		success: function(data) {

			$('#planinfosimple').html(data);

			specificAct();

			$('#planinfosimple').hide();

		},

		error: function(jqXHR, textStatus, errorThrown) {
		alert(errorThrown);
		}
	});

});

// add a time bar with current time

var nowTime = moment();
var minutesTime = moment(nowTime).format('HH:mm');
var hours = minutesTime.slice(0,2);
var minutes = minutesTime.slice(3,5);
var minutesParse = parseInt(minutes);
$('.inner-help-div').append('<div id="current-line"></div>');
hoursID = $('#Mon-' + hours);
var hoursPosTop = hoursID.position().top;
var hoursPosLeft = hoursID.position().left;
var hoursPosWidth = $('.inner-help-div').width();
var hoursPosTopPix = hoursPosTop + minutesParse;
$('#current-line').css({
	top: hoursPosTopPix,
	left: hoursPosLeft,
	width: hoursPosWidth,
	position: 'absolute',
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