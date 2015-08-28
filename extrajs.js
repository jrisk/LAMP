$(function () {

function datetimefunc3() {
$('#datetimepickerplan3').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true,
	stepping: 5
});

$('#starttime3').datetimepicker({
	format: 'HH:mm A',
    allowInputToggle: true,
    useCurrent: false,
    stepping: 5
});

$('#endtime3').datetimepicker({
	format: 'HH:mm A',
	allowInputToggle: true,
	stepping: 5
});

};


function datetimefunc() {
$('#datetimepickerplan2').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true,
	stepping: 5
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

$('#datetimepickerplan').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true
});

$('#starttime').datetimepicker({
	format: 'HH:mm A',
    allowInputToggle: true,
    stepping: 5
});

$('#endtime').datetimepicker({
	format: 'HH:mm A',
	allowInputToggle: true,
	stepping: 5
});

//Color in the Week Day that equals Today's Date

var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

for (i = 0; i <= weekDays.length - 1; i++) {
						if (weekDays[i] == moment().format('dddd')) {
							$('#' + weekDays[i] + '-head').css("color", "blue");
							}
						};

//GET THE PATH NAME FOR CLEAN URL INTEGRATION

function getPageName() {
	var pathName = window.location.pathname;

	pageName = '';

	if (pathName.indexOf("/") != -1) {
		pageName = pathName.split("/").pop();
	}

	else {
		pageName = pathName;
	}

	return pageName;
};

// TURN THE START TIME INTO READABLE AM/PM IN VIEW MODE

var startHuman = function(enterstart) {

	var starting = $(enterstart).html();

	var startproto = moment(starting, 'HH:mm:ss');

	var starthuman = moment(startproto).format('HH:mm A');

	return starthuman;
};

// TURN THE END TIME IN READABLE AM/PM MODE

var endHuman = function(enterend) {

	var ending = $(enterend).html();

	var endproto = moment(ending, 'HH:mm:ss');

	var endhuman = moment(endproto).format('HH:mm A');

	return endhuman;
};

//get date picker format into database DATE format

var dayDuration3 = function() {
	var dayinput = $('#dateplan3').val();

	var daybase = moment(dayinput, 'dddd, MMMM Do');

	var daybaseval = moment(daybase).format('YYYY-MM-DD');

	return daybaseval;
};

var dayDuration = function() {
	var dayinput = $('#dateplan').val();

	var daybase = moment(dayinput, 'dddd, MMMM Do');

	var daybaseval = moment(daybase).format('YYYY-MM-DD');

	return daybaseval;
};

//gets day of the week from Adate column of entry and inserts into page

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

//convert the database minutes into readable format for placeholding date picker

var convertBackDay = function() {
	var dayfromdb = $('#datefix').val();

	var daybaseread = moment(dayfromdb);

	var dayinputhuman = moment(daybaseread).format('dddd, MMMM Do');

	return dayinputhuman;
};

var convertBackDay2 = function() {
	var dayfromdb = $('#enterend').html();

	var daybaseread = moment(dayfromdb);

	var dayinputhuman = moment(daybaseread).format('dddd, MMMM Do');

	return dayinputhuman;
};

//get duration between start and end time for duration read field, viewing only

var activityDuration = function() {
	var durstart = $('#start2').val();

	var durend = $('#end2').val();

	dur1 = moment(durstart, 'HH:mm A');
	dur2 = moment(durend, 'HH:mm A');

	durfrom = dur2.from(dur1, true); // returns actual time in human form, default rounding

	$('#durationmodal').html(durfrom);

	return durfrom;
};

$('#testday').click(function(e) {
	dayDuration();
});

//get start and end time as duration of total seconds to be put in database

var inputDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	var dur1 = moment(durstart, 'HH:mm:ss');
	var dur2 = moment(durend, 'HH:mm:ss');

	var dur3 = dur1.subtract(dur2);

	var dur3sub = dur3.subtract(60, 'seconds', true);

	var dur4 = moment('23:59:00', 'HH:mm:ss');

	var during = dur4.subtract(dur3sub);

	var during2 = moment.duration(during).asSeconds(); // returns total seconds for database

	return during2;
};

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

	return during2;
};

var inputDuration3 = function() {
	var durstart = $('#start3').val();

	var durend = $('#end3').val();

	var dur1 = moment(durstart, 'HH:mm:ss');
	var dur2 = moment(durend, 'HH:mm:ss');

	var dur3 = dur1.subtract(dur2);

	var dur3sub = dur3.subtract(60, 'seconds', true);

	var dur4 = moment('23:59:00', 'HH:mm:ss');

	var during = dur4.subtract(dur3sub);

	var during3 = moment.duration(during).asSeconds(); // returns total seconds for database

	return during3;
};

//save button on first activity modal, starts ajax, DELETED


setInterval(activityDuration, 2000); //run continously to update duration field

