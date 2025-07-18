<?php
    // authentication.php

    // Start the session to store user information
    session_start(); 

    // Check if the form is submitted
    $username = $_POST['username'];
    $password = $_POST['password'];
    $authenticated = false;

    //setup database connection
    $db = NEW PDO('mysql:host=127.0.0.1;dbname=elevatorCSD', 'user', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Prepare and execute the SQL statement to fetch user data
    $stmt = $db->prepare("SELECT * FROM authorizedUsers WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    // Verify password using password_verify for hashing and authenticate
    if ($row && password_verify($password, $row['password'])) {
        $authenticated = true;
    }

    // Check if the user is authenticated
    if($authenticated)
    {
        // Store user information in session, redirect to Inside.html
        $_SESSION['username'] = $username;
        header("Location: ../Inside.html");
        exit();
    } else
    {
        // If authentication fails, redirect to login page with error
        header("Location: ../login.html?error=invalid");
        exit();
    }
?>