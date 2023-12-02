<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="css/product_details.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
    <title>NEW COLLECTION</title>
    <link rel="shortcut icon" href="image/Logo/main-logo.png" type="image/x-icon">
</head>

<body>
    <div class="fluid-container">
        <!-- body page -->
        <div class="container" style="margin: 200px auto 100px auto;">
            <div class="row">
                <div class="col-l col-md-6 col-sm-12 col-xs-12">
                    <div class="center">
                        <?php
                            require("config.php");
                            
                            $this_id = $_GET['id'];

                            $sql_movies = "SELECT *FROM tbl_product WHERE cate_id ='$this_id' ";
                            $result_movies = mysqli_query($conn, $sql_movies);

                            if (mysqli_num_rows($result_movies) > 0) {
                                while ($movies = mysqli_fetch_assoc($result_movies)) {
                                echo "<img src='" . $movies["intro_image"] . "' alt=''>";
                                }}
                    ?>
                    </div>

                </div>
                <div class="col-r col-md-6 col-sm-12 col-xs-12">
                    <img src="image/Logo/logo.webp" alt="">
                    <?php
                            require("config.php");
                            
                            $this_id = $_GET['id'];

                            $sql_movies = "SELECT *FROM tbl_product WHERE cate_id ='$this_id' ";
                            $result_movies = mysqli_query($conn, $sql_movies);

                            if (mysqli_num_rows($result_movies) > 0) {
                                while ($movies = mysqli_fetch_assoc($result_movies)) {
                                echo "<h1>". $movies["fullname"] .  "</h1>";
                                }
                            }
                    ?>
                    <div class="product-price">
                        <?php
                                require("config.php");
                                
                                $this_id = $_GET['id'];

                                $sql_movies = "SELECT *FROM tbl_product WHERE cate_id ='$this_id' ";
                                $result_movies = mysqli_query($conn, $sql_movies);

                                if (mysqli_num_rows($result_movies) > 0) {
                                    while ($movies = mysqli_fetch_assoc($result_movies)) {
                                    echo "<span class='pro-price'>". $movies["price"] .  "</span>";
                                    }
                                }
                        ?>
                    </div>
                    <h2>
                        <img src="https://file.hstatic.net/1000402464/file/icon_uu_dai_gioi_han_d251ce26add0478fbfe2a8caad7b10e2.png"
                            alt="">
                        ƯU ĐÃI GIỚI HẠN
                    </h2>
                    <p>
                        <img src="https://static.tmgfashion.vn/uploads/editor/22911913912482710189538453256448855090805583n_1658828009.png"
                            alt="">
                        <span>
                            <strong>
                                Khi thanh toán qua cổng VNPAY từ ngày 17/10 - 31/12/2023:
                            </strong><br>
                            <span>Nhập mã:</span>
                            <strong>
                                VNPAYJH
                            </strong>
                        </span><br>
                        <span style="color: black;">Giảm 30K cho hóa đơn từ 600,000
                        </span><br>
                        <span style="color: black;">Giảm 50K cho hóa đơn từ 1,200,000</span><br>
                        <span style="color: black;">Giảm 100K cho hóa đơn từ 3,000,000</span><br>
                    </p>
                    <div class="selector">
                        <label for="">Vui lòng chọn size:</label>
                        <br>
                        <select style="width: 200px;" name="" id="">
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="quantity">
                        <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                        <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
                        <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                    </div>
                    <div class="add_cart">
                        <button type="button" id="add-to-cart" class="add-to-cartProduct  btn-addtocart addtocart-modal"
                            name="add">Mua ngay</button>
                        <button type="button" id="add-to-cartnew" class="">
                            Thêm vào giỏ
                        </button>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>