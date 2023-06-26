
function showPreviousSetPriorities(){
    var priority = $('#priority').find(":selected").val();
    if(priority != ""){
        var lowMCQ = $('#name'+priority).find("#lowMCQ").html();
        var moderateMCQ = $('#name'+priority).find("#moderateMCQ").html();
        var highMCQ = $('#name'+priority).find("#highMCQ").html();
        var lowCRQ = $('#name'+priority).find("#lowCRQ").html();
        var moderateCRQ = $('#name'+priority).find("#moderateCRQ").html();
        var highCRQ = $('#name'+priority).find("#highCRQ").html();
        var lowERQ = $('#name'+priority).find("#lowERQ").html();
        var moderateERQ = $('#name'+priority).find("#moderateERQ").html();
        var highERQ = $('#name'+priority).find("#highERQ").html();
        
        $("#lowMCQInput").val(lowMCQ);
        $("#moderateMCQInput").val(moderateMCQ);
        $("#highMCQInput").val(highMCQ);
        $("#lowCRQInput").val(lowCRQ);
        $("#moderateCRQInput").val(moderateCRQ);
        $("#highCRQInput").val(highCRQ);
        $("#lowERQInput").val(lowERQ);
        $("#moderateERQInput").val(moderateERQ);
        $("#highERQInput").val(highERQ);
    }else{
        $("#lowMCQInput").val("");
        $("#moderateMCQInput").val("");
        $("#highMCQInput").val("");
        $("#lowCRQInput").val("");
        $("#moderateCRQInput").val("");
        $("#highCRQInput").val("");
        $("#lowERQInput").val("");
        $("#moderateERQInput").val("");
        $("#highERQInput").val("");
    }
}