$(function () {
	$(document).on('click', '.add-submodule-btn',function () {
		var id = $(this).attr('value');
		var submodule = $('input[name=submodule-' + id + ']').val();

        if (submodule == '') {
        	return toastr.error('Module name must not be empty.', 'Error');
        }
        else {
	        swal({
	            title: "Confirmation",
	            text: "Do you want to add this new submodule?",
	            showCancelButton: true,
	            confirmButtonColor: "#1AB394",
	            confirmButtonText: "Yes",
	            closeOnConfirm: false,
	            closeOnClickOutside: true
	        }, function (confirmed) {
		        if(confirmed) {
		        	$.ajax({
			            type: "POST",
			            url: '../university/modules/addSubmodule',
			            cache: false,
			            data: { 
			            	id: id,
			            	submodule: submodule
			            },
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
        			return false;
		        }
	        });
        }
	})
})