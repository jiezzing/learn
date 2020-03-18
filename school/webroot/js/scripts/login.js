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
                url: '../school/login/login',
                cache: false,
                data: {
                    email: email,
                    password: password
                },
                success: function(response) {
                    var response = $.parseJSON(response);

                    if (response.status == 0) {
                        return toastr.error(response.message, 'Error');
                    }
                    else {
                        return toastr.success(response.message, 'Success');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }
    })

})