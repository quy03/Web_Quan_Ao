<?php
    include("./menu_logout.php");
    switch($_GET["act"]){
        case "main_page":
            include("./main_page.php");
            break;

        case "new_collection":
            include("./new_collection.php");
            break;
            
        case "john_henry":
            include("./john_henry.php");
            break;
            
        case "freelancer":
            include("./freelancer.php");
            break;
            
        case "register":
            include("./register.php");
            break;

        case "account":
            include("./info_account.php");
            break;

        case "cart":
            include("./cart.php");
            break;

        default:
            include("./main_page.php");
            break;
    };
    include("./footer.php");
?>