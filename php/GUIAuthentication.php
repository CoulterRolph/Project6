<?php
// GUIAuthentication.php

// Start the session to manage user authentication state
session_start();

// Check if the user is authenticated
header('Content-Type: application/json');

// If the user is authenticated, return their session data
echo json_encode([
    'authenticated' => isset($_SESSION['username']),
    'session' => $_SESSION
]);
?>