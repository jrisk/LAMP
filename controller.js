$(function () {

    /***************** button redirects ************************************/

$('#calpress').on('click tap', function(e) {

    window.location.href = 'calplug.php';
});

$('#agendapress').on('click tap', function(e) {

    window.location.href = 'agenda.html';
});

$('.day-input').on('click tap', function(e) {
    console.log('input pressed');
    e.stopPropagation();
});

/******************* ADDED ACTIVITY MODAL INSERT HANDLERS **********************************/

$('#plan-row, #class-row, .actoptions').hide();

    $('#modal-include').on('shown.bs.modal', function(e) {
        //$('.cancelsave').show();
    });

    $('#modal-include').on('hidden.bs.modal', function(e) {
        //$('.cancelsave').hide();
    });

    $('input').on('focusin', function(e) {
        $('.input-group-addon').not($(this).siblings()).css('opacity', '0.3');
    });

    $('input').on('focusout', function(e) {
        $('.input-group-addon').css('opacity', '1.0')
    });

    $('#addplantoggle').on('click', function(e) {
        $('#plan-row').slideToggle();
    });

    $('#addclasstoggle').on('click', function(e) {
        $('#class-row').slideToggle();
    });

    $('#cancelbutton').on('click', function(e) {
        //
    });

/**************** ACTIVITY MODAL END HANDLERS ******************************/

function clickWeek() {

$('.day-wrap').on('click tap', function(e) {

    var checkedBool = $(this).children()[0].checked;

    console.log(checkedBool);

    if (checkedBool == false) {

    $(this).children().prop('checked', true);

    }

    else {
        $(this).children().prop('checked', false);
    }
});

};

clickWeek();

/*$('#clone-button').on('click tap', function(e) {
    e.preventDefault();
    $('#modal-weekday').attr({'data-toggle' : 'modal', 'data-target': '#modal-weekday'});
});*/

/***************************** HIDE DIVS, MOBILE CONTAINER, CHECKBOX HOLDER, DAY CHOICE FOR REPEATING ***/

$('#label-row').hide();
$('#activity-container').hide(); //start with this hidden unless they want to add stuff now
$('#checkbox-holder').hide(); //start checkbox hidden until receive day input from user
$('#the-day').hide();

/************************************** WIDTH READER, DECIDES WHAT TO SHOW BASED ON SCREEN SIZE ********/

var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

function widthDecide() {

if (width <= 728) {
    $('#label-row').hide();
}

else {
        $('#activity-molab').hide();
        $('#start-time-molab').hide();
        $('#end-time-molab').hide();
        $('#media-molab').hide();
    }
};

function widthDecideOnShow() {

if (width >= 728) {
    $('#label-row').show();
}

else {
        $('#activity-molab').show();
        $('#start-time-molab').show();
        $('#end-time-molab').show();
        $('#media-molab').show();
    }
};

function widthDecideOnShowCopy() { //delegate/on because of inserted php elements

if (width >= 728) {
    $('.label-row-insert').show();
    $('.activity-insert').hide();
    $('.start-insert').hide();
    $('.end-insert').hide();
}

else {
        $('.label-row-insert').hide();
        $('.activity-insert').show();
        $('.start-insert').show();
        $('.end-insert').show();
        $('.delact-full').hide();
        
    }
};

widthDecide();


function savePlan() {

    var plan_name = $('#lessonname3').val();

    var week_check = $('input[name=every_week]:checked').val();

    $.ajax({
        type: 'POST',
        url: 'planform.php',
        data: {lesson_name : plan_name},
        dataType: 'html',
        success: function(data) {
            $('#alerts').html(data);

                if ($('#plan_good').length != 1) {
                    $('#plan-editor').fadeOut().fadeIn();
                    console.log('all is not good with this plan name');
                }
                else {
                    actInsert();
                }
            }, //end success
        error: function(errorThrown) {
            console.log(errorThrown);
        }
    }); //end ajax call
};

/********************************* VALIDATION FUNCTIONS FOR ALL INPUTS *********************************/
/*valRegEx = /\.|\-/;

if (valRegEx.test(plantitle) */
	
// add plan save button, shows the activity columns after submitting the plan name, class name, and date

$('#datetimepickerplan3, #starttime3, #endtime3').on('dp.show', function(e) {
    var wig = $('.bootstrap-datetimepicker-widget');
    $('body').animate({ scrollTop: wig.offset().top - $('navbar').height() }, 1000);

}).on('dp.hide', function(e) {
    $(this).children('input').blur();
});

//editing datetimepickers still have no focus

//$('#add-plan').on('click tap', function() {
function actInsert() {

    $('#container-outer-make').hide();
    $('#activity-container').show();
    $('#button-add-save').hide();
    widthDecideOnShow();

    console.log($('#planclassday input').serialize());

    //lessonname3 classname3 dateplan3

    $('#plan-viewer').html("<div class='col-sm-4' id='plan-editor'><h3 id='paperclip-holder'>"  + $('#lessonname3').val() + 
    "</h3><div id='well-plan'></div></div>").hide().fadeIn(1000);
    $('#plan-viewer').append("<div class='col-sm-4' id='class-editor'><h3 id='education-holder'>" + $('#classname3').val() + 
    "</h3><div id='well-class'></div></div>")
    .fadeIn(1000);
    $('#plan-viewer').append("<div class='col-sm-4' id='date-editor'><h3 id='calendar-holder'>" + $('#dateplan3').val() +
    "</h3><div id='well-date'></div></div>")
    .fadeIn(1000);

    /*******************CLICK EVENT HANDLERS TO EDIT PLAN, CLASS, DATE ONCE ALREADY TYPED****************/

    /******************* START OF EDIT FUNCTIONS ********************************************************/

    function clickEditPlan() {

    $('#plan-viewer').on('click tap', '#plan-editor', function(e) {
        $('#paperclip-holder').html("<span class='glyphicon glyphicon-paperclip'></span>"
        + "<input id='edit-plan' name='edit_plan' type='text' value='" + $('#lessonname3').val() + "' placeholder='"
        + $('#lessonname3').val() + "'>").hide().fadeIn(1000);
        // turn off click handler when changing focus
        $('#edit-plan').on('focusin', function(e) {
            $('#plan-viewer').off();
            console.log('plan was focused in on');
        });

        // put edit-plan in variable?

        var strLength = $('#edit-plan').val().length * 2;

        $('#edit-plan').focus();

        $('#edit-plan')[0].setSelectionRange(strLength, strLength);

        });
    }

    clickEditPlan();

    $('#plan-editor').on('focusout', function(e) {

        if ($('#edit-plan').val() == "") {
            $('#edit-plan').attr("placeholder", "field cannot be blank");
            console.log("validate this...no plan name typed");
        }

        else {

        var oldPlan = $('#lessonname3').val();

        $('#lessonname3').val($('#edit-plan').val());

        console.log($('#lessonname3').val());

        var editPlan = $('#edit-plan').val();

        $(this).html("<h3 id='paperclip-holder'>"
        + $('#edit-plan').val() + "</h3><div id='well-plan'></div>").hide().fadeIn(1000);
        console.log("did this fire");

        clickEditClass();
        clickEditPlan();
        clickEditDate();


        $.ajax({
            url: 'neweditform.php',
            type: 'POST',
            dataType: 'json',
            data: {new_plan: editPlan, old_plan: oldPlan,
            old_class: 'NULL', new_class: 'NULL', old_date: 'NULL', new_date: 'NULL'},
            success: function(data) {
                console.log('posted edit of PLAN NAME');
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });

        console.log('end ajax call');

        }

    });

    function clickEditClass() {

    $('#plan-viewer').on('click tap', '#class-editor', function(e) {
        $('#education-holder').html("<span class='glyphicon glyphicon-education'></span>"
        + "<input id='edit-class' name='edit_class' type='text' value='" + $('#classname3').val() + "' placeholder='"
        + $('#classname3').val() + "'>").hide().fadeIn(1000);
        // turn off click handler when changing focus
        
        $('#edit-class').on('focusin', function(e2) {
            $('#plan-viewer').off();
            console.log('class was focused in');
            console.log(e);
            console.log(e2);
        });

        // put edit-plan in variable?

        var strLength = $('#edit-class').val().length * 2;

        $('#edit-class').focus();

        $('#edit-class')[0].setSelectionRange(strLength, strLength);



        });
    }

    clickEditClass();

    $('#class-editor').on('focusout', function(e) {

        var oldPlan = $('#lessonname3').val();

        var oldClass = $('#classname3').val();

        if ($('#edit-class').val() == "") {

            $('#edit-class').attr("placeholder", " field cannot be blank");
            console.log("validate this...no class name typed");
            
        }

        else {

        $('#classname3').val($('#edit-class').val());

        console.log($('#classname3').val());

        var editClass = $('#edit-class').val();

        $(this).html("<h3 id='education-holder'>"
        + $('#edit-class').val() + "</h3><div id='well-class'></div>").hide().fadeIn(1000);

        }

        clickEditClass();
        clickEditPlan();
        clickEditDate();

        // EDIT CLASS

         $.ajax({
            url: 'neweditform.php',
            type: 'POST',
            dataType: 'json',
            data: {new_plan: oldPlan, old_plan: 'NULL', old_class: oldClass, new_class: editClass,
            old_date: 'NULL', new_date: 'NULL'},
            success: function(data) {
                console.log('posted edit of Class');
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });

    });

    // ************************ START OF CLICK DATE EDIT FUNCTION *************************************

    function clickEditDate() {

    $('#plan-viewer').on('click tap', '#date-editor', function(e) {
        $('#calendar-holder').html("<div class='form-group'><div class='input-group input-group-lg date' id='datetimepickeredit3'>"
        + "<span class='glyphicon glyphicon-calendar'></span>"
        + "<input id='edit-date' name='edit_date' type='text' value='" + $('#dateplan3').val() + "' placeholder='"
        + $('#dateplan3').val() + "'></div></div>").hide().fadeIn(1000);

        // call datetimepicker now that it exists in the DOM
        dateTimeFun();
        /*$('#datetimepickeredit3').data("DateTimePicker").show(function(e) {
            $('#plan-viewer').off();
        });*/

        // turn off click handler when changing focus
        $('#edit-date').on('focusin', function(e2) {
            $('#plan-viewer').off();
            console.log('the date was focused in');
            });
        });
    }

    clickEditDate();

    $('#date-editor').on('focusout', function(e) {

        var oldPlan = $('#lessonname3').val();

        var oldDate = databaseDate($('#dateplan3'));

        console.log("the old date is:::" + oldDate);

        $('#dateplan3').val($('#edit-date').val());

        console.log($('#dateplan3').val());

        var editDate = databaseDate($('#edit-date'));

        console.log(editDate);

        $(this).html("<h3 id='calendar-holder'>"
        + $('#edit-date').val() + "</h3><div id='well-date'></div>").hide().fadeIn(1000);

        clickEditClass();
        clickEditPlan();
        clickEditDate();

        $.ajax({
            url: 'neweditform.php',
            type: 'POST',
            dataType: 'json',
            data: {new_plan: oldPlan, old_plan: 'NULL', old_class: 'NULL',
            new_class: 'NULL', old_date: oldDate, new_date: editDate },
            success: function(data) {
                console.log('posted edit of date time');
            },
            error: function(errorThrown) {
                console.log(errorThrown);
            }
        });

    });

}; // end actInsert function

// Cant call (this).on() while in the (this) function. thats why $('#actentry').on() wont work in function

$('#actentry').on('click tap', '.activity-inserted', clickEditAct);

function clickEditAct() {

    console.log('clickedit act being called');

        console.log($(this).html());

        var actID = $(this).parent().siblings('.activityID').html();

        console.log(actID);

        var actVal = $(this).html();

        $(this).html("<input class='activity-input' name='edit_activity' maxlength='60' type='text' value='"
        + actVal + "' placeholder='" + actVal + "'>").hide().fadeIn(1000, function(e) {
            //while fadeout effect is going, make sure they cant click on other inputs while ongoing
            console.log(e);
        });

        // focusin handler

        $('#actentry').on('focusin', '.activity-input', function(e) {

            $('#actentry').off();

            console.log('focusin from focusin main on top');

        });

        var strLength = $(this).children().val().length * 2;

        $(this).children()[0].setSelectionRange(strLength, strLength);

        $(this).children().focus();

        //focusout handler

        $('#actentry').on('focusout', '.activity-input', function(e) {

            console.log('focusOUT called from top focusout');

            var actValNew = $(this).val();

            console.log("value is: " + actValNew);

            $(this).parent().html(actValNew).css('overflow', 'hidden').hide().fadeIn(1000);

            //call this function to reset the handlers so specific edits can be clicked again
            //without inteferring with past clicks

            $.ajax({
                type: 'POST',
                url: 'acteditform.php',
                dataType: 'html', //json or html, php parses it somehow
                data: {activity: actValNew, old_activity: actVal, id: actID,
                start_time: 'NULL', old_start: 'NULL', end_time: 'NULL', old_end: 'NULL'},
                success: function(data) {
                    console.log('activity changed');
                },
                error: function(errorThrown) {
                console.log(errorThrown);
                }

            });

            focusFix();

            });

        // once called the focusin handle is permanently listening on (this) function

    };

    //focus OUT fix to reset clicktap clickEditACt

    function focusFix(element) {

        console.log('focusFix called');

        $('#actentry').on('click tap', '.activity-inserted', clickEditAct);

        $('#actentry').on('click tap', '.delact, .delact-copy', deleteAct);

        $('#actentry').on('click tap', '.start-time-insert', clickEditStart);

        $('#actentry').on('click tap', '.end-time-insert', clickEditEnd);

    }

$('#actentry').on('click tap', '.start-time-insert', clickEditStart);

function clickEditStart() {

    console.log('Start Time Click Edit function');

        console.log($(this).html());

        var startVal = $(this).html();

        //have to change to full 00:00 for database

        var startValDB = moment(startVal, 'h:mm A');

        var startValOldDB = moment(startValDB).format('HH:mm:ss');

        //keeps copying the input html into new html

        var actID = $(this).parent().siblings('.activityID').html();

        console.log(actID);

        //starttimeedit3 id, input name start_time_edit and id startedit3

        $(this).html("<div class='input-group date' id='starttimeedit3'>"
                + "<input type='text' value='" + startVal + "' class='form-control input-lg start-edit-input'"
                + "placeholder='" + startVal + "' name='start_time_edit' id='startedit3'>"
                + "</div>");

        dateTimeFun();

        $('#startedit3').focus();

        $('#actentry').on('focusin', '.start-edit-input', function(e) {
            console.log('start time focus in');
        });

        $('#actentry').on('focusout', '#starttimeedit3', function(e) {

            console.log('focus out on start time called');

            var startValNew = $(this).children().val();

            //have to change to full 00:00 for database

            var startValNewDB = moment(startValNew, 'h:mm A');

            var startValNewDB = moment(startValNewDB).format('HH:mm:ss');

            console.log("value is: " + startValNew);
            console.log($(this).parent());

            $(this).parent().html(startValNew).hide().fadeIn(1000);

            //this keeps getting called each time its clicked and focused out
            //something is kept and added to on each click that isnt being reset

            //focusFix();

            $.ajax({
                type: 'POST',
                url: 'acteditform.php',
                dataType: 'html', //json or html, php parses it somehow
                data: {activity: 'NULL', old_activity: 'NULL', id: actID,
                start_time: startValNewDB, old_start: startValOldDB, end_time: 'NULL', old_end: 'NULL'},
                success: function(data) {
                    console.log('success changed, didnt work because dataType should not be json');
                },
                error: function(errorThrown) {
                console.log(errorThrown);
                }

        });

        });
};

$('#actentry').on('click tap', '.end-time-insert', clickEditEnd);

function clickEditEnd() {

    console.log('End Time Click Edit');

        console.log($(this).html());

        var actID = $(this).parent().siblings('.activityID').html();

        console.log(actID);

        var endVal = $(this).html();

        //have to change to full 00:00 for database

        var endValDB = moment(endVal, 'h:mm A');

        var endValOldDB = moment(endValDB).format('HH:mm:ss');

        //keeps copying the input html into new html

        //starttimeedit3 id, input name start_time_edit and id startedit3

        $(this).html("<div class='input-group date' id='endtimeedit3'>"
                + "<input type='text' value='" + endVal + "' class='form-control input-lg end-edit-input'"
                + "placeholder='" + endVal + "' name='end_time_edit' id='endedit3'>"
                + "</div>");

        dateTimeFun();

        $('#endedit3').focus();

        $('#actentry').on('focusin', '.end-edit-input', function(e) {
            console.log('start time focus in');
        });

        $('#actentry').on('focusout', '#endtimeedit3', function(e) {

            console.log('focus out on start time called');

            var endValNew = $(this).children().val();

            //have to change to full 00:00 for database

            var endValNewDB = moment(endValNew, 'h:mm A');

            var endValNewDB = moment(endValNewDB).format('HH:mm:ss');

            console.log("value of end time is: " + endValNew);
            console.log($(this).parent());

            $(this).parent().html(endValNew).hide().fadeIn(1000);

            $.ajax({
                type: 'POST',
                url: 'acteditform.php',
                dataType: 'html', //json or html, php parses it somehow
                data: {activity: 'NULL', old_activity: 'NULL', id: actID,
                start_time: 'NULL', old_start: 'NULL', end_time: endValNewDB, old_end: endValOldDB},
                success: function(data) {
                    console.log('success changed');
                    endToStartChange();
                },
                error: function(errorThrown) {
                console.log(errorThrown);
                }

        });

            //this keeps getting called each time its clicked and focused out
            //something is kept and added to on each click that isnt being reset

            //focusFix();

        });

}; // end of ENTIRE ADD PLAN BUTTON

/************************************** END OF EDIT FUNCTIONS **************************************/

/************************************** START TIME FUNCTIONS ***************************************/

function dateTimeFun() {
$('#datetimepickerplan3').datetimepicker({
    format: 'dddd, MMMM Do YYYY',
    allowInputToggle: true
});

$('#datetimepickeredit3').datetimepicker({
    format: 'dddd, MMMM Do YYYY',
    allowInputToggle: true,
    focusOnShow: false
});

$('#starttime3').datetimepicker({
    format: 'h:mm A',
    allowInputToggle: true,
    useCurrent: false,
    focusOnShow: false
});

$('#starttimeedit3').datetimepicker({
    format: 'h:mm A',
    allowInputToggle: true,
    useCurrent: false,
    focusOnShow: true
});

$('#endtime3').datetimepicker({
    format: 'h:mm A',
    allowInputToggle: true,
    useCurrent: false,
    focusOnShow: false
});

$('#endtimeedit3').datetimepicker({
    format: 'h:mm A',
    allowInputToggle: true,
    useCurrent: false,
    focusOnShow: true
});

};

dateTimeFun(); //initialize the date and start/end time pickers

/******************************** LINKED START END TIME FUNCTIONS *********************/

function dateTimeChange() {

var midnight1 = moment('11:59 PM', 'h:mm A');

var endFlag = 0;

$('#endtime3').on('dp.change', function(e) {
    $('#starttime3').data('DateTimePicker').maxDate(e.date);
    endFlag = 1;
});

$('#starttime3').on('dp.change', function(e) {
    var fixStart = moment(e.date, 'h:mm A').format('h:mm A');
    console.log('starttime change' + endFlag);
    if (endFlag < 1) {
    $('#end3').val(fixStart);
    }
    //too many chances for end time to be unusable 
}); //link together start and end time to prevent times before being possible

$('#endtimeedit3').on('dp.change', function(e) {
    $('#starttimeedit3').data('DateTimePicker').maxDate(e.date);
});

$('#starttimeedit3').on('dp.change', function(e) {
    $('#endtimeedit3').data('DateTimePicker').minDate(e.date);
    //$('#endtimeedit3').data('DateTimePicker').maxDate(midnight)
});

//$('#endtime3').data('DateTimePicker').maxDate(midnight1); //e.date to 12:00AM to prevent day to next day prob

};

dateTimeChange();
//*************************linked start-end time functions END ******************/

//change event not firing on input item because the dtpicker not initialized until here??

$('input[type=text]').change(function(e) {
    console.log('test on change event for text-type input events');
});



//expose weekly repeat option on day selection

$('#datetimepickerplan3').on('dp.change', function(e) {

    $('#checkbox-holder, #the-day').show();

    var dayinput = $('#dateplan3').val();

    var daybase = moment(dayinput, 'dddd, MMMM Do YYYY');

    var daybaseval = moment(daybase).format('dddd');

    $('#the-real-day').html(daybaseval);

    });

//for changing date into mysql readable database date yyyy-mm-dd

var databaseDate = function(element) {
    var dayinput = element.val();

    var daybase = moment(dayinput, 'dddd, MMMM Do YYYY');

    var daybaseval = moment(daybase).format('YYYY-MM-DD');

    return daybaseval;
};

// PUT PM/AM VALUES INTO 24 HOUR DATABASE FORMAT WITH SECONDS

function timeDatabase() {

    var startElement = $('#start3').val();

    var endElement = $('#end3').val();

    var startertime = moment(startElement, 'h:mm A');

    var endertime = moment(endElement, 'h:mm A');

    var startChange = moment(startertime).format('HH:mm:ss');

    var endChange = moment(endertime).format('HH:mm:ss');

    $('#start3').val(startChange);

    $('#end3').val(endChange);

};


// make start time of next activity the end time of the last activity 

function endToStartChange() {

    var lastend = $('#activity-container-copy .end-time-insert').last().html();

    console.log(lastend);

    var startform = moment(lastend, 'HH:mm:ss');

    var changetime = moment(startform).format('h:mm A');

    $('#start3').val(changetime);
    $('#starttime3').data('DateTimePicker').minDate(changetime);

    $('#end3').val(changetime);

};

// TURN THE START TIME INTO READABLE AM/PM IN VIEW MODE

var startHuman = function(enterstart) {

    var starting = $(enterstart).html();

    var startproto = moment(starting, 'HH:mm:ss');

    var starthuman = moment(startproto).format('hh:mm A');

    return starthuman;
};

// TURN THE END TIME IN READABLE AM/PM MODE

var endHuman = function(enterend) {

    var ending = $(enterend).html();

    var endproto = moment(ending, 'HH:mm:ss');

    var endhuman = moment(endproto).format('hh:mm A');

    return endhuman;
};

//change time into more readable view (2:30pm instead of 14:30:00)

function readableStartEnd() {
    $('.start-time-insert').each(function() {
        var startRead = startHuman($(this));
        $(this).html(startRead);
    });

    $('.end-time-insert').each(function() {
        var endRead = startHuman($(this));
        $(this).html(endRead);
    });
};

/******************************************************* END OF TIME FUNCTIONS *************************/

/************************************** POST NEW PLAN TO DATABASE **********************************/

$('#add-plan').html();

// original makeplan id name $('#add-act')
$('#add-act, #addplan').on('click', function() { // click tap may double-post, preventdefault needed?

    $('#datefix3').val(databaseDate($('#dateplan3')));

    timeDatabase();

    /*if porting to another back-end that isnt PHP, the same-name inputs (1 hidden, 1 checkbox) for 
    the weekday modal rely on fact that if name=Monday input type=checkbox left unchecked, the default will be 
    the hidden input in front of it, whereas if the checkbox is checked, the hidden input with the same name
    name=Monday with the value=0 will be parameterized and sent to the server before the checkbox one
    with value=1, BUT PHP ONLY READS THE LAST INPUT VALUE IF IT RECEIVES MORE THAN 1 INPUT WITH THE SAME NAME
    so when checked, the 2nd checkbox is sent and is the only one that is read by the PHP server

    if if same-name inputs are in array form like in ASP.net, or if only the first input with a certain name 
    is read and any others disgarded, as in Java, use this function to ensure correct one is sent:

    $('.day-wrap').each(function(ind, obj) {
    if ($('.day-wrap')[ind].children().prop('checked') == true) { //if checkbox checked, 2 same-name inputs sent
        obj.children()[0].val() == 1 //make both values 1 and let server handle it
        or
        obj.children()[0].remove() //remove the hidden input to ensure only 1 sent, will have to add it back
        or
        obj.children()[0].attr('name', ''); inputs without a name arnt sent, same as above
    } will have to reset the hidden inputs to 0 eventually for weekday checkbox selection changes
    */

    var formdata = $('#planclassday input').serialize();

    console.log(formdata);

    var plantitle = $('#lessonname3').val();

 //test for periods and other symbols...they mess up the database/ php sort parsing

// POST FORM AJAX FUNCTIONS 

		$.ajax({
		    type: 'POST',
		    datatype: 'json',
		    data: formdata,
		    url: 'newformaction.php',
		    success: function(data) {
                console.log('posted new plan to db');
                //endToStartChange();
                //readableStartEnd();
	                //small hack to keep spaceless text from overflowing div
	                $('.activity-inserted').css('overflow', 'hidden');
                    //reset activity input bar
	                $('input[name=activity]').val('');
                    $('input').val('');
                    getData();
		          },

		    error: function(errorThrown) {
		        console.log(errorThrown);
		    }

		});

});

/**************************** DELETE ACTIVITY OPTION ***************************************/

$('#actentry').on('click tap', '.delact, .delact-copy', deleteAct);

function deleteAct() {

    var actID = $(this).parent().siblings('.activityID').text();

    if ($(this).html() == 'delete') {
        var actID = $(this).siblings('.mobileID').text(); //delete button mobile
    };

    var plantitle = $('#lessonname3').val();

    $.ajax({
        type: 'POST',
        url: 'delactivity.php',
        data: {deleteID: actID},
        dataType: 'html',
        success: function(data) {
            $.ajax({
                type: 'POST',
                url: 'newtotalview.php',
                data: {planning: plantitle},
                dataType: 'html',
                success: function(datas) {
                    $('#actentry').html(datas);
                    widthDecideOnShowCopy();
                    console.log("we are in the success part of the new total view...");
                    endToStartChange();
                    readableStartEnd();
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }
            });
        },
        error: function(errorThrown) {
            console.log(errorThrown);
        }

    });

};

//delplan and save brings you back to main screen of plans, save state and show activities too?

})