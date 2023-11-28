<?php
    // Kết nối đến cơ sở dữ liệu MySQL
    require("./config.php");

    if(isset($_POST["insert"])){
        // lấy giá trị từ ô nhập liệu
        // $username = $_POST["username"];
        $full_name = $_POST["full_name"];
        $gender = $_POST["gender"];
        $date_of_birth = $_POST["date_of_birth"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["fill_password"];
        $confirm_password = $_POST["confirm_password"];

        if ($password !== $confirm_password) {
            echo "Mật khẩu và xác nhận mật khẩu không khớp.";
        }
        else{
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Tạo truy vấn SQL để chèn dữ liệu vào bảng người dùng
            $sql = "INSERT INTO users (full_name, gender, date_of_birth, phone, email, password) VALUES ('$full_name', '$gender', '$date_of_birth', '$phone', '$email', '$hashed_password')";
            if(mysqli_query($conn, $sql)){
                header("location:index.php");
                echo "Đăng ký thành công!";
            }
            else{
                echo "Đăng ký thất bại: " . $conn->error;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>
    <title>Tạo tài khoản</title>
    <link rel="shortcut icon" href="/image/Logo/main-logo.png" type="image/x-icon">
</head>

<body>
    <div class="fluid-container">
        <!-- header -->
        <div id="fixed-menu">
            <div class="header row">
                <div class="center col-md-12 col-sm-12 col-xl-12 col-12">
                    <img src="./image/logo/chuong.webp" alt="">
                    <a href="../index.html">MIỄN PHÍ VẬN CHUYỂN VỚI HÓA ĐƠN TỪ 299K</a>
                </div>
            </div>
            <!-- responsive_mobile -->
            <div class="container-fluid" id="res_mobile">
                <div class="menu row">
                    <div id="toggle" class="col-2 col-md-2 col-sm-2 col-xl-2">
                        <i id="toggle" class="bi bi-list"></i>
                    </div>

                    <div class="logo col-7 col-md-7 col-sm-7 col-xl-7">
                        <a href="../index.html">
                            <img src="../image/Logo/logo.webp" alt="logo">
                        </a>
                    </div>
                    <div class="col-3 col-md-3 col-sm-3 col-xl-3">
                        <div class="icon row">
                            <div class="search-icon col-4 col-md-4 col-sm-4 col-xl-4" id="search">
                                <i class="bi bi-search"></i>
                            </div>
                            <div class="login col-4 col-md-4 col-sm-4 col-xl-4" id="login">
                                <i class="bi bi-person-circle "></i>
                            </div>
                            <div class="cart col-4 col-md-4 col-sm-4 col-xl-4" id="cart">
                                <i class="bi bi-bag "></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- navbar -->
                <div class="navbar row" id="main-menu">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="../pages/new_collection.html">
                            <span>NEW COLLECTION</span>
                        </a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="johnHenry">JOHN HENRY</span>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="freelancer">FREELANCER</span>
                    </div>
                    <div class="support">
                        <p class="sup_header">BẠN CẦN HỖ TRỢ?</p>
                        <div class="phoneNumber">
                            <i class="bi bi-telephone-forward"></i>
                            <p>Liên hệ: 0987592443</p>
                        </div>
                        <div class="email">
                            <i class="bi bi-envelope-paper"></i>
                            <p>quytrinh439@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- john henry -->
                <div class="johnHenry row" id="jh">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBack" id="comeBack1">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="john_henry.html">Xem tất cả "JOHN HENRY"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="ao-jh">- ÁO JH</span>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="quan-jh">- QUẦN JH</span>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="phu-kien-jh">- PHỤ KIÊN JH</span>
                    </div>
                </div>
                <div class="ao_jh row" id="ao_jh">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBackJh1" id="comeBackJh1">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">Xem tất cả "ÁO JH"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO POLO</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO SƠ MI</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO THUN</a>
                    </div>
                </div>
                <div class="quan_jh row" id="quan_jh">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBackJh2" id="comeBackJh2">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">Xem tất cả "QUẦN JH"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN KHAKI</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN JEANS</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN SHORT</a>
                    </div>
                </div>
                <div class="phu_kien_jh row" id="phu_kien_jh">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBackJh3" id="comeBackJh3">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">Xem tất cả "PHỤ KIỆN JH"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- NÓN LƯỠI TRAI</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- MẮT KÍNH CAO CẤP</a>
                    </div>
                </div>
                <!-- freelancer -->
                <div class="freelancer row" id="free">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBack" id="comeBack2">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="freelancer.html">Xem tất cả "FREELANCER"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="ao-free">- ÁO FREELANCER</span>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <span id="quan-free">- QUẦN FREELANCER</span>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- PHỤ KIÊN NỮ</a>
                    </div>
                </div>
                <div class="ao_free row" id="ao_free">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBackFree1" id="comeBackFree1">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">Xem tất cả "Áo FREELANCER"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO T-SHIRT NỮ </a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO SƠ MI NỮ</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- ÁO POLO NỮ</a>
                    </div>
                </div>
                <div class="quan_free row" id="quan_free">
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <div class="comeBackFree2" id="comeBackFree2">
                            <i class="bi bi-chevron-left"></i> QUAY VỀ
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">Xem tất cả "QUẦN FREELANCER"</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN JEANS NỮ</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN TÂY NỮ</a>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 col-xl-12">
                        <a href="">- QUẦN SHORT NỮ</a>
                    </div>
                </div>
                <!-- search -->
                <div class="search" id="sea">
                    <p>Tìm Kiếm</p>
                    <div class="search-box">
                        <input type="text " class="form-control" placeholder="Tìm kiếm ">
                        <button>
                            <i class="bi bi-search "></i>
                        </button>
                    </div>
                </div>
                <!-- login -->
                <div class="login" id="log">
                    <div class="card">
                        <div class="card-header">Đăng nhập tài khoản</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="event">
                                <button type="submt" class="btn btn-danger">Đăng nhập</button>
                            </div>
                            <p>
                                Nếu chưa có tài khoản bấm <a href="register.html">tại đây</a> để đăng ký!
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <div class="cart" id="car">
                    <div class="card">
                        <div class="card-header">Giỏ hàng</div>
                        <div class="card-body">
                            <i class="bi bi-cart2"></i>
                            <p>Hiện chưa có sản phẩm</p>
                            <hr>
                            <div class="cart-view">
                                <table>
                                    <tbody>
                                        <tr class="total-row">
                                            <td class="text-left">TỔNG TIỀN:</td>
                                            <td class="text-right">0đ</td>
                                        </tr>
                                        <tr class="action-row">
                                            <td>
                                                <a href="cart.html" class="linktocart button dark">
                                                    <span>XEM GIỎ HÀNG</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="cart.html" class="linktocart button dark">
                                                    <span>THANH TOÁN</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="cart-policy">
                                <h4 class="head">Thân Gửi Qúy Khách Hàng:</h4>
                                <div class="body">
                                    <ul>
                                        <li>
                                            Sản phẩm mua được phép đổi trong vòng 7 ngày (tính từ ngày quý khách nhận
                                            được hàng). Chúng tôi không chấp nhận hủy đơn hàng.
                                        </li>
                                        <li>
                                            Chính sách đổi trả này chỉ áp dụng đối với SẢN PHẨM NGUYÊN GIÁ, không áp
                                            dụng đối với các sản phẩm ƯU ĐÃI.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- responsive web -->
            <div class="container" id="res_web">
                <div class="menu row">
                    <div class="logo col3 col-md-3 col-sm-3 col-xl-3">
                        <a href="../index.html">
                            <img src="../image/Logo/logo.webp" alt="logo_web">
                        </a>
                    </div>
                    <div class="col-7 col-md-7 col-sm-7 col-xl-7">
                        <div class="navbar row">
                            <div class="col-4 col-md-4 col-sm-4 col-xl-4">
                                <a href="../pages/new_collection.html">
                                    <span>NEW COLLECTION</span>
                                </a>
                            </div>
                            <div class="hien1 col-4 col-md-4 col-sm-4 col-xl-4">
                                <div class="menu_item1">
                                    <a href="john_henry.html">
                                        <span>JONN HENRY</span>
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="product-list">
                                        <!-- Cột 1 -->
                                        <div class="column">
                                            <div class="product">
                                                <h3>
                                                    <a href="#">
                                                        ÁO JH
                                                    </a>
                                                </h3>
                                                <div class="title">
                                                    <div>
                                                        <a href="" title="ao-polo">ÁO POLO</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="ao-so-mi">ÁO SƠ MI</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="ao-thun">ÁO THUN</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="ao-khoac">ÁO KHOÁC</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Cột 2 -->
                                        <div class="column">
                                            <div class="product">
                                                <h3>
                                                    <a href="#">
                                                        QUẦN JH
                                                    </a>
                                                </h3>
                                                <div class="title">
                                                    <div>
                                                        <a href="" title="phu_kien-khaki">QUẦN KHAKI</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="quan-jeans">QUẦN JEANS</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="quan-short">QUẦN SHORT</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Cột 3 -->
                                        <div class="column">
                                            <div class="product">
                                                <h3>
                                                    <a href="#">
                                                        PHỤ KIỆN JH
                                                    </a>
                                                </h3>
                                                <div class="title">
                                                    <div>
                                                        <a href="" title="phu-kien-non-luoi-trai">NÓN LƯỠI TRAI</a>
                                                    </div>
                                                    <div>
                                                        <a href="" title="phu-kien-mat-kinh">
                                                            MẮT KÍNH CAO CẤP
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hien1 col-4 col-md-4 col-sm-4 col-xl-4">
                                <div class="menu_item2">
                                    <a href="freelancer.html">
                                        <span>FREELANCER</span>
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                    <div class="product-list">
                                        <div class="column">
                                            <div class="product">
                                                <div class="title">
                                                    <div class="menu-item">
                                                        <div class="h1">
                                                            <a href="" title="ao-nu">ÁO NỮ</a>
                                                            <i class="bi bi-chevron-right"></i>
                                                        </div>
                                                        <div class="hien2 col1">
                                                            <div>
                                                                <a href="">ÁO T-SHIRST</a>
                                                            </div>
                                                            <div>
                                                                <a href="">ÁO SƠ MI</a>
                                                            </div>
                                                            <div>
                                                                <a href="">ÁO POLO</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item">
                                                        <div class="h1">
                                                            <a href="" title="quan-nu">QUẦN NỮ</a>
                                                            <i class="bi bi-chevron-right"></i>
                                                        </div>
                                                        <div class="hien2 col2">
                                                            <div>
                                                                <a href="">QUẦN JEANS</a>
                                                            </div>
                                                            <div>
                                                                <a href="">QUẦN TÂY</a>
                                                            </div>
                                                            <div>
                                                                <a href="">QUẦN SHORT</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a href="" title="phu-kien-nu">PHỤ KIỆN NỮ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-2 col-md-2 col-sm-2 col-xl-2">
                        <div class="icon row">
                            <!-- tìm kiếm -->
                            <div class="search-icon col-4 col-md-4 col-sm-4 col-xl-4" id="searchIcon"
                                onclick="showSearchBox()">
                                <i class="bi bi-search"></i>
                            </div>
                            <div class="search-box card" id="searchBox">
                                <h6 class="card-heart">TÌM KIẾM</h6>
                                <div class="form-control search-input">
                                    <input type="text " class="form-control" placeholder="Tìm kiếm ">
                                    <button onclick="performSearch() ">
                                        <i class="bi bi-search "></i>
                                    </button>
                                </div>
                            </div>
                            <!-- tài khoản -->
                            <div class="login col-4 col-md-4 col-sm-4 col-xl-4" id="loginIcon" onclick="showLoginBox()">
                                <i class="bi bi-person-circle "></i>
                            </div>
                            <div class="login-box card" id="loginBox">
                                <div class="card-header">Đăng nhập</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Tên đăng nhập:</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <div class="event">
                                        <button type="submt" class="btn btn-danger">Đăng nhập</button>
                                    </div>
                                    <p>
                                        Nếu chưa có tài khoản bấm <a href="register.html">tại đây</a> để đăng ký!
                                    </p>
                                </div>
                            </div>
                            <!-- giỏ hàng -->
                            <div class="cart col-4 col-md-4 col-sm-4 col-xl-4" id="cartIcon" onclick="showCartBox()">
                                <i class="bi bi-bag "></i>
                            </div>
                            <div class="cart-box card" id="cartBox">
                                <div class="card-header">Giỏ hàng</div>
                                <div class="card-body">
                                    <i class="bi bi-cart2"></i>
                                    <p>Hiện chưa có sản phẩm</p>
                                    <hr>
                                    <div class="cart-view">
                                        <table>
                                            <tbody>
                                                <tr class="total-row">
                                                    <td class="text-left">TỔNG TIỀN:</td>
                                                    <td class="text-right">0đ</td>
                                                </tr>
                                                <tr class="action-row">
                                                    <td>
                                                        <a href="cart.html" class="linktocart button dark">
                                                            <span>XEM GIỎ HÀNG</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="cart.html" class="linktocart button dark">
                                                            <span>THANH TOÁN</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="cart-policy">
                                        <h4 class="head">Thân Gửi Qúy Khách Hàng:</h4>
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    Sản phẩm mua được phép đổi trong vòng 7 ngày (tính từ ngày quý khách
                                                    nhận được hàng). Chúng tôi không chấp nhận hủy đơn hàng.
                                                </li>
                                                <li>
                                                    Chính sách đổi trả này chỉ áp dụng đối với SẢN PHẨM NGUYÊN GIÁ,
                                                    không áp dụng đối với các sản phẩm ƯU ĐÃI.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            //xử lý icon web nhỏ hơn 768px

            $('#toggle').click(function() {
                $('#jh,#ao_jh,quan_jh,#phu_kien_jh, #free,#ao_free,#quan_free,#sea,#log,#car').hide();
                $('#main-menu').slideToggle();
            });
            $('#comeBack1').click(function() {
                $('#sea, #log, #car,#jh').hide();
                $('#main-menu').slideToggle();
            });
            $('#comeBack2').click(function() {
                $('#sea, #log, #car,#free').hide();
                $('#main-menu').slideToggle();
            });
            //xử lý john henry
            $('#johnHenry').click(function() {
                $('#sea, #log, #car,#main-menu').hide();
                $('#jh').slideToggle();
            });
            $('#ao-jh').click(function() {
                $('#sea, #log, #car,#jh').hide();
                $('#ao_jh').slideToggle();
            });
            $('#quan-jh').click(function() {
                $('#sea, #log, #car,#jh').hide();
                $('#quan_jh').slideToggle();
            });
            $('#phu-kien-jh').click(function() {
                $('#sea, #log, #car,#jh').hide();
                $('#phu_kien_jh').slideToggle();
            });
            $('#comeBackJh1').click(function() {
                $('#sea, #log, #car,#ao_jh').hide();
                $('#jh').slideToggle();
            });
            $('#comeBackJh2').click(function() {
                $('#sea, #log, #car,#quan_jh').hide();
                $('#jh').slideToggle();
            });
            $('#comeBackJh3').click(function() {
                $('#sea, #log, #car,#phu_kien_jh').hide();
                $('#jh').slideToggle();
            });
            //xử lý freelancer
            $('#freelancer').click(function() {
                $('#sea, #log, #car,#main-menu').hide();
                $('#free').slideToggle();
            })
            $('#ao-free').click(function() {
                $('#sea, #log, #car,#free').hide();
                $('#ao_free').slideToggle();
            })
            $('#quan-free').click(function() {
                $('#sea, #log, #car,#free').hide();
                $('#quan_free').slideToggle();
            });
            $('#comeBackFree1').click(function() {
                $('#sea, #log, #car,#ao_free').hide();
                $('#free').slideToggle();
            });
            $('#comeBackFree2').click(function() {
                $('#sea, #log, #car,#quan_free').hide();
                $('#free').slideToggle();
            });
            //xử lý icon
            $('#search').click(function() {
                $('#sea').slideToggle();
                $('#log, #car,#main-menu,#jh,#free,#ao_jh,#quan_jh,#phu_kien_jh,#ao_free,#quan_free')
                    .hide();
            });

            $('#login').click(function() {
                $('#log').slideToggle();
                $('#sea, #car,#main-menu,#jh,#free,#ao_jh,#quan_jh,#phu_kien_jh,#ao_free,#quan_free')
                    .hide();
            });

            $('#cart').click(function() {
                $('#car').slideToggle();
                $('#sea, #log,#main-menu,#jh,#free,#ao_jh,#quan_jh,#phu_kien_jh,#ao_free,#quan_free')
                    .hide();
            });
            //xử lý icon web màn hình lớn hơn 768px
            $('#searchIcon').click(function() {
                $('#loginBox, #cartBox').hide();
                $('#searchBox').slideToggle();
            });
            $('#loginIcon').click(function() {
                $('#searchBox, #cartBox').hide();
                $('#loginBox').slideToggle();
            });
            $('#cartIcon').click(function() {
                $('#loginBox, #searchBox').hide();
                $('#cartBox').slideToggle();
            });
        });
        </script>
        <!-- register -->
        <div class="register-box" style="margin-top: 150px;">
            <div class="row justify-content-center">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <h1>Tạo tài khoản</h1>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Họ và tên"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="gender-radio">
                            <input type="radio" id="male" name="gender" value="Nam" required>
                            <label for="male">Nam</label>
                            <input type="radio" id="female" name="gender" value="Nữ" required>
                            <label for="female">Nữ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="fill_password" name="fill_ password"
                            placeholder="Mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                            placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="form-group">
                        <label for="show_password">Hiển thị mật khẩu:</label>
                        <input class="showpass" type="checkbox" id="show_password" onclick="showPassword()">
                    </div>
                    <p>Nhấn vào "Đăng ký" quý khách chấp nhận điều khoản dịch vụ của chúng tôi</p>
                    <div class="event">
                        <button type="button" class="btn btn-danger" onclick="">ĐĂNG KÝ</button>
                    </div>
                    <div class="back">
                        <a href="./index.php">
                            <i class="bi bi-arrow-left"></i>
                            <span>Quay lại trang chủ</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-1 "></div>
            </div>
        </div>
        <script>
        function showPassword() {
            var passwordField = document.getElementById("fill_password");
            var confirmPasswordField = document.getElementById("confirm_password");
            var showPasswordField = document.getElementById("show_password");

            if (showPasswordField.checked) {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
            }
        }
        </script>
        <!-- footer -->
        <!-- web -->
        <div class="footer" id="foot_web">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-md-4 col-sm-4 md-xl-4">
                        <h4>Giới Thiệu</h4>
                        <div class="logo">
                            <a href=" ">
                                <img src="../image/Logo/logo1.webp" alt=" ">
                            </a>

                            <a href=" ">
                                <img src="../image/Logo/logo2.webp" alt=" ">
                            </a>
                        </div>
                        <div>
                            <ul>
                                <li>Công ty TNHH T.M.G <br> Mã Số Thuế: 0302966294</li>
                                <li>
                                    <span style="font-weight: bold; ">Địa chỉ:</span>172 Nguyễn Trãi, Phường Bến Thành,
                                    Quận 1, TP. Hồ Chí Minh
                                </li>
                                <li>
                                    <span style="font-weight: bold; ">Email:</span> cskh@viet-styles.com
                                    <br>
                                    <span style="font-weight: bold; ">Hotline:</span> 0914 516 446 - 0906 954 368
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-5 col-md-5 col-sm-5 md-xl-5">
                        <div>
                            <h4>Đành Cho Khách Hàng</h4>
                            <ul>
                                <li>
                                    <a href=" ">
                                        HỢP TÁC NHƯỢNG QUYỀN
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Ưu Đãi VIP MEMBER
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Đăng ký và kiểm tra thành viên
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Hướng dẫn thanh toán
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Giao hàng và phí vận chuyển
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Chính sách đổi trả
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Chính sách bảo mật
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Điều khoản và thanh toán
                                    </a>
                                </li>
                                <li>
                                    <a href=" ">
                                        Tuyển dụng
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer ">
                    <div class="logo">
                        <div class="logo_lon">
                            <a href="# ">
                                <img src="../image/Logo/logo3.webp" alt=" ">
                            </a>
                        </div>
                        <div class="logo_nho">
                            <a href=" ">
                                <img src="../image/Logo/logo4.webp" alt=" ">
                            </a>

                            <a href=" ">
                                <img src="../image/Logo/logo5.webp" alt=" ">
                            </a>

                            <a href=" ">
                                <img src="../image/Logo/logo6.webp" alt=" ">
                            </a>

                            <a href=" ">
                                <img src="../image/Logo/logo7.webp" alt=" ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center ">
                <p>Copyright © 2023 John Henry & Freelancers Powered by Haravan.
                </p>
            </div>
        </div>
        <!-- mobile -->
        <div class="footer_mobile container-fluid" id="foot_mobile">k
            <div class="footer-content1">
                <h4 class="footer-title">Giới thiệu</h4>
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="">
                            <img src="../image/Logo/logo1.webp" alt="">
                        </a>
                        <a href="">
                            <img src="../image/Logo/logo2.webp" alt="">
                        </a>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li>Công ty TNHH T.M.G <br> Mã Số Thuế: 0302966294</li>
                            <li>
                                <span style="font-weight: bold; ">Địa chỉ:</span>172 Nguyễn Trãi, Phường Bến Thành, Quận
                                1, TP. Hồ Chí Minh
                            </li>
                            <li>
                                <span style="font-weight: bold; ">Email:</span> cskh@viet-styles.com
                                <br>
                                <span style="font-weight: bold; ">Hotline:</span> 0914 516 446 - 0906 954 368
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-content2">
                <h4 class="footer-title">Dành Cho Khách Hàng</h4>
                <div class="footer-list">
                    <ul>
                        <li>
                            HỢP TÁC NHƯỢNG QUYỀN
                        </li>
                        <li>
                            Ưu Đãi VIP MEMBER
                        </li>
                        <li>
                            Đăng ký và kiểm tra thành viên
                        </li>
                        <li>
                            Hướng dẫn thanh toán
                        </li>
                        <li>
                            Giao hàng và phí vận chuyển
                        </li>
                        <li>
                            Chính sách đổi trả
                        </li>
                        <li>
                            Chính sách bảo mật
                        </li>
                        <li>
                            Điều khoản và thanh toán
                        </li>
                        <li>
                            Tuyển dụng
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bottom-footer ">
                <div class="logo">
                    <div class="logo_nho">
                        <a href=" ">
                            <img src="../image/Logo/logo4.webp" alt=" ">
                        </a>

                        <a href=" ">
                            <img src="../image/Logo/logo5.webp" alt=" ">
                        </a>
                        <a href=" ">
                            <img src="../image/Logo/logo6.webp" alt=" ">
                        </a>

                        <a href=" ">
                            <img src="../image/Logo/logo7.webp" alt=" ">
                        </a>
                    </div>
                    <div class="logo_lon">
                        <a href=" ">
                            <img src="../image/Logo/logo3.webp" alt=" ">
                        </a>
                    </div>
                </div>
            </div>
            <p>Copyright © 2023 John Henry & Freelancers Powered by Haravan.
            </p>
        </div>
    </div>
</body>

</html>