$(function () {

    $('#update-profile-btn').on('click', function(e){
        var form = $('#UpdateForm')[0];
        var data = new FormData(form);
        var image = $('#file').prop('files')[0];

        data.append('file', image);

        if(data.get('firstname') == "" || data.get('lastname') == "" || data.get('email') == "") {
            return toastr.error("Some fields are missing.", 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../../../university/users/update',
                cache: false,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    var response = $.parseJSON(response);

                    if (response.status == 1) {
                        toastr.success(response.message, 'Success');
                    }
                    else {
                        toastr.error(response.message, 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            }) 
        }
    })

})