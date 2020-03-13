$(function () {

    $('#add-section-btn').on('click', function(event){
    	event.preventDefault();

        var name = $('#section-name').val().trim();
        var level = $('#levels').val();

    	if(!name){
    		toastr.error('Some fields are missing.', 'Error');
    	}
        else{
            $.ajax({
                type: "POST",
                url: '../university/sections/create',
                cache: false,
                data: {
                    name: name,
                    level: level
                },
                success: function(response) {
                    var response = $.parseJSON(response);

                    if (response.status == 0) {
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
        }
    })

})