$(function () {

function datetimefunc() {
$('#datetimepickerplan2').datetimepicker({
	format: 'dddd, MMMM Do',
	allowInputToggle: true
});

$('#starttime2').datetimepicker({
	format: 'HH:mm A',
    allowInputToggle: true
});

$('#endtime2').datetimepicker({
	format: 'HH:mm A',
	allowInputToggle: true
});

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
	allowInputToggle: true
});

// TURN THE START TIME INTO READABLE AM/PM IN VIEW MODE

$('#tester').on('click tap', function(e) {
var startproto = moment($('#enterstart'));

alert(startproto);

});

//get date picker format into database DATE format

var dayDuration = function() {
	var dayinput = $('#dateplan').val();

	var daybase = moment(dayinput, 'dddd, MMMM Do');

	var daybaseval = moment(daybase).format('YYYY-MM-DD');

	return daybaseval;
};

//convert the database minutes into readable format for placeholding date picker

var convertBackDay = function() {
	var dayfromdb = $('#datefix').val();

	var daybaseread = moment(dayfromdb);

	var dayinputhuman = moment(daybaseread).format('dddd, MMMM Do');

	return dayinputhuman;
};

//get duration between start and end time for duration read field

var activityDuration = function() {
	var durstart = $('#start').val();

	var durend = $('#end').val();

	dur1 = moment(durstart, 'HH:mm A');
	dur2 = moment(durend, 'HH:mm A');

	durfrom = dur2.from(dur1, true); // returns actual time in human form, default rounding

	$('#durationmodal').html(durfrom);

	return durfrom;
};

$('#testday').click(function(e) {
	dayDuration();
});

//get start and end time as duration of total seconds to be in database

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

//save button on first activity modal, starts ajax

 $("#savedurate").click(function(e) {

 	$('#durationtime').val(inputDuration());

 	var durstartview = $('#start').val();
 	$('#startview').html(durstartview);
 	//$('#firstact').hide();
 	$('#secondact').show();

 	$('#datefix').val(dayDuration()); /* change date from human readable to database readable */

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


setInterval(activityDuration, 2000); //run continously to update duration field

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

//hide row of activity for inserted plan before its called from the post a few lines below

$('#activated').hide();
$('#addoptions').hide();

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
				$('#sessionplan').html("<h2>" + $('#enterplan').html() + "</h2>");
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#editor').hide();
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
			datetimefunc();
			$('#editor').show();
			$('#dateplan').val(convertBackDay());
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

 	$.ajax({
 		type: 'POST',
 		url: 'editform.php',
 		data: editdata,
 		dataType: 'html',
 		success: function(data) {
 			alert("Plan has been edited");
 			$('#activated').show();
 			$('#editor').hide();
 		},
 		error: function(jqXHR, textStatus, errorThrown) {
 			$('#err1').html(errorThrown);
 		}

 	});

});

$('#addnewact').on('click tap', function(e) {
	$('#addlesson').val($('#enterplan').html());
	$('#addclass').val($('#enterclass').html());
	$('#datefix').val($('#enterday').html());

	$('#durationtime').val(inputDuration());

	var textareafix = $('#comment-note').val();
 	$('#commentnote').val(textareafix);

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
				$('#sessionplan').html("<h2>" + $('#enterplan').html() + "</h2>");
				$('#activated').show();
				$('#planentry').show();
				$('#addoptions').show();
				$('#editor').hide();
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