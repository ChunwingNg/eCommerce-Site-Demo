var passW = false;
var email = true;
var filled = false;

var $ = function(id) {
    return document.getElementById(id);
};

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
    bothEmpty();
    submitCheck();
}

var checkM = function() {
    var text = $("email").value;
    if (text.length == 0) {
        $("side1").textContent = "";
        $("email").style.boxShadow = "2px 2px 5px #768998 inset";
        email = true;
    } else if (!text.includes("@")) {
        $("side1").textContent = "Input not in email format";
        $("email").style.boxShadow = "2px 2px 5px red inset";
        email = false;
    } else {
        $("side1").textContent = "";
        $("email").style.boxShadow = "2px 2px 5px #768998 inset";
        email = true;
    }
    bothEmpty();
    submitCheck();

}

var bothEmpty = function() {
    var text = $("email").value;
    var text2 = $("name").value;
    if (text.length > 0 || text2.length > 0) {
        $("side3").textContent = "";
        filled = true;
    } else {
        $("side3").textContent = "Either or both fields to be edited are not filled in";
        filled = false;
    }
}

var submitCheck = function() {
    if (email && passW && filled) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("pass").onblur = checkP;
    $("email").onblur = checkM;
}