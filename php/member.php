<?php   
// member.php
// This script checks if the user is authenticated and redirects them to the index page or prompts for login.

// Start the session
    session_start();

// Check if the user is authenticated
    if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
        
        // User is authenticated, redirect to index page
        header("Location: ..\index.html");
        exit();
    } else {    // User is not authenticated
        echo "<p>Please login here: <a href=\"..\login.html\">Login</a>.</p>";
    }
?>


