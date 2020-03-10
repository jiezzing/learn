$(function () {
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