$(function() {
    var id = null;

    $('#publish-btn').on('click', function () {
        var summernoteBody = $('.summernote').summernote('code');
        var title = $('#announcement-title').val().trim();
        var description = $('#description').val().trim();
        var recipient = $('#recipient').val();
        var subject = $('#sub').val().trim();
        var announcement = {
            'title': title,
            'description': description,
            'announcement': summernoteBody,
            'subject': subject
        };

        if(!title || !description || recipient == '' || $('.summernote').summernote('isEmpty') || !subject) {
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
        }
    })

    $(document).on('click', '.get-id', function(event) {
        event.preventDefault();

        id = $(this).attr('value');
    })

    $(document).on('click', '.preview', function(event) {
        event.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: url,
            cache: false,
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                if(response.status) {
                    var details = $.parseJSON(response.result.Announcement.announcement);
                    $('#letter-format-modal').modal('show');
                    $('#created').text(response.result[0].date); 
                    $('#title').text(details.title); 
                    $('#subject').text(details.subject); 
                    $('#recipients').text('Dear ' + response.result.Announcement.recipient); 
                    $('#posted-by').text(response.result.User.firstname + ' ' + response.result.User.lastname); 
                    $('#body').html(details.announcement); 
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

    $('#update-btn').on('click', function () {
        var summernoteBody = $('.summernote').summernote('code');
        var title = $('#title').val().trim();
        var description = $('#description').val().trim();
        var recipient = $('#recipient').val();
        var subject = $('#subject').val().trim();
        var announcement = {
            'title': title,
            'description': description,
            'announcement': summernoteBody,
            'subject': subject
        };

        if(!title || !description || recipient == '' || $('.summernote').summernote('isEmpty') || !subject) {
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
                            id: announcementId,
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
                url: '../school/announcements/delete',
                cache: false,
                data: { id: id },
                dataType: 'json',
                success: function(response) {
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
        })
    })

    $(document).on('click', '.action', function () {
        var id = $(this).attr('value');
        var status = $(this).attr('status');
        var text = '';
        var statusId = 0;

        if(status == 'active') {
            text = "Do you want to unpublish this announcement?";
            statusId = 2;
        }
        else {
            text = "Do you want to republish this announcement?";
            statusId = 1;
        }

        swal({
            title: "Confirmation",
            text: text,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false,
            closeOnClickOutside: true
        }, function () {
            $.ajax({
                type: "POST",
                url: '../school/announcements/updateStatus',
                cache: false,
                data: { 
                    id: id,
                    status: statusId 
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        swal(response.type, response.message, response.type.toLowerCase());
                    }
                    else {
                        swal(response.type, response.message, response.type.toLowerCase());
                    }
                    
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        })
    })

})