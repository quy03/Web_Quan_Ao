<?php
    session_start();
    
    function isLoggedIn() {
        return isset($_SESSION["email"]);
    }
    
    if (isLoggedIn()) {
        include("./screen_login.php");
        if (isset($_GET["act"]) && $_GET["act"] == "logout") {
            session_destroy();
            // Ngăn chặn trình duyệt lưu trữ cache
            header("Cache-Control: no-cache, must-revalidate");
    
            // Chuyển hướng đến trang logout
            echo '<script>window.location.href = "screen_logout.php";</script>';
            exit();
        }
    }
    else{
        include('./screen_logout.php');
    }
?>