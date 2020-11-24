Window.onload= () =>{

const form  = document.getElementById('card-form');

const check = document.getElementById('cvv');
const cvvError = document.querySelector('#cvv + span.error');

var cvv;
if (check != null) {
    cvv = check.value;
}

cvv.addEventListener('input', function (event) {
if (cvv.validity.valid) {
    cvvError.innerHTML = '';
    cvvError.className = 'error';
} 
else {
    showError();
}
});

form.addEventListener('submit', function (event) {
    
    if(!cvv.validity.valid) {
        showError();
        event.preventDefault();
    }
});

function showError() {
if(cvv.validity.valueMissing) {
    // If the field is empty
    // display the following error message.
    cvvError.textContent = 'You need to enter an e-mail address.';
} else if(cvv.validity.typeMismatch) {
    // If the field doesn't contain an cvv address
    // display the following error message.
    cvvError.textContent = 'Entered value needs to be an e-mail address.';
} else if(cvv.validity.tooShort) {
    // If the data is too short
    // display the following error message.
    cvvError.textContent = `cvv should be at least ${ cvv.minLength } characters; you entered ${ cvv.value.length }.`;
}

// Set the styling appropriately
cvvError.className = 'error active';
}
}
