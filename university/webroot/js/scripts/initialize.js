$(function () {

    // summernote initialization
    $('.summernote').summernote({
        height: 500,
        placeholder: 'Create your announcement here. . .'
    });

    var mem = $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $(".select2_demo_3").select2({
                placeholder: "Select a state",
                allowClear: true
            });

})