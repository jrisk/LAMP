//css inline style for simple stuff
//css for animations, not jquery
//jquery can be a load-hog when looping through the dom
//append to the ID itself with vanilla js instead of to the jquery object of the element


$(function () {

$('#calpress').on('click tap', function(e) {

	window.location.href = 'calplug.php';
});

$('#addpress').on('click tap', function(e) {

	window.location.href = 'makeplan2.html';
});

$('body').on('resize', function(e) {

	$('body').css('padding-top',  $('.navbar').height());

	console.log($('.navbar').height());

});

$('body').css('padding-top',  $('.navbar').height());


function getData() {

	$.ajax({
		type: 'GET',
		url: 'datesort.php',
		success: function(data) {

			//need to reset divs so activities arnt repeated after calling getData again
			document.getElementById('json-today').innerHTML = '<p id="today-look">Today</p>';
			document.getElementById('json-future').innerHTML = '';
			document.getElementById('json-repeat').innerHTML = '';

			/** ';;;' as an activity completely screwed this page, DO REGEX AND VALIDATION!!!! */

			var JSONParse = JSON.parse(data);

			var weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

			console.log(JSONParse);

			var currentTime = moment().format(); // or new Date();

			var tempArray = []; //to test for plans that have been called but are in other parts of the obj

			var posArray = []; // another test array for positive values of nearest activity

			var tempObj = {};

			$('#today-look').html(moment(currentTime).format('dddd, MMMM Do')).addClass('day-specify');

			var todayPlan = 0;

			$.each(JSONParse, function(ind, obj) {

				// time function for deciding which div fits the current time, or closest to it

				/*if (tempStart < currentTime < tempEnd) {
					var currentAct = obj[i].id;
				}*/

				//further seperate days into subplan-> activity combos

				//have to refactor this. if a plan is somewhere else it resets as a new appendActs function
				//test to see if plan has already been used, then append it to the correct plan div

				for (i = 0; i < obj.length; i++) {

					//time get function to compare current time to each time value given in loop
					//compare currenttime to start time

					var tempStart = moment(obj[i].start).format('HH:mm:ss');

					var tempDay =  moment(obj[i].date).format('YYYY-MM-DD');

					var tempUTCstart = tempDay + 'T' + tempStart;

					var UTCstart = moment(tempUTCstart).format();

					var tempEnd = moment(obj[i].end).format('HH:mm:ss');

					var tempUTCend = tempDay + 'T' + tempEnd;

					var UTCend = moment(tempUTCend).format();

					var timerVar = moment.duration((moment(UTCend)).diff(moment((currentTime)))).humanize();

					var timerVarCheck = moment((moment(UTCstart)).diff(moment((currentTime))), 'milliseconds');

					var timerDiff = moment(timerVarCheck).format('milliseconds');

					tempArray.push(timerVarCheck._i);

					tempObj[obj[i].title] = timerVarCheck._i;

					//make current plan equal to var newtemp
					// instead of organizing by plan, organize by date
					var newtemp = obj[i].date;

					var titleParse = newtemp.replace(/\s/g, '-');

					//fix the problem of plans being reset as new if they are found in array twice
					var stringpls = 'planning' + newtemp.replace(/\s/g, '_');

					//use length of plan stringpls id check to see if plan already exists before
					//going to else and creating a whole new plan div
					if (newtemp == oldtemp || $(document.getElementById(stringpls)).length) { // if current plan equals the last plan

						$(document.getElementById(stringpls)).append('<div class="row agenda-act-row well" id="'
						+ obj[i].id + '" aria-haspopup="true" aria-expanded="false">'
						+ '<div class="small-type col-xs-10 col-sm-10" id="' + UTCend + '">'
						+ moment(obj[i].start).format('h:mm a') + ' to '
						+ moment(obj[i].end).format('h:mm a') + '</div>'
						//div holder for the checkbox to manually complete and go to next event
						+ '<input type="checkbox" class="checkbox_complete">'
						//div holder for timer next to scheduled time
						+ '<div class="smaller-type timer col-xs-12 col-sm-12"></div>'
						+ '<div id="specificplan-'
						+ titleParse + '" class="specplanners col-xs-12 col-sm-12">'
						+ obj[i].title + '</div>');

					//copy this to the starting activity of the other plans
					// or better yet, refactor so there arn't seperate loops for the first act of a plan

					if (UTCstart < currentTime && currentTime < UTCend && flagCurrent != 1) {
							console.log('current plan html if true here : ' + flagCurrent);
							console.log(obj[i].id);
							console.log($('#' + obj[i].id));
						$('#' + obj[i].id).parent().addClass('currentPlan');
						$('#' + obj[i].id).addClass('currentAct');
						//$('.plan-big').children().toggle('slow');
						console.log($('.currentAct'));
						console.log($('.currentAct').offset());
						$('body').animate({ scrollTop: $('.currentAct').offset().top - $('.navbar').height() }, 1000);
						$('.plan-big').not($('.currentPlan')).children().hide();
						$('.currentAct').css('background-color', '#C6E2FF');
						$('.currentAct').children('.timer').html(timerVar + ' left');

						setInterval(function() {
								var endTimeAct = $('.currentAct').children('.smaller-type').prop('id');

							if (currentTime < endTimeAct) {
								console.log('still on this activity');

								//code for timer
								//getData();
							}
							else {
								console.log('switch to next activity or nearest plan');
								//getData();

							}

							}, 60000);

						//didnt want to flag, but its to test for another current activity
						//will make impossible to do in validation
						var flagCurrent = 1;

					} // end of if check

					} //end of initial if statement for checking activity-plan pairs

					else { // if no match, it must be a new plan since its given in order
						//except its not given in plan order, only in time order

						//make sure any activity goes under the correct sub-div

						for (k = 0; k <= weekDays.length - 1; k++) {

							var planDate = ind;

							console.log('else entered: ' + ind);

							var Day = moment(planDate).format('dddd');

							var Today = moment().format('dddd');

							var fullToday = moment().format('YYYY-MM-DD');

						}

						console.log('outside for loop scope lets see' + planDate);

						//end the last plan row now that its a new plan

						$(document.getElementById(stringpls)).append('</div>');

						// make new variables based on new plan and titles

						console.log(newtemp);

						var stringpls = 'planning' + newtemp.replace(/\s/g, '_');

						console.log('second stringpls check' + stringpls);

						var titleParse = 'title: ' + obj[i].title.replace(/\s/g, '-');

						//If Today's Date is the same as one of the plans, put it in the first div 'json-today'
						//test for which div to put each new plan

						var thisDate = obj[i].date;

						if (planDate == fullToday) {
							var elem = "#json-today";
							todayPlan = 1;
						}
						else if (planDate > fullToday) {

							var elem = "#json-future";

							//why does this post the date once and not duplicate it ?
							//because of dupe IDs breaking the code, test for it first
							if ($(document.getElementById(thisDate)).length) 
							{
								console.log('do something here or nah?');
							}
							else 
							{
								$(elem).append('<p class="day-specify" id="' + thisDate + '">');

								$(document.getElementById(thisDate)).html(
								moment(obj[i].date).format('dddd, MMMM Do'));
							}

						}
						else {
							var elem = "#json-past";
							console.log('past...or repeat to the future?');
						}


						if ($(document.getElementById(thisDate)).length) {

								console.log('outer, general check for thisDate plans');

							}

					$(elem).append('<div class="container-fluid plan-contain">'
					+ '<div id="' + stringpls + '" class="plan-big well well-sm">'
					+ '<div class="plan-row"><div class="task-total"></div>'
					+ '<span class="plan-title">' + newtemp + '</span></div></div>');

					console.log($(document.getElementById(stringpls)));
					//not closing the plan-big div until the very end makes it collapse easier it seems


					$(document.getElementById(stringpls)).append('<div class="row agenda-act-row well" id="'
					+ obj[i].id + '" aria-haspopup="true" aria-expanded="false">'
					+ '<div class="small-type col-xs-10 col-sm-10">'
					+ moment(obj[i].start).format('h:mm a') + ' to '
					+ moment(obj[i].end).format('h:mm a') + '</div>'
					//div holder for the checkbox to manually complete and go to next event
					+ '<input type="checkbox" class="checkbox_complete">'
						//div holder for timer next to scheduled time
					+ '<div class="smaller-type timer col-xs-12 col-sm-12"></div>'
					+ '<div id="specificplan-'
					+ obj[i].title + '" class="specplanners the-first-act col-xs-12 col-sm-12">'
					+ obj[i].title + '</div>');

					//$('.plan-big').slideToggle('slow');
					//animate plans to bring them offscreen to on from left
					//}
					//copy this to the starting activity of the other plans
								// or better yet, refactor so there arn't seperate loops for the first act of a plan

					if (UTCstart < currentTime && currentTime < UTCend && flagCurrent != 1) {
							console.log('current plan html if true here : ' + flagCurrent);
						$('#' + obj[i].id).parent().addClass('currentPlan');
						$('#' + obj[i].id).addClass('currentAct');
						//$('.plan-big').children().toggle('slow');
						$('body').animate({ scrollTop: $('.currentAct').offset().top - $('.navbar').height() }, 1000);
						//$('.plan-big').not($('.currentPlan')).children().hide();
						$('.currentAct').css('background-color', '#C6E2FF');
						$('.currentAct').children('.timer').html(timerVar + ' left');

						setInterval(function() {
								var endTimeAct = $('.currentAct').children('.smaller-type').prop('id');

							if (currentTime < endTimeAct) {
								console.log('still on this activity');

								//code for timer
								//getData();
							}
							else {
								console.log('switch to next activity or nearest plan');
								//getData();

							}

							}, 60000);

						//didnt want to flag, but its to test for another current activity
						//will make impossible to do in validation
						var flagCurrent = 1;

					} // end of if check

					var oldtemp = obj[i].plan;
				
				} // end of for-call of selected obj, 2nd from initial each JSONParse call

			} // end of each JSONParse call

			});

			if (todayPlan == 0) {
				$('#json-today').append('<div class="well-sm">No Plans Today</div>'
				+ '<div class="make-button">Make a Plan</div>').css('background-color', 'white');

				var nextOne = $('#json-future .plan-contain .agenda-act-row')[0];

				console.log(nextOne);

				//$('body').animate({ scrollTop: nextOne.offset().top - $('.navbar').height() }, 1000);
				//$('.plan-big').not($('.currentPlan')).children().hide();
				//nextOne.children('.the-first-act').before('<div class="timer-first smaller-type"></div>');
				$(nextOne).css('background-color', '#C6E2FF');
				$(nextOne).children('.timer').html('22 hours until start');

			}

			if (todayPlan == 1 && typeof flagCurrent == 'undefined') {

				for (j = 0; j < tempArray.length - 1; j++) {

						var minVal = 0;

						var curMil = tempArray[j];

						if (curMil > minVal) {
							posArray.push(curMil);
						}
					}

					posArray.sort(function (a,b) { return a-b });

					console.log(posArray);

					console.log(tempObj);

					/* Object.prototype.getKey = function(value) {

  						for (var key in this) {
    						if (this[key] == value) {
      							return key;
    								}
  								}
  							return null;
							};*/

				//var nextAct = tempObj.getKey(posArray[0]);

				//console.log(nextAct);

			}

			// hide all plans except for the first of the day or current time-based plan
			// hide the activities of each plan

			$('.plan-big').on('click tap', function(e) { //show the activities on click
				/*console.log('planbig on click entered');
				
				$(this).children().toggle('fast');
				$(this).children('.plan-row').toggle('fast');*/

				console.log($(this).children().attr('checked', false));// && $(this).children().is(':hidden'))
			});

			function checkBoxer(jobject) {
				//encapsulate the tasktotal object into a variable
				var numberhold = jobject.parent().parent().children('.plan-row').children('.task-total');

				//add up the total activities for task total '0/12, 1/12' viewer

				var holdNum = jobject.parent().parent().children('.agenda-act-row').length;

				//encapsulated the plan name as a string

				var plan = jobject.parent().parent().attr('id');

				var inserter = '#' + plan + ' input:checked';

				//insert the plan name and input selector for checkboxes and add up their total with 'length'

				var checkedTotal = $(inserter).length;

				//insert the total checked length / the inital total activites 
				numberhold.html(checkedTotal + '/' + holdNum + ' completed');

			}

			$('.checkbox_complete').on('click tap', function(e) {
				//e.preventDefault();
				e.stopPropagation();
				checkBoxer($(this));
				$(this).parent().toggle('normal');
			});

			//$('.plan-big').children().hide();
			$('.plan-big').css('left', '-100%');
			$('.plan-big').animate({left: '0%'}, 800);
			//$('#json-future').hide();
			//$('#json-past').hide();

			//make currentdate fixed to top on scrolldown
			function positionObj(indexer, element) {
				this.indexer = indexer;
				this.element = element;
			};

			//HUEG function just to fix current scrolling plan's date to the top of the page
			//could be slow, is there a faster way to detect top element in array?
			//on fast scrolls, this function sometimes doesnt run
			function getDateFixed() {
				var positionRel = [];
				var arr1 = []
				$('.day-specify').each(function(i, elem) {
					//the next fixed elem will be the least positive one
					//the current fixed elem is the least negative one
					positionRel[i] = $(elem).offset().top - $(window).scrollTop() - $('.navbar').height();
					var positionTest = new positionObj(positionRel[i], elem.innerHTML);
					arr1.push(positionTest);
				});

				for (i = 0; i < arr1.length; i++) {
					if (arr1[i].indexer <= 15) 
					{
						if (typeof arr1[i+1] === 'undefined' || arr1[i+1].indexer >= 15)
						{
							console.log(arr1);
							$('.navfix').html(arr1[i].element);
						}
					}
				}

			} // end getDateFixed function

			$(window).scroll(function() {
				getDateFixed();
			});

			//have to put entire actoptions div in getData() manually because of insertAfter
			if (!($('.actoptions').length)) {

			var actOptions = '<div class="actoptions"><ul class="dropdown-menu-test">'
            + '<li class="option-text" id="edit-option">Edit</li>'
            + '<li class="option-text" id="clone-option" data-toggle="modal" data-target="#modal-weekday">Clone</li>'
            + '<li class="option-text" id="delete-option" data-toggle="modal" data-target="#modal-delete">Delete</li>'
        	+ '</ul></div>';

        	$('.over-container').after(actOptions);
        	$('.actoptions').hide();

        	};


			//have to call this handler after function has been defined, not in the handler and function itself

			$('.actoptions').on('click tap', function(e) {
				console.log('propagates');
			});

			$('.agenda-act-row').on('click', function(e) {

                e.stopPropagation('.plan-big');

                console.log('bubbling up from controller click');

                if (($(this).next('.actoptions').length) == 0) {
                	console.log($(this).next('.actoptions').length);

                	$('.actoptions').hide();
                	$('.actoptions').insertAfter($(this));

                	$('.actoptions').slideToggle('slow', function(e) {
                    console.log('now slid under new act');
                });

                }

                else {
                	console.log($(this).next('.actoptions').length);
                	$('.actoptions').insertAfter($(this));

                	$('.actoptions').slideToggle('slow', function(e) {
                    console.log('else slide entered');
                	});

                }

                var thisAct = $(this).attr('id');
                var thisTime = $(this).children('.small-type').text()
                var thisActivity = $(this).children('.specplanners').text();
                var thisDateDel = $(this).siblings().html();
                console.log(thisTime + thisActivity);
                var thisHTML = '<div class="well"><div>' + thisDateDel + '</div><br><div>' + thisTime + '</div><div>'
                + thisActivity + '</div></div>';

                $('#delete-act').html(thisHTML);

                    $('#delete-button').on('click tap', function(e) {

                        //KEEPS DOUBLE POSTING TO DELPLAN.PHP
                        $.ajax({
                            url: 'delplan.php',
                            type: 'POST',
                            dataType: 'json',
                            data: {deleteid: thisAct},
                            complete: getData,
                            error: function(throwErr) {
                                console.log(throwErr);
                            }
                        });
                    });


            });

		}, // end of success callback

		error: function(errorThrown) {
			$('#json-nest').html(errorThrown);
		}
	});

	} //end of getData function 

getData();

window.getData = getData;


				//somewhat unnecessary sort function for nearest activity if no current one

			/*for (j = 0; j < tempArray.length - 1; j++) {

						var minVal = 0;

						var curMil = tempArray[j];

						if (curMil > minVal) {
							posArray.push(curMil);
						}
					}

					posArray.sort(function (a,b) { return a-b });

					console.log(posArray);

					console.log(tempObj);

					Object.prototype.getKey = function(value) {

  						for (var key in this) {
    						if (this[key] == value) {
      							return key;
    								}
  								}
  							return null;
							};*/

})