//hide row of activity for inserted plan before its called from the post a few lines below

$('#activated').hide();
$('#addoptions').hide();

// currentplan.php code dropdown stuff

$('#planlistload').load('planlist.php');

// CALENDAR STUFF

$('#calendarpage').attr('href', 'week.php');

weekPlan();


$('#dropdownplans').delegate('.planlist', 'click', function(event) {
	var plantitle = $(this).html();
	$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(datam) {
				$('#planentry').html(datam);
				$('#sessionplan').html("<h1><div class='label label-primary'><div class='glyphicon glyphicon-paperclip'></div>" + $('#enterplan').html() + '</div></h2>');
				$('#sessionplan').append("<h1>" +
				"<div class='label label-primary'><span class='glyphicon glyphicon-education'></span>" + $('#enterclass').html() + '</div></h1>');
				$('#sessionplan').append("<h1>" +
				"<div class='label label-primary'><span class='glyphicon glyphicon-calendar'></span>" + $('#enterday').html() + '</div></h1>');
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#editor').hide();
				$('#maker').hide();
				// put this in a function !!!!!!!!!!!!!
				var startlen = $('.starter').length;
				var startarray = [];
				for (i=0; i <= startlen; i++) {
				var startparam = $('#enterstart' + i);
				var startread = startHuman(startparam);
					startparam.html(startread);
					};

				var endlen = $('.ender').length;
				var endarray = [];
	
				for (i=0; i <= endlen; i++) {
				var endparam = $('#enterend' + i);
				var endread = startHuman(endparam);
				endparam.html(endread);
				};


				/*if (Modernizr.history) {
				window.history.pushState(null, "", "totalview.php");
				};*/
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrown);
			}
		});
});

//view and edit specific plan+activity combo call

//had to delegate because planentry div holds loaded php with button editact

$('#planentry').delegate( '#editact', 'click', function(event) {
	var specificID = $(this).parent().siblings('#enterID').text();
	var specificPlan = $(this).parent().siblings('#enterplan').text();
	$.ajax({
		type: 'POST',
		url: 'editor.php',
		data: {idact: specificID, enterplan: specificPlan},
		dataType: 'html',
		success: function(data) {
			$('#editor').html(data);
			$('#activated').hide();
			$('#dateplan').val(convertBackDay());
			datetimefunc();
			$('#editor').show();
			$('#addoptions').hide();
		},
		error: function(jqXHR, textStatus, errorThrow) {
			$('#err1').html(errorThrown);
		}
	});
	//event.preventDefault();
});

$('#editor').delegate( '#updater', 'click', function(e) {
	$('#durationtime2').val(inputDuration());

	//input database readable date into date-planfix from human readable dateplan 
	$('#datefix').val(dayDuration());

	//comment area cant be textarea for post data, has to be input for val to work
	var textareafix = $('#comment-note').val();
 	$('#commentnote').val(textareafix);
 	//serialize into POST data string url-encoding
 	var editdata = $('#editform input').serialize();

 	var plantitle = $('#lessonname').val();

 	$.ajax({
 		type: 'POST',
 		url: 'editform.php',
 		data: editdata,
 		dataType: 'html',
 		success: function(data) {
 			$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(data) {
				$('#planentry').html(data);
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#editor').hide();
				// PUT THIS IN A FUNCTION !!!!!!!!!!!!!!!!!!!!!
				var startlen = $('.starter').length;
				var startarray = [];
	
				for (i=0; i <= startlen; i++) {
				var startparam = $('#enterstart' + i);
				var startread = startHuman(startparam);
				startparam.html(startread);
				};

				var endlen = $('.ender').length;
				var endarray = [];
	
				for (i=0; i <= endlen; i++) {
				var endparam = $('#enterend' + i);
				var endread = startHuman(endparam);
				endparam.html(endread);
				};

				$('#planlistload').load('planlist.php');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrown);
			}
		});
 		},
 		error: function(jqXHR, textStatus, errorThrown) {
 			$('#err1').html(errorThrown);
 		}

 	});

});

$('#addactivity').on('click', function(e) {

	var lastend = $('#enteracts #enterend').last().html();

	var startform = moment(lastend, 'HH:mm:ss');

	var changetime = moment(startform).format('HH:mm A');

	$('#start2').val(changetime);

	$('#end2').val(changetime);

});

