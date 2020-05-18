$(function () {
	var id = null;
	var moduleId = null;
	var ajaxCall;
	var pendingRequests = [];
	Ladda.bind('#add-pdf-btn');

	$('#add-module-btn').on('click', function (event) {
		event.preventDefault();

        var name = $('input[name=name]').val().trim();

        if (!name) {
        	return toastr.error('Module name must not be empty.', 'Error');
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
			            url: '../school/modules/addModule',
			            cache: false,
			            data: { name: name },
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

	$(document).on('click', '.add-submodule-btn',function (event) {
		event.preventDefault();

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
		moduleId = $(this).attr('module-id');
	})

	$(document).on('click', '.edit-submodule', function(event) {
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

	// upload new submodules contents
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
            dataType: 'json',
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
            	$('#add-pdf-btn').removeAttr('disabled data-loading');
            	$('.progress-bar').removeClass('progress-bar-animated progress-bar-striped');

            	toastr.success(response.message, response.type);
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        }) 
	})

	$('#update-submodule-btn').on('click', function(event) {
		event.preventDefault();

		var name = $('#submodule-name').val().trim();

		if(!name) {
			return toastr.error('Submodule name must not be empty.', 'Error');
		}
		else {
			$.ajax({
	            type: 'POST',
	            url: '../school/modules/updateSubmodule',
	            cache: false,
	            data: { 
	            	id: id,
	            	moduleId: moduleId,
	            	name: name 
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

	$(document).on('click', '.delete-submodule', function(event) {
		var url = $(this).attr('href');

		swal({
            title: "Confirmation",
            text: "Do you want to delete this submodule?",
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

	$(document).on('click', '.edit-module', function(event) {
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
                	$('#edit-module-modal').modal('show');
                	$('#module-name').val(response.result.Module.name);
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

	$('#update-module-btn').on('click', function(event) {
		event.preventDefault();

		var name = $('#module-name').val().trim();

		if(!name) {
			return toastr.error('Module name must not be empty.', 'Error');
		}
		else {
			$.ajax({
	            type: 'POST',
	            url: '../school/modules/updateModule',
	            cache: false,
	            data: { 
	            	id: id,
	            	name: name 
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

	$(document).on('click', '.delete-module', function(event) {
		var url = $(this).attr('href');
		
		swal({
            title: "Confirmation",
            text: "Do you want to delete this module?",
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

})