// js/reqEventListener.js
// This script handles form validation for the request access form.

// Get the form and input elements						
var reqaccess = document.getElementById('reqaccess');

// Feedback declerations
var fnameFeedback = document.getElementById('fnameFeedback'); 
var lnameFeedback = document.getElementById('lnameFeedback'); 
var emailFeedback = document.getElementById('emailFeedback'); 
var birthdateFeedback = document.getElementById('birthdateFeedback'); 
var facultyFeedback = document.getElementById('facultyFeedback'); 
var studentFeedback = document.getElementById('studentFeedback'); 


// Input declerations
var fname = document.getElementById('fname'); 
var lname = document.getElementById('lname'); 
var email = document.getElementById('email'); 
var birthday = document.getElementById('birthday'); 
var faculty = document.getElementById('faculty'); 
var student = document.getElementById('student'); 

// Function to check if the birthdate is filled out
function checkFirstName(event) {
	if (fname.value.length < 1) {
		fnameFeedback.innerHTML = 'You must fill out the field above';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		fnameFeedback.innerHTML = '';		// Clear any error messages
	}
}function checkLastName(event) {
	if (lname.value.length < 1) {
		lnameFeedback.innerHTML = 'You must fill out the field above';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		lnameFeedback.innerHTML = '';		// Clear any error messages
	}
}function checkEmail(event) {
	if (email.value.length < 1) {
		emailFeedback.innerHTML = 'You must fill out the field above';
		event.preventDefault();					// Do not submit the form (submit == default)
	} else {
		emailFeedback.innerHTML = '';		// Clear any error messages
	}
}


reqaccess.addEventListener('submit', function(event) {checkFirstName(event);checkLastName(event);checkEmail(event);checkBrithdate(event);}, false); 