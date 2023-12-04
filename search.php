<?php
    session_start();
    
    function isLoggedIn() {
        return isset($_SESSION["email"]);
    }
    
    if (isLoggedIn()) {
        include("./menu_login.php");
        if (isset($_GET["act"]) && $_GET["act"] == "logout") {
            session_destroy();
            // Ngăn chặn trình duyệt lưu trữ cache
            header("Cache-Control: no-cache, must-revalidate");
    
            // Chuyển hướng đến trang logout
            echo '<script>window.location.href = "./screen_logout.php";</script>';
            exit();
        }
    }
    else{
        include('./menu_logout.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/new_collection.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <title></title>
    <link rel="shortcut icon" href="./image/Logo/main-logo.png" type="image/x-icon">

</head>

<body>
    <div class="fluid-container">
        <!-- body page -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="collection-wrap">
                        <h1>KẾT QUẢ TÌM KIẾM </h1>
                    </div>

                    <div class="row">
                        <?php
                                if(isset($_GET["search_product"])){
                                    $name_product = $_GET["search"];
                                    $sql_search = "select * from tbl_product where fullname like '%".$name_product."%'";
                                    $result_search = mysqli_query($conn, $sql_search);
                                        if(mysqli_num_rows($result_search) > 0){
                                            while ($movies = mysqli_fetch_assoc($result_search)){
                                                echo"<div class='col-md-3 col-sm-6 col-xs-6 pro-loop col-5'>";
                                                    echo "<div class='product-img'>";
                                                    echo "<a href='index.php?product_details.php?task=update&id=".$movies["cate_id"]."'>";
                                                            echo "<img src='" . $movies["intro_image"] . "' alt=''>";
                                                            echo "</img>";
                                                        echo"</a>";
                                                    echo "</div>";
                                                    echo"<div class ='product-detail'>";
                                                        echo"<div class ='box-pro-detail'>";
                                                            echo"<div class ='box-pro-prices'>";
                                                                echo "<p class='pro-price'>" ;
                                                                    echo "<a href='./product_details.php' style='text-decoration: none';>";
                                                                        echo"<span>" . $movies['price']. "</span>" ;
                                                                    echo"</a>";
                                                                echo"</p>";
                                                                echo"<h3 class='pro-name'>" ;
                                                                    echo "<a href='./product_details.php' style='font-size: 17px';>" . $movies['fullname'] . "</a>";
                                                                echo "</h3>";
                                                            echo "</div>";
                                                        echo"</div>";
                                                    echo"</div>";
                                                echo"</div>";  
                                            }
                                        }
                                
                                }
                                else
                                {
                                    echo "Ban khong chua du lieu";
                                }
                            ?>
                        <div class="sortpagibar pagi clearfix text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
    include("./footer.php");
?>