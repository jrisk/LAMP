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
    };

    // end click edit on PLAN then call function

    clickEditPlan();

    // on edit send to php

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

        //refresh handlers

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

    }); // end of focusout handler on plan edit

    // edit CLASS 

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
