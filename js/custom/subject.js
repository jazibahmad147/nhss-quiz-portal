$("#subject_form").unbind('submit').bind('submit', function () {
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
                    window.location.href="subject.php";
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