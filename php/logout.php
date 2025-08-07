<?php
// logout.php
// This script handles user logout by destroying the session and redirecting to the login page.

// Start the session and destroy it
session_start();
session_destroy();
header("Location: ../login.html?success=logout");
exit();
?>