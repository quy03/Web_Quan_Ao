<?php
    session_start();
    
    function isLoggedIn() {
        return isset($_SESSION["email"]);
    }
    
    if (isLoggedIn()) {
        include("./menu_login.php");
    } else {
        include("./menu_logout.php");
    }
    // Kiểm tra nếu người dùng đăng xuất
    // if ($_GET["act"] == "out") {
    //     session_destroy();
    //     header("location:screen_logout.php");
    //     exit();
    // }
    switch($_GET["act"]){
        case "main_page":
            include("./main_page.php");
            break;

        case "register":
            include("./register.php");
            break;

        case "account":
            include("./info_account.php");
            break;

        default:
            include("./main_page.php");
            break;
    };
    
    include("./footer.php");
?>