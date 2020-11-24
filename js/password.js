var oldP = false;
var newP = false;
var newPC = false;

var regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;



var $ = function(id) {
    return document.getElementById(id);
};

var checkN = function() {
    var text = $("old").value;

    if (text.length == 0) {
        $("side1").textContent = "This field cannot be left empty";
        $("old").style.boxShadow = "2px 2px 5px red inset";
        oldP = false;
    } else {
        $("side1").textContent = "";
        $("old").style.boxShadow = "2px 2px 5px #768998 inset";
        oldP = true;
    }
    submitCheck();
}

var checkNP = function() {
    var text = $("new").value;

    if (text.length == 0) {
        $("side2").textContent = "This field cannot be left empty";
        $("new").style.boxShadow = "2px 2px 5px red inset";
        newP = false;
    } else if (text.length > 25 || text.length < 6) {
        $("side2").textContent = "Password needs to be between 6 to 25 characters";
        $("new").style.boxShadow = "2px 2px 5px red inset";
        newP = false;
    } else if (!regex.test(text)) {
        $("side2").textContent = "Password requires at least one special character";
        $("new").style.boxShadow = "2px 2px 5px red inset";
        newP = false;
    } else {
        $("side2").textContent = "";
        $("new").style.boxShadow = "2px 2px 5px #768998 inset";
        newP = true;
    }
    checkCP();
}

var checkCP = function() {
    var text = $("new").value;
    var text2 = $("newC").value;

    if (text.localeCompare(text2) == 0) {
        $("side3").textContent = "";
        $("newC").style.boxShadow = "2px 2px 5px #768998 inset";
        newPC = true;
    } else {
        $("side3").textContent = "Passwords do not match";
        $("newC").style.boxShadow = "2px 2px 5px red inset";
        newPC = false;
    }
    submitCheck();
}


var submitCheck = function() {
    if (oldP && newP && newPC) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("old").onblur = checkN;
    $("new").onblur = checkNP;
    $("newC").onblur = checkCP;

}