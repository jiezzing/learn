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
    
    $('.scroll_content').slimscroll({
        height: '500'
    })

})