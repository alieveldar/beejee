function save(number) {
    var text = $("#text" + number).val();
    $.ajax({
        type: "POST",
        url: "/login/save/",
        cache: false,
        data: {text: text, id: number},
        success: function(result) {
            console.log(result);
            if(result == "0"){
                window.location.href = "/login";
            }
        },
    });
}

function makeDone(number) {
    if ($("#chk" + number).is(":checked")) {
        var done = "1";
    } else {
        var done = "0";
    }
    $.ajax({
        type: "POST",
        url: "/login/done/",
        data: {done: done, id: number}
    });
}

function login(data) {
    if(data == "0"){
        window.location.href = "/login";
    }
}