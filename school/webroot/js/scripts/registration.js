$(function () {
    $('#register-btn').on('click', function(event) {
        event.preventDefault();

        var firstname = $('#firstname').val().trim();
        var lastname = $('#lastname').val().trim();
        var password = $('#password').val().trim();
        var confirmPassword = $('#confirm_password').val().trim();
        var email = $('#email').val().trim();
        var school = $('#school').val();

        if(!firstname || !lastname || !password || !confirmPassword || !email) {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else if(password != confirmPassword) {
            return toastr.error('Password does not match.', 'Error');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '../school/registration/register',
                cache: false,
                data: { 
                    firstname: firstname,
                    lastname: lastname,
                    password: password,
                    email: email,
                    school: school
                },
                success: function(response) {
                    var response = $.parseJSON(response);
                    
                    if(response.status) {
                        return toastr.success(response.message, 'Success');
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