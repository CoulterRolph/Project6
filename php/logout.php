<?php   
session_start();
session_destroy();
echo "<p>You have been logged out, Click here to <a href=\"..\login.html\">Login</a>.</p>";
?>