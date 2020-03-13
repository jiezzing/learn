$(function () {

    $('#login-btn').on('click', function(event){
    	event.preventDefault();

        var email = $('#email').val().trim();
        var password = $('#password').val().trim();

    	if(!email || !password){
    		return toastr.error('Invalid email or password', 'Error');
    	}
        else{
            $.ajax({
                type: 'POST',
                url: '../university/login/login',
                cache: false,
                data: {
                    email: email,
                    password: password
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