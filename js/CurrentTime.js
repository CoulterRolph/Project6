// js/CurrentTime.js
// This script displays the current date and time on the webpage.

// Get the current date and time
var today = new Date();
var date = today.toDateString();
var time = today.toTimeString();

// Format the date and time for display
var date_n_time = '<h4>' + date + ' : ' + time + '</h4>';

// Write the formatted date and time to the document
document.write(date_n_time);