// js/LoadEvent.js
// This script sets up an event listener to focus on the username input field when the page loads.

// Function to set focus on the username input field
function setup() 
{
    var textInput;
    textInput = document.getElementById('username');
    textInput.focus();
}

// Add event listener for the load event to call the setup function
window.addEventListener('load', setup, false);