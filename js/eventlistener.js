//ID's used in login.html
var elUsername = document.getElementById('user'); 
var elPassword = document.getElementById('pass'); 
var elUsernameMsg = document.getElementById('userfeedback'); 
var elPasswordMsg = document.getElementById('passwordfeedback');
var elLogin = document.getElementById('login'); 

var mincharacters = 7; // Minimum length of input (7)


// Check Username function
function checkUsername(minlength) {   // Function with parameter for min length
  if(elUsername.value.length < minlength && elUsername.value.length > 0) {
    elUsernameMsg.innerHTML = 'min ' + minlength.toString() + ' characters';
  } else if (elUsername.value.length >= minlength){
    elUsernameMsg.innerHTML = 'Username: OK'; // OK message
  } else {
    elUsernameMsg.innerHTML = ''; // Clear any previous error message
  }
}

// Functions to call
function checkPassword(minlength) {   // Function with parameter for min length
  if(elPassword.value.length < minlength && elPassword.value.length > 0) {
    elPasswordMsg.innerHTML = 'min ' + minlength.toString() + ' characters';
  } else if (elPassword.value.length >= minlength){
    elPasswordMsg.innerHTML = 'Password: OK'; // Password correct
  } else {
    elPasswordMsg.innerHTML = ''; // Clear any previous errors
  }
}

function checkInputs(event) {
  if ((elUsernameMsg.innerHTML != 'Username: OK') || (elPasswordMsg.innerHTML != 'Password: OK')) {
    event.preventDefault();  // Do not allow submission of the form if Username and Password are not OK
  }
}
elUsername.addEventListener('blur', function() {checkUsername(mincharacters)}, false);      // Function to call event listener for Username
elPassword.addEventListener('blur', function(event){checkPassword(mincharacters)}, false);  // Function to call event listener for Password
elLogin.addEventListener('submit', function(event) {checkInputs(event), false});            // Do not allow submission of login if Username and password do not meet the intended requirements