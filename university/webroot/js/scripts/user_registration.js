$(function () {

    $('#register-btn').on('click', function(e){
        var form = $('#registration')[0];
        var data = new FormData(form);
        
        $.ajax({
            type: "POST",
            url: '../../university/users/create',
            cache: false,
            processData: false,
            contentType: false,
            data: data,
            success: function(response) {
                var response = $.parseJSON(response);
                console.log(response)
                if (response.status == 1) {
                    toastr.error(response.message, 'Error');
                }
                else {
                    toastr.success(response.message, 'Success');
                }
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        })
    })

})