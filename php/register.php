<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=elevatorCSD', 'user', 'password');
        $stmt = $db->prepare("INSERT INTO authorizedUsers (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
        header("Location: ../register.html?success=added");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry
            header("Location: ../register.html?error=duplicate");
            exit();
        } else {
            header("Location: ../register.html?error=unknown");
            exit();
        }
    }
}
?>