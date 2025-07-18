<?php
// register.php

// Manage user registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Setup database connection
        $db = new PDO('mysql:host=127.0.0.1;dbname=elevatorCSD', 'user', 'password');
        $stmt = $db->prepare("INSERT INTO authorizedUsers (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
        // Redirect to register page with success message
        header("Location: ../register.html?success=added");
        exit();
    } catch (PDOException $e) {
        // Handle errors, such as duplicate entries
        if ($e->getCode() == 23000) { // Duplicate entry
            // Redirect to register page with error message
            header("Location: ../register.html?error=duplicate");
            exit();
        } else {
            header("Location: ../register.html?error=unknown");
            exit();
        }
    }
}
?>