<?php   
    session_start();

    if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
        
        header("Location: ..\index.html");
        exit();
    } else {
        echo "<p>Please login here: <a href=\"..\login.html\">Login</a>.</p>";
    }
?>