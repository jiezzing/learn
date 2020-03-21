$(function () {

    $('#add-section-btn').on('click', function(event){
    	event.preventDefault();

        var name = $('#section-name').val().trim();
        var level = $('#levels').val();

    	if(!name){
    		toastr.error('Section field must not be empty.', 'Error');
    	}
        else{
            $.ajax({
                type: "POST",
                url: '../school/sections/create',
                cache: false,
                data: {
                    name: name,
                    level: level
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
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