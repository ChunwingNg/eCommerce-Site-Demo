var userN = false;
var passW = false;
var passWC = false;
var email = false;

var regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;



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
        passW = false;
    } else if (text.length > 25 || text.length < 6) {
        $("side2").textContent = "Password needs to be between 6 to 25 characters";
        $("pass").style.boxShadow = "2px 2px 5px red inset";
        passW = false;
    } else if (!regex.test(text)) {
        $("side2").textContent = "Password requires at least one special character";
        $("pass").style.boxShadow = "2px 2px 5px red inset";
        passW = false;
    } else {
        $("side2").textContent = "";
        $("pass").style.boxShadow = "2px 2px 5px #768998 inset";
        passW = true;
    }
    checkCP();
}

var checkCP = function() {
    var text = $("pass").value;
    var text2 = $("confirmPass").value;

    if (text.localeCompare(text2) == 0) {
        $("side3").textContent = "";
        $("confirmPass").style.boxShadow = "2px 2px 5px #768998 inset";
        passWC = true;
    } else {
        $("side3").textContent = "Passwords do not match";
        $("confirmPass").style.boxShadow = "2px 2px 5px red inset";
        passWC = false;
    }
    submitCheck();
}

var checkM = function() {
    var text = $("email").value;

    if (!text.includes("@")) {
        $("side4").textContent = "Input not in email format";
        $("email").style.boxShadow = "2px 2px 5px red inset";
        email = false;
    } else {
        $("side4").textContent = "";
        $("email").style.boxShadow = "2px 2px 5px #768998 inset";
        email = true;
    }
    submitCheck();

}

var submitCheck = function() {
    if (email && passWC && passW && userN) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("user").onblur = checkN;
    $("pass").onblur = checkP;
    $("confirmPass").onblur = checkCP;
    $("email").onblur = checkM;
}