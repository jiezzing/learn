$(function () {
    $('#register-btn').on('click', function(e){
        var form = $('#registration')[0];
        var data = new FormData(form);
        
        $.ajax({
            type: "POST",
            url: '../university/users/create',
            cache: false,
            processData: false,
            contentType: false,
            data: data,
            success: function(response) {
                alert(response)
                // if(response == 1){
                //     toastr.success('Successfully registered', 'Success');
                // }
                // else if(response == 2){
                //     toastr.error('Email already exist', 'Error');
                // }
                // else{
                //     toastr.error('An error occured, please try again', 'Error');
                // }
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        })
    });
})