var name = false;
var num = false;
var cvv = false;
var exp = false;


var $ = function(id) {
    return document.getElementById(id);
};

var checkN = function() {
    var text = $("name").value;

    if (text.length == 0) {
        $("side1").textContent = "This field cannot be left empty";
        $("name").style.boxShadow = "2px 2px 5px red inset";
        name = false;
    } else {
        $("side1").textContent = "";
        $("name").style.boxShadow = "2px 2px 5px #768998 inset";
        name = true;
    }
    submitCheck();
}

var checkNum = function() {
    var text = $("number").value;

    if (text.length == 0) {
        $("side2").textContent = "This field cannot be left empty";
        $("number").style.boxShadow = "2px 2px 5px red inset";
        num = false;
    } else if (text.length != 16) {
        $("side2").textContent = "Card Number needs to be 16 digits";
        $("number").style.boxShadow = "2px 2px 5px red inset";
        num = false;
    } else {
        if (!isNaN(text.substring(0, 4)) && !isNaN(text.substring(4, 8)) && !isNaN(text.substring(8, 12)) && !isNaN(text.substring(12))) {
            $("side2").textContent = "";
            $("number").style.boxShadow = "2px 2px 5px #768998 inset";
            num = true;
        } else {
            $("side2").textContent = "Must be a number";
            $("number").style.boxShadow = "2px 2px 5px red inset";
            num = false;
        }
    }
    submitCheck();
}

var checkC = function() {
    var text = $("cvv").value;

    if (text.length == 0) {
        $("side3").textContent = "This field cannot be left empty";
        $("cvv").style.boxShadow = "2px 2px 5px red inset";
        cvv = false;
    } else if (text.length < 3) {
        $("side3").textContent = "Must be at least 3 numbers";
        $("cvv").style.boxShadow = "2px 2px 5px red inset";
        cvv = false;
    } else if (isNaN(text)) {
        $("side3").textContent = "CVV needs be a number";
        $("cvv").style.boxShadow = "2px 2px 5px red inset";
        cvv = false;
    } else {
        $("side3").textContent = "";
        $("cvv").style.boxShadow = "2px 2px 5px #768998 inset";
        cvv = true;
    }
    submitCheck();
}

var checkEx = function() {
    var text = $("expiration").value;

    if (text.length == 0) {
        $("side4").textContent = "This field cannot be left empty";
        $("expiration").style.boxShadow = "2px 2px 5px red inset";
        exp = false;
    } else if (text.length != 5) {
        $("side4").textContent = "Expiration needs to be this format ##/##";
        $("expiration").style.boxShadow = "2px 2px 5px red inset";
        exp = false;
    } else if (!isNaN(text.substring(0, 2)) && !isNaN(text.substring(3)) && text.indexOf('/') == 2) {
        $yr = parseInt(text.substring(3));
        $mn = parseInt(text.substring(0, 2));
        if ($yr > 20 && $mn > 0 && $mn < 13) {
            $("side4").textContent = "";
            $("expiration").style.boxShadow = "2px 2px 5px #768998 inset";
            exp = true;
        } else if ($yr == 20 && $mn > 11 && $mn < 13) {
            $("side4").textContent = "";
            $("expiration").style.boxShadow = "2px 2px 5px #768998 inset";
            exp = true;
        } else {
            $("side4").textContent = "Expiration not valid";
            $("expiration").style.boxShadow = "2px 2px 5px red inset";
            exp = false;
        }
    } else {
        $("side4").textContent = "Expiration needs to be this format ##/##";
        $("expiration").style.boxShadow = "2px 2px 5px red inset";
        exp = false;
    }
    submitCheck();

}

var submitCheck = function() {
    if (name && num && cvv && exp) {
        $('submit').disabled = false;
    } else {
        $('submit').disabled = true;
    }
}


window.onload = function() {
    $("name").onblur = checkN;
    $("number").onblur = checkNum;
    $("cvv").onblur = checkC;
    $("expiration").onblur = checkEx;
}