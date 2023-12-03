<?php
    require("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="/css/style.css"> -->
    <link rel="stylesheet" href="css/new_collection.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <title>FREELANCER</title>
    <link rel="shortcut icon" href="image/Logo/main-logo.png" type="image/x-icon">
    <style>
    .sortpagibar {
        font-family: Arial, sans-serif;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }

    .sortpagibar a,
    .sortpagibar span {
        padding: 5px 10px;
        margin: 0 2px;
        text-decoration: none;
        color: black;
        border: 1px solid #611E1E;
        border-radius: 3px;
    }

    .sortpagibar a:hover {
        background-color: #ddd;
    }

    .sortpagibar span {
        background-color: #611E1E;
        color: white;
        cursor: default;
    }
    </style>

</head>

<body>
    <div class="fluid-container">
        <!-- body page -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="collection-wrap">
                        <h1>FREELANCER</h1>
                    </div>

                    <div class="row">
                        <?php
                                $product= 17;
                                $result = mysqli_query($conn, "select count(product_id) as total from tbl_product where product_id = $product");
                                $row = mysqli_fetch_assoc($result);
                                $total_records = $row['total'];
                                
                                
                                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $limit = 8;

                                
                                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                                // tổng số trang
                                $total_page = ceil($total_records / $limit);

                                if ($current_page > $total_page){
                                    $current_page = $total_page;
                                }
                                else if ($current_page < 1){
                                    $current_page = 1;
                                }

                                
                                // Tìm Start
                                $start = ($current_page - 1) * $limit;


                                $category_id = 17;
                                $sql_movie = "SELECT * FROM tbl_product WHERE product_id = $category_id  ORDER BY product_id DESC LIMIT $start,$limit ";
                                $result_movies = mysqli_query($conn, $sql_movie);
                
                                if (mysqli_num_rows($result_movies) > 0) {
                                    while ($movies = mysqli_fetch_assoc($result_movies)) {
                                        echo"<div class='col-md-3 col-sm-6 col-xs-6 pro-loop col-5'>";
                                            echo "<div class='product-img'>";
                                            echo "<a href='product_details.php?task=update&id=".$movies["cate_id"]."'>";
                                                    echo "<img style='height:459px' src='" . $movies["intro_image"] . "' alt=''>";
                                                    echo "</img>";
                                                echo"</a>";
                                            echo "</div>";
                                            echo"<div class ='product-detail'>";
                                                echo"<div class ='box-pro-detail'>";
                                                    echo"<div class ='box-pro-prices'>";
                                                        echo "<p class='pro-price'>" ;
                                                            echo "<a href='href='product_details.php?task=update&id=".$movies["cate_id"]."' style='text-decoration: none';>";
                                                                echo"<span>" . $movies['price'].'<span>đ</spam>'. "</span>" ;
                                                            echo"</a>";
                                                        echo"</p>";
                                                        echo"<h3 class='pro-name'>" ;
                                                            echo "<a  href='product_details.php?task=update&id=".$movies["cate_id"]."' style='font-size: 26px';>" . $movies['fullname'] . "</a>";
                                                        echo "</h3>";
                                                    echo "</div>";
                                                echo"</div>";
                                            echo"</div>";
                                        echo"</div>";  
                                    }
                                }
                            ?>
                        <div class="sortpagibar pagi clearfix text-center">
                            <?php 
                                        // PHẦN HIỂN THỊ PHÂN TRANG
                                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                
                                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if ($current_page > 1 && $total_page > 1){
                                            echo '<a href="freelancer.php?page='.($current_page-1).'">Truoc</a>  ';
                                        }
                                        
                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++){
                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                            // ngược lại hiển thị thẻ a
                                            if ($i == $current_page){
                                                echo '<span>'.$i.'</span>  ';
                                            }
                                            else{
                                                echo '<a href="freelancer.php?page='.$i.'">'.$i.'</a>  ';
                                            }
                                        }
                                        
                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1){
                                            echo '<a href="freelancer.php?page='.($current_page+1).'">Sau</a>  ';
                                        }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>