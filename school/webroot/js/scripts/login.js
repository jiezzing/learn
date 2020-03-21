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
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        return window.location.href = '../school/home';
                    }
                    else {
                        return toastr.error(response.message, 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }
    })

})