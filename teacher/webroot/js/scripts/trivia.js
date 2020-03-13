$(function () {

    $('#trivia-btn').on('click', function() {
        var question = $('#question').val().trim();
        var answer = $('#answer').val().trim();
        var hint = $('#hint').val().trim();
        var trivia = {
            'question': question,
            'answer': answer,
            'hint': hint
        }
        if(!question || !answer) {
            return toastr.error("Some fields are missing.", 'Error');
        }
        else {
            $.ajax({
                type: "POST",
                url: '../teacher/trivias/create',
                cache: false,
                data: { trivia: trivia },
                success: function(response) {
                    var response = $.parseJSON(response);
                    
                    if(response.status) {
                        toastr.success(response.message, 'Success');
                    }
                    else {
                        toastr.error(response.message, 'Error');
                    }
                },      
                error: function (response, desc, exception) {
                    alert(exception);
                }
            })
        }

    })

})