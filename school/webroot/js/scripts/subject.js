$(function () {

    $('#add-subject-btn').on('click', function(event){
        event.preventDefault();

        var name = $('#subject-name').val().trim();
        var levels = $('#levels').val();

        if(!name || levels == '') {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '../school/subjects/create',
                cache: false,
                data: {
                    name: name,
                    levels: levels
                },
                success: function(response) {
                    var response = $.parseJSON(response);

                    if (response.status == 1) {
                        toastr.success(response.message, response.type);
                    }
                    else {
                        toastr.error(response.message, response.type);
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            }) 
        }
    })

})