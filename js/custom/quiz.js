// view chapters 
function viewChapter(){
    var classId = $("#classId").val();
    var subjectId = $("#subjectId").val();
    if(classId != "" && subjectId != ""){
        $.ajax({
            url:"./includes/fetch_chapters.php",
            type:'post',
            data: {classId: classId, subjectId: subjectId},
            dataType : 'json',
            success : function(response) {
                console.log(response.length);
                if(response.length>0){
                    var div = document.createElement("div");
                    div.className = "col-md-12";
                    var innerDiv = "";
                    let index = 0;
                    while(index < response.length) {
                        console.log("Response "+response[index]+"i="+index);
                        innerDiv += `<div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="chapter${response[index]}" onclick="viewChapterTopics(${response[index]})" value="${response[index]}" name="chapters[]">
                                        <label class="form-check-label">${response[index]}</label>
                                    </div>`;
                            index++;
                    }
                    div.innerHTML = innerDiv;
                    $('.lastRow').append(div);
                }
            },
            error: function(err){
                console.log(err);
            }
        })
    }
}

// view chapter topics
function viewChapterTopics(chapter){
    
    console.log("chapter");
    console.log(chapter);
    $.ajax({
        url:"./includes/fetch_chapter_topics.php",
        type:'post',
        data: {chapter: chapter},
        dataType : 'json',
        success : function(response) {
            console.log(response);
            let isChecked = $('#chapter'+chapter+'').is(':checked');
            console.log(isChecked);
            if(isChecked == true) {
                $('.lastRow').append(`<label for="" class="appended${chapter} p-2">Topics Chapter: ${chapter}</label>`);
                for (let index = 0; index < response.length; index++) {
                    var div = `<div class="appended${chapter} col p-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="${response[index]}" name="topics[]">
                                        <label class="form-check-label">${response[index]}</label>
                                    </div>
                                </div>`
                    $('.lastRow').append(div);
                }
            }else if(isChecked == false){
                $('.appended'+chapter+'').remove();
            }

        },
        error: function(err){
            console.log(err);
        }
    })
}

function customPriority(){
    var priority = $('#priority').val();
    if(priority == 'Custom'){
        $('.customPriority').show();
    }else{
        $('.customPriority').hide();
    }
}