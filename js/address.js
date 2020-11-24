var l1 = false;
var ci = false;
var st = false;
var zip = false;


var $ = function(id) {
    return document.getElementById(id);
};

var checkL1 = function() {
    var text = $("address-line1").value;

    if (text.length == 0) {
        $("side1").textContent = "This field cannot be left empty";
        $("address-line1").style.boxShadow = "2px 2px 5px red inset";
        l1 = false;
    } else {
        $("side1").textContent = "";
        $("address-line1").style.boxShadow = "2px 2px 5px #768998 inset";
        l1 = true;
    }
    submitCheck();
}

var checkC = function() {
    var text = $("city").value;

    if (text.length == 0) {
        $("side2").textContent = "This field cannot be left empty";
        $("city").style.boxShadow = "2px 2px 5px red inset";
        ci = false;
    } else {
        $("side2").textContent = "";
        $("city").style.boxShadow = "2px 2px 5px #768998 inset";
        ci = true;
    }
    submitCheck();
}

var checkS = function() {
    var text = $("state").value;

    if (text.length == 0) {
        $("side3").textContent = "This field cannot be left empty";
        $("state").style.boxShadow = "2px 2px 5px red inset";
        st = false;
    } else {
        $("side3").textContent = "";
        $("state").style.boxShadow = "2px 2px 5px #768998 inset";
        st = true;
    }
    submitCheck();
}

var checkZ = function() {
    var text = $("postal-code").value;

    if (text.length == 0) {
        $("side4").textContent = "This field cannot be left empty";
        $("postal-code").style.boxShadow = "2px 2px 5px red inset";
        zip = false;
    } else if (isNaN(text)) {
        $("side4").textContent = "Zip Code needs be a number";
        $("postal-code").style.boxShadow = "2px 2px 5px red inset";
        zip = false;
    } else if (text.length != 5) {
        $("side4").textContent = "Zip Code needs 5 digits";
        $("postal-code").style.boxShadow = "2px 2px 5px red inset";
        zip = false;
    } else {
        $("side4").textContent = "";
        $("postal-code").style.boxShadow = "2px 2px 5px #768998 inset";
        zip = true;
    }
    submitCheck();

}

var submitCheck = function() {
    if (zip && st && l1 && ci) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("address-line1").onblur = checkL1;
    $("city").onblur = checkC;
    $("state").onblur = checkS;
    $("postal-code").onblur = checkZ;
}