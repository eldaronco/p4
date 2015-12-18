"use strict";

// When the user selects a schedule from the pulldown on the create/edit view, it will generate
// the view with the activities from the selected schedule by calling the route with the schedule_id.
function getActList(obj){
    window.location = "/schedules/show/".concat(obj.options[obj.selectedIndex].value);
}

// The dual listboxes work great but since the user just adds items (rather than selecting them) I need to select everything in
// the activity list that the user added so that it will be included in the submitted form.  This is called on form submit.
function selectAllActivities(){
    $("#activities option").prop("selected",true);
}

// Code for the datepicker on the create/edit schedule views.  I could not get this dateFormat to work.
$(document).ready(function(){
    $("#datetimepicker1").datepicker({
        dateFormat: "yyyy-mm-dd"
    });

    //  This is code to move activities between the list of all activities and the
    //  list of chosen activies for a schedule using the directional buttons.
    $('#btnRight').click(function(e) {
        var selectedOpts = $('#allActivities option:selected');
        if (selectedOpts.length == 0) {
            alert("No activity selected!");
            e.preventDefault();
        }
        $('#activities').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
    });
    $('#btnLeft').click(function(e) {
        var selectedOpts = $('#activities option:selected');
        if (selectedOpts.length == 0) {
            alert("No activity selected!");
            e.preventDefault();
        }
        $('#allActivities').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();

    });
});
