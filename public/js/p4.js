"use strict";
function getActList(obj){
    window.location = "/schedules/show/".concat(obj.options[obj.selectedIndex].value);
    //    alert(obj.options[obj.selectedIndex].value);
}
function selectAllActivities(){
    $("#activities option").prop("selected",true);
}

$(document).ready(function(){
    $("#datetimepicker1").datepicker({
  dateFormat: "yyyy-mm-dd"
});
//    var demo1 = $('#activities').bootstrapDualListbox();
$('#btnRight').click(function(e) {
    var selectedOpts = $('#allActivities option:selected');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }
    $('#activities').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();

});
$('#btnLeft').click(function(e) {
    var selectedOpts = $('#activities option:selected');
    if (selectedOpts.length == 0) {
        alert("Nothing to move.");
        e.preventDefault();
    }
    $('#allActivities').append($(selectedOpts).clone());
    $(selectedOpts).remove();
    e.preventDefault();

});
});
