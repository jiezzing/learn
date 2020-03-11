$(function () {
	var id = null;
	var ajaxCall;
	var pendingRequests = [];
	Ladda.bind('#add-pdf-btn');

	// add new module
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
			            url: '../university/modules/addModule',
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

	// add new submodule
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

	$(document).on('click', '.add-pdf', function() {
		id = $(this).attr('value');
	})


	$('#add-pdf-btn').on('click', function() {
		event.preventDefault();

    	var data = new FormData();
    	var pdfs = $('#pdfs')[0].files;

    	data.append('id', id);
    	$.each(pdfs, function(index, value) {
    		data.append('file-' + index, value);
    	})
        var l = Ladda.create(this);
        l.stop();


    	$.ajax({
            type: "POST",
            url: '../university/modules/addContents',
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
            	$('#add-pdf-btn').removeAttr('disabled data-loading');
            	$('.progress-bar').removeClass('progress-bar-animated progress-bar-striped');
            	toastr.success("Files has been successfully uploaded.", 'Success');
            },      
            error: function (response, desc, exception) {
                alert(exception);
            }
        }) 
	})

})