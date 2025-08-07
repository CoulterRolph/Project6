// js/audio.js
// This script handles audio playback for elevator actions and form submission delays.

// Add event listeners to the buttons for playing audio and submitting the up form
function handleUpClick(event) {
	event.preventDefault(); 

	const audio = document.getElementById('goingUp');
	audio.play();

	// Submit the form after a delay
	setTimeout(() => {
		event.target.closest('form').submit();
	}, 5000); // 1-second delay
}

// Add event listeners to the buttons for playing audio and submitting the down form
function handleDownClick(event) {
	event.preventDefault();

	const audio = document.getElementById('goingDown');
	audio.play();

	setTimeout(() => {
		event.target.closest('form').submit();
	}, 5000);
}