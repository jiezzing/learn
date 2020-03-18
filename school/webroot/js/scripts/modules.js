$(function () {
	var id = null;
	var ajaxCall;
	var pendingRequests = [];
	Ladda.bind('#add-pdf-btn');

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
			            type: 'POST',
			            url: '../school/modules/addModule',
			            cache: false,
			            data: { name: name },
			            success: function(response) {
			                var response = $.parseJSON(response);

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
		        else {
        			return $('#add-module-modal').modal('show');
		        }
	        });
        }
	})

	$(document).on('click', '.add-submodule-btn',function () {
		var id = $(this).attr('value');
		var name = $(this).attr('for');
		var submodule = $('#submodule-' + id).val().trim();

        if (!submodule) {
        	return toastr.error(name + ' submodule must not be empty.', 'Error');
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
			            url: '../school/modules/addSubmodule',
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

	$(document).on('click', '.get-id', function() {
		id = $(this).attr('value');
	})

	$(document).on('click', '.edit-submodule', function() {
		var url = $(this).attr('href');

		$.ajax({
            type: 'POST',
            url: url,
            cache: false,
            data: { id: id },
            success: function(response) {
                var response = $.parseJSON(response);

                if(response.status) {
                	$('#edit-submodule-modal').modal('show');
                	$('#submodule-name').val(response.result.Submodule.name);
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

	$('#add-pdf-btn').on('click', function(event) {
		event.preventDefault();

    	var data = new FormData();
    	var pdfs = $('#pdfs')[0].files;

    	data.append('id', id);
    	$.each(pdfs, function(index, value) {
    		data.append('file-' + index, value);
    	})

    	$.ajax({
            type: "POST",
            url: '../school/modules/addContents',
            cache: false,
            data: data,
            contentType: false,
            processData: false,
    		xhr: function() {
    			var xhr = new window.XMLHttpRequest();

    			xhr.upload.addEventListener('progress', function(event) {
    				if(event.lengthComputable) {
    					var percentageComplete = ((event.loaded / event.total) * 100);

    					$('.progress-bar').width(parseInt(percentageComplete) + "%");
    					$('.progress-bar').html(parseInt(percentageComplete) + "%");
    				}
    			}, false)

    			return xhr;
    		},
            beforeSend: function(xhrRequests) {
            	pendingRequests.push(xhrRequests);
            	$('.progress-bar').width('0%');
            	$('.progress').removeAttr('hidden');
            },
            success: function(response) {
                var response = $.parseJSON(response);

            	$('#add-pdf-btn').removeAttr('disabled data-loading');
            	$('.progress-bar').removeClass('progress-bar-animated progress-bar-striped');

            	toastr.success(response.message, response.type);
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        }) 
	})

})