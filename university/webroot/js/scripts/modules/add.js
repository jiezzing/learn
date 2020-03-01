$(function () {
	$('#add-module-btn').on('click', function () {
        var name = $('input[name=name]').val();

        if (name == '') {
        	return toastr.error('Module name must not be empty.', 'Error');
        }
        else {
        	$('#add-module-modal').modal('toggle');
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
			            type: "POST",
			            url: '../university/modules/create',
			            cache: false,
			            data: { name: name },
			            success: function(response) {
			                var response = $.parseJSON(response);

			                if(response.status) {
				            	return toastr.success(response.message, "Success");
			                }
			                else {
			                	return toastr.error(response.message, 'Error');
			                }
			            },      
			            error: function (response, desc, exception) {
			                alert(exception);
			            }
			        }).done(function() {
			        	swal.close();
			        })
		        }
		        else {
        			return $('#add-module-modal').modal('show');
		        }
	        });
        }
	})
})