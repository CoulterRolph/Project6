<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $authenticated = false;

    $db = NEW PDO('mysql:host=127.0.0.1;dbname=elevatorCSD', 'user', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $db->prepare("SELECT * FROM authorizedUsers WHERE username = ?");
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    // Verify password using password_verify
    if ($row && password_verify($password, $row['password'])) {
        $authenticated = true;
    }

    if($authenticated)
    {
        $_SESSION['username'] = $username;
        //echo "<p>Sucessfully logged into site</p>";
        //echo "Please click <a href=\"member.php\">here</a> to continue to members only page.";
        header("Location: ../Inside.html");
        exit();
    } else
    {
        header("Location: ../login.html?error=invalid");
        exit();
    }
?>