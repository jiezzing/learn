$(function () {

	// Check page
    if(page != 'login' && page != 'register') {
        $('body').css({'background-color': '#2f4050'});
    }

    // Login 
    $('#login-btn').on('click', function(event){
    	event.preventDefault();
    	var form = $('#User')[0];
    	var data = new FormData(form);

    	if(!data.get('email') || !data.get('password')){
    		toastr.error('Invalid email or password', 'Error');
    	}
        else{
            $.ajax({
                type: "POST",
                url: '../../teacher/users/login',
                cache: false,
                processData: false,
                contentType: false,
                data: data,
                success: function(response) {
                    if(response != 0){
                        if(response == 3){
                            window.location.href = '../../teacher/users/index';
                        }
                    }
                    else{
                        toastr.error('Invalid email or password', 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }
    })

    // Register
    $('#register-btn').on('click', function(event){
        event.preventDefault();
        return alert();
        var form = $('#User')[0];
        var data = new FormData(form);

        if(!data.get('name') || !data.get('email')
            || !data.get('password') || !data.get('confirm-password')){
            toastr.error('All fields are required', 'Error');
        }
        else if(data.get('password') != data.get('confirm-password')){
            toastr.error('Password does not match', 'Error');
        }
        else{
            $.ajax({
                type: "POST",
                url: '../../teacher/users/register',
                cache: false,
                processData: false,
                contentType: false,
                data: data,
                success: function(response) {
                    if(response == 1){
                        toastr.success('Successfully registered', 'Success');
                    }
                    else if(response == 2){
                        toastr.error('Email already exist', 'Error');
                    }
                    else{
                        toastr.error('An error occured, please try again', 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }
    })
})