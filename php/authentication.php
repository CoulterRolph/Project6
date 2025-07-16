<?php
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $authenticated = false;

    $db = NEW PDO('mysql:host=127.0.0.1;dbname=elevatorCSD', 'user', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = "SELECT * FROM authorizedUsers WHERE username = '$username'";
    $rows = $db->query($query);
    foreach ($rows as $row)
    {
        echo $row['username'];
        if($username === $row['username'] && $password === $row['password']){
            $authenticated = true;
        }
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