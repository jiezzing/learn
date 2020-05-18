$(function() {
    var id = null;

    $(document).on('click', '.get-id', function(event) {
        event.preventDefault();

        id = $(this).attr('value');
    })

    $(document).on('click', '.delete', function () {
        var id = $(this).attr('value');

        swal({
            title: "Confirmation",
            text: "Do you want to delete this file?",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false,
            closeOnClickOutside: true
        }, function () {
            $.ajax({
                type: "POST",
                url: '../../../school/modules/deleteContent',
                cache: false,
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    if (response.status == 1) {
                        swal("Success", response.message, "success");
                    }
                    else {
                        swal("Failed", response.message, "error");
                    }
                    
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        })
    })

})