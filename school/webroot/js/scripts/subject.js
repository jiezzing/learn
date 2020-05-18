$(function () {
    var id = null;

    $('#add-subject-btn').on('click', function(event){
        event.preventDefault();

        var name = $('#subject-name').val().trim();
        var levels = $('#levels').val();

        if(!name || levels == '') {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else {
            $.ajax({
                type: 'POST',
                url: '../school/subjects/create',
                cache: false,
                data: {
                    name: name,
                    levels: levels
                },
                dataType: 'json',
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

    $(document).on('click', '.get-id', function(event) {
        event.preventDefault();

        id = $(this).attr('value');
    })

    $(document).on('click', '.delete-subject', function(event) {
        var url = $(this).attr('href');
        
        swal({
            title: "Confirmation",
            text: "Do you want to delete this subject?",
            showCancelButton: true,
            confirmButtonColor: "#1AB394",
            confirmButtonText: "Yes",
            closeOnConfirm: false,
            closeOnClickOutside: true
        }, function (confirmed) {
            if(confirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    cache: false,
                    data: { id: id },
                    dataType: 'json',
                    success: function(response) {
                        if(response.status) {
                            swal.close();
                            return toastr.success(response.message, response.type);
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
    })

    $(document).on('click', '.edit-subject', function(event) {
        var url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                if(response.status) {
                    $('#edit-subject-modal').modal('show');
                    $('#update-subject-name').val(response.result.Subject.name);
                }
                else {
                    return toastr.error(response.message, response.type);
                }
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        })
    })

    $('#update-subject-btn').on('click', function(event) {
        var name = $('#update-subject-name').val().trim();
        var levels = $('#update-levels').val();

        if(!name || levels == '') {
            return toastr.error('Some fields are missing.', 'Error');
        }   
        else {
            $.ajax({
                type: 'POST',
                url: '../school/subjects/updateSubject',
                cache: false,
                data: { 
                    id: id,
                    name: name,
                    level: levels
                },
                dataType: 'json',
                success: function(response) {
                    if(response.status) {
                        return toastr.success(response.message, response.type);
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

})