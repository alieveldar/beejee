$( document ).ready(function() {
var asc = "↑";
var desc = "↓";
$("#"+$.cookie('column')).addClass($.cookie('sort'));
});
function changeSort(name) {
    console.log(name);
    var elem = $("#"+name);
    if($.cookie('column') == name){
        if($.cookie('sort') == "DESC"){
            document.cookie = "sort=ASC;path=/;";
        }else{
            document.cookie = "sort=DESC;path=/;";
        }
    }else{
        document.cookie='column='+name+";path=/;";
        document.cookie="sort=ASC;path=/;";
    }
    window.location.reload();
}
function setSign() {
    $("#"+$.cookie('column')).text(desc);
}