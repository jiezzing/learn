$(function () {

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
                url: '../university/login/login',
                cache: false,
                processData: false,
                contentType: false,
                data: data,
                success: function(response) {
                    var response = $.parseJSON(response);

                    if (response.status == 0) {
                        toastr.error('Invalid email or password', 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }
    })
})