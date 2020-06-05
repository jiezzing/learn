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
        else if(password.length < 8) {
            return toastr.error('Password must be 8 characters long.', 'Error');
        }
        else if(alphanumeric(password) == false) {
            return toastr.error('Password must be alpha numeric.', 'Error');
        }
        else if(password != confirmPassword) {
            return toastr.error('Password does not match.', 'Error');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '../school/registration/register',
                cache: false,
                dataType: 'json',
                data: { 
                    firstname: firstname,
                    lastname: lastname,
                    password: password,
                    email: email,
                    school: school
                },
                success: function(response) {
                    if (response.status) {
                        return window.location.href = '../school/login';
                    }
                    else {
                        return toastr.error(response.message, response.type);
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }

    })

    function alphanumeric(string){
        var Exp = /((^[0-9]+[a-z]+)|(^[a-z]+[0-9]+))+[0-9a-z]+$/i;

        if(string.match(Exp))  {
            return true;
        }
        else {
            return false;
        }
    }

})