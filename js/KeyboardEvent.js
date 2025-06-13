var el;
function charCount(e) 
{
    var textEntered, charDisplay, counter, lastkey;
    textEntered = document.getElementById('message').value;
    charDisplay = document.getElementById('charactersLeft');
    lastkey = document.getElementById('lastkey');

    counter = 180 - textEntered.length;

    if (counter <= 0 && e.key.length === 1) {
        charDisplay.innerHTML = 'Max characters exceeded';
        e.preventDefault(); // Prevent further input if desired
    } else {
        charDisplay.innerHTML = 'Characters Remaining: ' + counter;
    }
    lastkey.innerHTML = 'Last Key Pressed: ' + String.fromCharCode(e.keyCode);
}

document.addEventListener('DOMContentLoaded', function() {
    var el = document.getElementById('message');
    if (el) {
        el.addEventListener('keypress', charCount, false);
    }
});