<?php
    session_start();

    $valid_username = "admin";
    $valid_password = "12345";


    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if($username === $valid_username && $password === $valid_password)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        //echo "<p>Sucessfully logged into site</p>";
        //echo "Please click <a href=\"member.php\">here</a> to continue to members only page.";
        header("Location: member.php");
        exit();
    } else
    {
        header("Location: ..\login.html?error=invalid");
        exit();
    }
?>