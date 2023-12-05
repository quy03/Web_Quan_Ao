<?php
 require("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=" stylesheet " href="./css/main_page.css ">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/app.js"></script>
    <title>Shop quần áo</title>
    <link rel="shortcut icon" href="./image/Logo/main-logo.png" type="image/x-icon">
    <style>
    .sortpagibar {
        margin-top: 50px;
        margin-bottom: 50px;
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
        <!-- slide -->
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/slide/slide1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/slide/slide2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/slide/slide3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container">
            <!-- product-1 -->
            <div class="row product ">
                <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                    <!-- hàng 1 -->
                    <div class="row row1 ">
                        <div class="col-4 col-md-4 col-sm-4 col-xl-4">
                            <a href=" ">
                                <img src="./image/sp_index/product1.webp " alt=" ">
                            </a>
                        </div>
                        <div class="col-4 col-md-4 col-sm-4 col-xl-4">
                            <a href=" ">
                                <img src="./image/sp_index/product2.webp " alt=" ">
                            </a>
                        </div>
                        <div class="col-4 col-md-4 col-sm-4 col-xl-4">
                            <a href=" ">
                                <img src="./image/sp_index/product3.webp " alt=" ">
                            </a>
                        </div>
                    </div>
                    <!-- hàng 2 -->
                    <div class="row row2 ">
                        <div class="col-6 col-md-6 col-sm-12 col-xl-6">
                            <div class="row ">
                                <div class='row hang_1'>
                                    <?php
                                        $result = mysqli_query($conn, 'select count(cate_id) as total from tbl_product');
                                        $row = mysqli_fetch_assoc($result);
                                        $total_records = $row['total'];
                                        
                                        
                                        // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                        $limit = 4;
        
                                        
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
                                        $sql_movie = "SELECT * FROM tbl_product WHERE product_id ORDER BY cate_id DESC LIMIT $start,$limit ";
                                        $result_movies = mysqli_query($conn, $sql_movie);
                                        if(mysqli_num_rows($result_movies) > 0){
                                            while($movies = mysqli_fetch_assoc($result_movies)){
                                                echo"<div class='col-6 col-md-6 col-sm-6 col-xl-6 left-product '>";
                                                    echo"<div class='product-block '>";
                                                        echo"<div class='product-img '>";
                                                            echo"<a href='product_details.php?task=update&id=".$movies["cate_id"]."'>";
                                                                echo "<img style='height: 459px' src='" . $movies["intro_image"] . "' alt=''>";
                                                                echo "</img>";
                                                            echo"</a>";
                                                        echo"</div>";
                                                        echo"<div class='product-detail '>";
                                                            echo"<div class='box-pro-prices '>";
                                                                echo"<p class='pro-price '>";
                                                                    echo"<a href='product_details.php?task=update&id=".$movies["cate_id"]."' style='color: #820012;'>";
                                                                        echo"<span>". $movies['price'] ."</span>";
                                                                    echo"</a>";
                                                                echo"</p>";
                                                            echo"</div>";
                                                            echo"<h6 class='pro-name '>";
                                                                echo"<a href='product_details.php?task=update&id=".$movies["cate_id"]."'>";
                                                                    echo"<span style='color:black;' class='truncate-text '>". $movies['fullname'] ."</span>";
                                                                echo"</a>";
                                                            echo"</h6>";
                                                        echo"</div>";
                                                    echo"</div>";
                                                echo"</div>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12 col-xl-6">
                            <a href="index.php?act=new_collection">
                                <img style="height: 90%" src=" ./image/sp_index/product8.webp " alt=" ">
                            </a>
                        </div>
                    </div>

                    <div class=" sortpagibar pagi clearfix text-center">
                        <?php 
                                        // PHẦN HIỂN THỊ PHÂN TRANG
                                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                
                                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if ($current_page > 1 && $total_page > 1){
                                            echo '<a href="index.php?page='.($current_page-1).'">Truoc</a>  ';
                                        }
                                        
                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++){
                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                            // ngược lại hiển thị thẻ a
                                            if ($i == $current_page){
                                                echo '<span>'.$i.'</span>  ';
                                            }
                                            else{
                                                echo '<a href="index.php?page='.$i.'">'.$i.'</a>  ';
                                            }
                                        }
                                        
                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                        if ($current_page < $total_page && $total_page > 1){
                                            echo '<a href="index.php?page='.($current_page+1).'">Sau</a>  ';
                                        }
                                ?>
                    </div>
                    <!-- mô tả sản phẩm -->
                    <div class="row ">
                        <div class="col-6 col-md-6 col-sm-12 col-xl-6 ">
                            <div class="motasanphamlon ">
                                <a href="# ">
                                    <img style="margin-bottom: 10px;" src="./image/sp_index/product9.webp " alt=" ">
                                </a>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-sm-12 col-xl-6 ">
                            <div class="motasanphamnho ">
                                <div class="row ">
                                    <div class="col-6 col-md-6 col-sm-6 col-xl-6  p1 ">
                                        <a href=" ">
                                            <img src="./image/sp_index/product10.webp " alt=" ">
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-xl-6  p1 ">
                                        <a href=" ">
                                            <img src="./image/sp_index/product11.webp " alt=" ">
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-xl-6  p1 ">
                                        <a href=" ">
                                            <img src="./image/sp_index/product12.webp " alt=" ">
                                        </a>
                                    </div>
                                    <div class="col-6 col-md-6 col-sm-6 col-xl-6  p1 ">
                                        <a href=" ">
                                            <img src="./image/sp_index/product13.webp " alt=" ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nhóm sản phẩm -->
                    <div class="container ">
                        <!-- logo -->
                        <div class="logo-center ">
                            <img src="./image/logo/logo_freelancer.png " alt=" ">
                        </div>
                        <!-- text -->
                        <div class="text-center ">
                            <p class="text ">
                                Với thiết kế đơn giản nhưng tinh tế, đồng thời trang phục Freelancer mang đến cho
                                người
                                mặc những ưu điểm vượt bậc: . Được tạo kiểu để khéo léo che đi những khuyết điểm
                                trên cơ
                                thể . Có thể mix-match biến hóa nhiều kiểu mặc chỉ từ những items quen thuộc
                                . Luôn thời trang và không bao giờ lỗi mốt . Giá hợp lý cho sản phẩm chất lượng
                                tuyệt
                                vời . Tiết kiệm thời gian trong việc giặt ủi, phối đồ, cực dễ mặc và phù hợp với mọi
                                phong cách Một Freelancer HOÀN TOÀN MỚI đang chờ
                                bạn khám phá!
                            </p>
                        </div>
                        <!-- sản phẩm -->
                        <div id="san_pham" class="row ">
                            <div class="col-12 col-md-12 col-sm-12 col-xl-12 ">
                                <div class="motasanphamnho2 ">
                                    <div class="row ">
                                        <div class="col-sm-3 col-md-3 col-xs-6 ">
                                            <span class="an_tren1 motasanpham ">
                                                <span>ÁO BLOSE</span>
                                            </span>
                                            <a href=" ">
                                                <img src="./image/sp_index/product14.webp " alt=" ">
                                            </a>
                                            <span class="an_duoi1 motasanpham ">
                                                <span>ÁO BLOSE</span>
                                            </span>
                                        </div>
                                        <div class="col-sm-3 col-md-3 nguoc_lai col-xs-6 ">
                                            <span class="an_tren2 motasanpham ">
                                                <span>ÁO SƠ MI</span>
                                            </span>
                                            <a href=" ">
                                                <img src="./image/sp_index/product15.webp " alt=" ">
                                            </a>
                                            <span class="an_duoi2 motasanpham ">
                                                <span>ÁO SƠ MI</span>
                                            </span>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-xs-6 ">
                                            <span class="an_tren3 motasanpham ">
                                                <span>CHÂN VÁY</span>
                                            </span>
                                            <a href=" ">
                                                <img src="./image/sp_index/product16.webp " alt=" ">
                                            </a>
                                            <span class="an_duoi3 motasanpham">
                                                <span>CHÂN VÁY</span>
                                            </span>
                                        </div>
                                        <div class="col-sm-3 col-md-3 nguoc_lai col-xs-6 ">
                                            <span class="an_tren4 motasanpham ">
                                                <span>ÁO BLAZER</span>
                                            </span>
                                            <a href=" ">
                                                <img src="./image/sp_index/product17.webp " alt=" ">
                                            </a>
                                            <span class="an_duoi4 motasanpham ">
                                                <span>ÁO BLAZER</span>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- hệ thông của hàng -->
        <div id="htch" class=" hethongcuahang ">
            <div class=" container ">
                <div class=" row ">
                    <div class=" col-md-12 ">
                        <div class=" motahethong ">
                            <div class=" row ">
                                <div class=" col-md-6 ">
                                    <div class=" text ">
                                        <h3>Hệ Thống Cửa Hàng</h3>
                                        <div class=" doanvan ">
                                            Hiện nay thương hiệu JOHN HENRY & FREELANCER đã có mặt tại hầu hết các
                                            tỉnh,
                                            thành phố trên toàn quốc. Không gian mua sắm thời trang hàng hiệu đẳng
                                            cấp,
                                            sang trọng nhưng cũng không kém phần thoải mái, tiện nghi là điều quý
                                            khách
                                            hàng sẽ cảm nhận được
                                            khi ghé thăm bất cứ cửa hàng nào của JOHN HENRY.
                                        </div>
                                        <div class=" text-center ">
                                            <a href=" " class=" cuahanglink ">ĐỊA CHỈ CỬA HÀNG </a>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6 ">
                                    <div class=" myvideo ">
                                        <iframe width=" 100% " height=" 354 "
                                            src=" https://www.youtube.com/embed/j69-bfQgBms "
                                            title=" JOHN HENRY - TOP 10 Thương Hiệu Mạnh Quốc Gia 2023 " frameborder="
            0 " allow=" accelerometer; autoplay; clipboard-write; encrypted-media;
            gyroscope; picture-in-picture; web-share " allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>