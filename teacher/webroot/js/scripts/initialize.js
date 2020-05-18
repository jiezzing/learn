$(function () {

    $('.chosen-select').chosen({
        width: "100%"
    });

    // summernote initialization
    $('.summernote').summernote({
        height: 300,
        placeholder: 'Your text here...',
        toolbar: false
    });

    var mem = $('#data_1 .input-group.date').datepicker({
        autoclose: true,
        dateFormat: 'Y-m-d'
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