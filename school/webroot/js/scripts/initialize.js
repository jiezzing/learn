$(function () {

    $('.chosen-select').chosen({
        width: "100%"
    });

    // summernote initialization
    $('.summernote').summernote({
        height: 300,
        placeholder: 'Your text here...'
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

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        buttons: []
    });

})