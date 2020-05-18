$(function () {

    $('#update-profile-btn').on('click', function(e){
        var data = new FormData();
        var firstname = $('#firstname').val().trim();
        var lastname = $('#lastname').val().trim();
        var middleInitial = $('#middle_initial').val().trim();
        var address = $('#address').val().trim();
        var age = $('#age').val().trim();
        var about = $('#about').val().trim();
        var birthdate = $('#birthdate').val().trim();
        var email = $('#email').val().trim();
        var image = $('#file').prop('files')[0];

        data.append('firstname', firstname);
        data.append('lastname', lastname);
        data.append('middleInitial', middleInitial);
        data.append('address', address);
        data.append('age', age);
        data.append('about', about);
        data.append('birthdate', birthdate);
        data.append('email', email);
        data.append('file', image);

        if(!firstname || !lastname || !email) {
            return toastr.error("Some fields are missing.", 'Error');
        }
        else {
            if($('#password-div').is(':visible')) {
                var password = $('#password').val().trim();
                var newPassword = $('#new-password').val().trim();
                var confirmPassword = $('#confirm-new-password').val().trim();

                if(!newPassword || !confirmPassword) {
                    return toastr.error("Passwords must not be empty.", 'Error');
                }
                else if(password == (newPassword || confirmPassword)) {
                    return toastr.error("It seems that you are using your old password. Please try a new one.", 'Error');
                }
                else if(newPassword != confirmPassword) {
                    return toastr.error("Password does not match. Please try again.", 'Error');
                }
                else {
                    data.append('password', newPassword);
                }
            }

            $.ajax({
                type: "POST",
                url: '../../../school/users/update',
                cache: false,
                data: data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
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

    $('#search-password').on('click', function(event) {
        event.preventDefault();

        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var newPassword = $('#new-password').val().trim();
        var confirmPassword = $('#confirm-new-password').val().trim();

        if(!password || !email) {
            return toastr.error("Email address and password must not be empty.", 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../../../school/users/findPassword',
                cache: false,
                data: {
                    email: email,
                    password: password
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        toastr.success(response.message, response.type);
                        $('#password-div').removeAttr('hidden');
                    }
                    else {
                        toastr.error(response.message, response.type);
                        $('#password-div').attr('hidden', 'hidden');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            }) 
        }
    })

    $('#file').change(function(e){
        fileReader(this);
    })

    $('#register-btn').on('click', function(e){
        var firstname = $('#firstname').val().trim();
        var lastname = $('#lastname').val().trim();
        var email = $('#email').val().trim();
        var type = $('#type').val();
        
        if(!firstname || !lastname || !email) {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../../school/users/create',
                cache: false,
                dataType: 'json',
                data: {
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    type: type
                },
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

    function fileReader(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#image-viewer').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

})