
function showOptions(){
    var type = $('#type').val();
    if(type == "MCQ"){
        $('#options').show();
    }else{
        $('#options').hide();
    }
}

$("#question_form").unbind('submit').bind('submit', function () {
    // e.preventDefault();
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success:function(response){
            Swal.fire({
                icon: response.icon,
                title: response.title,
                text: response.messages,
            }).then((response) => {
                if(response.success == true){
                    window.location.href="class.php";
                }else{
                    location.reload();
                }
            })
        },
        error:function(e){
            console.log(e);
        }
    })
})

// view question
function view_question(questionId){
    
    console.log("id");
    console.log(questionId);
    $.ajax({
        url:"./includes/fetch_question_by_id.php",
        type:'post',
        data: {questionId: questionId },
        dataType : 'json',
        success : function(response) {
            // console.log(response[0].id);

            $('#class').html(response[0].class);
            $('#subject').html(response[0].subject);
            $('#chapter').html(response[0].chapter);
            $('#topic').html(response[0].topic);
            $('#type').html(response[0].type);
            $('#priority').html(response[0].priority);
            $('#question').html(response[0].question);
            $('#user').html(response[0].user);

            $('table#questionModal tr#optionsRow').remove();
            if(response[0].type == "MCQ"){
                $('#questionModal tr:last').after('<tr id="optionsRow"><th colspan="2">Options</th><td>'+response[0].opt1+'</td><td>'+response[0].opt2+'</td><td>'+response[0].opt3+'</td><td>'+response[0].opt4+'</td></tr>');
            }

        },
        error: function(err){
            console.log(err);
        }
    })
}