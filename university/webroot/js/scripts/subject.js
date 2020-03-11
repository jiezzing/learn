$(function () {

    $('#add-subject-btn').on('click', function(e){
        var name = $('#subject-name').val();
        var levels = $('#levels').val();

        if(name == "" || levels == "") {
            return toastr.error("Some fields are missing.", 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../../learn/university/subjects/create',
                cache: false,
                data: {
                    name: name,
                    levels: levels
                },
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