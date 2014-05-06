
$(document).ready(function() {
    if("datetimepicker" in $('.datepicker'))
        $('.datepicker').datetimepicker({
            language: "nl"
        });

    setTimeout(function() {
        $(".alert-floating").addClass("in");
    }, 200)
})