$(function () {
	$('#publish-btn').on('click', function () {
		var form = $('#announcement')[0];
        var data = new FormData(form);
        var summernoteBody = $('.summernote').summernote('code');
        var title = $('input[name=title]').val();
        var description = $('input[name=description]').val();
        var announcement = {
        	'title': title,
        	'description': description,
        	'announcement': summernoteBody
        };

        if ($('.summernote').summernote('isEmpty') || title == '') {
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
	        }, function () {
		        $.ajax({
		            type: "POST",
		            url: '../../university/announcements/publish',
		            cache: false,
		            data: {
		            	announcement: announcement
		            },
		            success: function(response) {
		                var response = $.parseJSON(response);
			            swal("Success", response.message, "success");
		            },      
		            error: function (response, desc, exception) {
		                alert(exception);
		            }
		        })
	        });
        }
	})
})