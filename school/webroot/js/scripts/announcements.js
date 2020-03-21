$(function() {
    $('#publish-btn').on('click', function () {
        var summernoteBody = $('.summernote').summernote('code');
        var title = $('#title').val().trim();
        var description = $('#description').val().trim();
        var recipient = $('#recipient').val();
        var announcement = {
            'title': title,
            'description': description,
            'announcement': summernoteBody
        };

        if(!title || !description || recipient == '' || $('.summernote').summernote('isEmpty')) {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else {
            swal({
                title: "Confirmation",
                text: "Do you want to publish this announcement?",
                showCancelButton: true,
                confirmButtonColor: "#1AB394",
                confirmButtonText: "Yes",
                closeOnConfirm: false,
                closeOnClickOutside: true
            }, function (confirmed) {
                if(confirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '../school/announcements/publish',
                        cache: false,
                        data: {
                            recipient: recipient,
                            announcement: announcement
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
        }
    })

    $('#update-btn').on('click', function () {
        var summernoteBody = $('.summernote').summernote('code');
        var title = $('#title').val().trim();
        var description = $('#description').val().trim();
        var recipient = $('#recipient').val();
        var announcement = {
            'title': title,
            'description': description,
            'announcement': summernoteBody
        };

        if(!title || !description || recipient == '' || $('.summernote').summernote('isEmpty')) {
            return toastr.error('Some fields are missing.', 'Error');
        }
        else {
            swal({
                title: "Confirmation",
                text: "Do you want to save its changes?",
                showCancelButton: true,
                confirmButtonColor: "#1AB394",
                confirmButtonText: "Yes",
                closeOnConfirm: false,
                closeOnClickOutside: true
            }, function (confirmed) {
                if(confirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '../../../school/announcements/update',
                        cache: false,
                        data: {
                            recipient: recipient,
                            announcement: announcement
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
        }
    })

    $(document).on('click', '.delete', function () {
        var id = $(this).attr('value');
        var _this = $(this);

        swal({
                title: "Confirmation",
                text: "Do you want to delete this announcement?",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                closeOnConfirm: false,
                closeOnClickOutside: true
            }, function () {
                $.ajax({
                    type: "POST",
                    url: '../university/announcements/delete',
                    cache: false,
                    data: { id: id },
                    success: function(response) {
                        var response = $.parseJSON(response);

                        if (response.status == 1) {
                            swal("Success", response.message, "success");
                        }
                        else {
                            swal("Failed", response.message, "error");
                        }
                        
                    },      
                    error: function (response, desc, exception) {
                        alert(exception);
                    }
                })
            });
    })
})