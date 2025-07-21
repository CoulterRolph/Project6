
function handleUpClick(event) {
	event.preventDefault(); 

	const audio = document.getElementById('goingUp');
	audio.play();

	// Submit the form after a delay
	setTimeout(() => {
		event.target.closest('form').submit();
	}, 5000); // 1-second delay
}

function handleDownClick(event) {
	event.preventDefault();

	const audio = document.getElementById('goingDown');
	audio.play();

	setTimeout(() => {
		event.target.closest('form').submit();
	}, 5000);
}