$('#addnewact').on('click', function(e) {
	$('#addlesson').val($('#enterplan').html());
	$('#addclass').val($('#enterclass').html());

	$('#datefix').val($('#enterday').html());

	$('#durationtime').val(inputDuration2());

	var textareafix = $('#comment-note2').val();
 	$('#commentnote2').val(textareafix);

 	var plantitle = $('#addlesson').val();

 	var formdata = $('#planform input').serialize();

 	$.ajax({
		type: 'POST',
		url: 'formaction.php',
		data: formdata,
		dataType: 'html',
		success: function (data) {
		// call another ajax request to GET php file to update activities row
		$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(datam) {
				$('#planentry').html(datam);
				$('#sessionplan').html("<h2><span class='glyphicon glyphicon-paperclip'></span>" + $('#enterplan').html() + "</h2>");
				$('#sessionplan').append("<h3>" +
				"<span class='glyphicon glyphicon-education'></span>" + $('#enterclass').html() + "</h3>");
				$('#sessionplan').append("<h3>" +
				"<span class='glyphicon glyphicon-calendar'></span>" + $('#enterday').html() + "</h3>");
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#editor').hide();
				var startlen = $('.starter').length;
				var startarray = [];
				for (i=0; i <= startlen; i++) {
				var startparam = $('#enterstart' + i);
				var startread = startHuman(startparam);
					startparam.html(startread);
					};
				var endlen = $('.ender').length;
				var endarray = [];
	
				for (i=0; i <= endlen; i++) {
				var endparam = $('#enterend' + i);
				var endread = startHuman(endparam);
				endparam.html(endread);
				};

				$('#planform')[0].reset();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrown);
			}
		});
		},

		error: function(jqXHR, textStatus, errorThrown) {
			$('#err1').html(errorThrown);
		}
	});

});

$('#makeplan').on('click', function(e) {
	$('#addoptions').hide();
	$.ajax({
		type: 'GET',
		url: 'makeplan.php',
		dataType: 'html',
		success: function(data) {
			$('#maker').html(data);
			$('#activated').hide();
			$('#editor').hide();
			$('#addoptions').hide();
			$('#sessionplan').html("<h2>" + "Make a New Lesson Plan" + "</h2>");
			datetimefunc3();
			$('#maker').show();
		},
		error: function(jqXHR, textStatus, errorThrow) {
			$('#err1').html(errorThrown);
		}
	});
});

$('#maker').delegate('#updater2', 'click', function(e) {
 	
 	$('#durationtime3').val(inputDuration3());

 	var durstartview = $('#start3').val();
 	$('#startview3').html(durstartview);

 	$('#datefix3').val(dayDuration3());

 	var textareafix = $('#comment-note3').val();
 	$('#commentnote3').val(textareafix);

 	var formdata = $('#makeform input').serialize();

 	var plantitle = $('#lessonname3').val();

 	//$("#planform").submit();
	$.ajax({
		type: 'POST',
		url: 'formaction.php',
		data: formdata,
		dataType: 'html',
		success: function (data) {
		$('#successdiv').html(data);
		//reload the plan list to reflect changes
		//$.load('planlist.php', function(res) {
				// no response, just reloading hopefully
			//}); 
		// call another ajax request to GET php file to update activities row
		$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(datam) {
				$('#planentry').html(datam);
				$('#sessionplan').html("<h2><span class='glyphicon glyphicon-paperclip'></span>" + $('#enterplan').html() + "</h2>");
				$('#sessionplan').append("<h3>" +
				"<span class='glyphicon glyphicon-education'></span>" + $('#enterclass').html() + "</h3>");
				$('#sessionplan').append("<h3>" +
				"<span class='glyphicon glyphicon-calendar'></span>" + $('#enterday').html() + "</h3>");
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#maker').hide();
				var startlen = $('.starter').length;
				var startarray = [];
				for (i=0; i <= startlen; i++) {
				var startparam = $('#enterstart' + i);
				var startread = startHuman(startparam);
					startparam.html(startread);
					};
				var endlen = $('.ender').length;
				var endarray = [];
	
				for (i=0; i <= endlen; i++) {
				var endparam = $('#enterend' + i);
				var endread = startHuman(endparam);
				endparam.html(endread);
				};
				$('#planlistload').load('planlist.php');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrown);
				}
		}); /// end 2nd ajax requrest
		}, //end original upon success function
		error: function(jqXHR, textStatus, errorThrown) {
				$('#err1').html(errorThrown);
	}
});

});

// delete an activity 

$('#planentry').delegate( '#delact', 'click', function(event) {
	var specificID = $(this).parent().siblings('#enterID').text();
	//on update the plantitle is the same as the current activity's plan
	var plantitle = $(this).parent().siblings('#enterplan').text();
	$.ajax({
		type: 'POST',
		url: 'deleteform.php',
		data: {deleteid: specificID},
		dataType: 'html',
		success: function(result) {
			$.ajax({
			type: 'POST',
			url: 'totalview.php',
			data: {planning: plantitle},
			dataType: 'html',
			success: function(newresult) {
				$('#planentry').html(newresult);
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#maker').hide();

			},

			error: function(jqXHR, textStatus, errorThrown) {
			$('#err1').html(errorThrown);
			}
		});

		},

		error: function(jqXHR, textStatus, errorThrown) {
			$('#err1').html(errorThrown);
		}
	});
});




});