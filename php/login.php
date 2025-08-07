<?php
// login.php
// This script handles user login and displays submitted form data.

// Enable error reporting for debugging
$submitted = !empty($_POST);
?>


<!DOCTYPE html>
<html>
	<!-- login.php -->
	<!-- This page displays the submitted login form data. -->
	<head><title>Form Handler Page</title></head>
	<body>
		<p>Form submitted? <?php echo (int) $submitted; ?></p>
		<p>Your login info is</p>
		<ul>
			<li><b>username</b>: <?php echo $_POST['username']; ?></li>
			<li><b>password</b>: <?php echo $_POST['password']; ?></li>
		</ul>
	</body>
</html>
