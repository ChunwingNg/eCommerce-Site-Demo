var userN = false;
var passW = false;



var $ = function(id) {
    return document.getElementById(id);
};

var checkN = function() {
    var text = $("user").value;

    if (text.length == 0) {
        $("side1").textContent = "This field cannot be left empty";
        $("user").style.boxShadow = "2px 2px 5px red inset";
        userN = false;
    } else {
        $("side1").textContent = "";
        $("user").style.boxShadow = "2px 2px 5px #768998 inset";
        userN = true;
    }
    submitCheck();
}

var checkP = function() {
    var text = $("pass").value;

    if (text.length == 0) {
        $("side2").textContent = "This field cannot be left empty";
        $("pass").style.boxShadow = "2px 2px 5px red inset";
        userN = false;
    } else {
        $("side2").textContent = "";
        $("pass").style.boxShadow = "2px 2px 5px #768998 inset";
        passW = true;
    }
    submitCheck();
}

var submitCheck = function() {
    if (passW && userN) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("user").onblur = checkN;
    $("pass").onblur = checkP;
}