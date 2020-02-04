$(function () {

	// Check page
    if(page != 'login') {
        $('body').css({'background-color': '#2f4050'});

        alert(page)
    }
    // Login request
    $('#login-btn').on('click', function(event){
    	event.preventDefault();
    	var form = $('#UserLoginForm')[0];
    	var data = new FormData(form);

    	if(!data.get('email') || !data.get('password')){
    		toastr.error('Invalid email or password', 'Error');
    	}
    })
})