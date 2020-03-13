$(function () {

    $('#register-btn').on('click', function() {
        return alert();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var code = $('#employee_code').val();
        var password = $('#password').val();
        var confirmPassword = $('#confirm_password').val();
        var email = $('#email').val();
        var university = $('.universities').val();

        if(firstname == "" || lastname == "" || code == "" || password == "" || confirmPassword == "" || email == "" || university == "") {
            return toastr.error("Some fields are missing.", 'Error');
        }
        else if(password != confirmPassword) {
            return toastr.error("Password does not match.", 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../teacher/registration/register',
                cache: false,
                data: { 
                    firstname: firstname,
                    lastname: lastname,
                    code: code,
                    password: password,
                    email: email,
                    university: university
                },
                success: function(response) {
                    var response = $.parseJSON(response);
                    
                    if(response.status) {
                        $('#University')[0].reset();
                        toastr.success(response.message, 'Success');
                    }
                    else {
                        toastr.error(response.message, 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }

    })

})