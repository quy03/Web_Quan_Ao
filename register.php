<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/register.css">
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
        <!-- register -->
        <div class="register-box" style="margin-top: 150px;">
            <form action="register.php" method="post">
                <div class="row justify-content-center">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h1>Tạo tài khoản</h1>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                placeholder="Họ và tên" required>
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
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="fill_password" name="fill_password"
                                placeholder="Mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Xác nhận mật khẩu" required>
                        </div>
                        <div class="form-group">
                            <label for="show_password">Hiển thị mật khẩu:</label>
                            <input style="height: 12px;" class="showpass" type="checkbox" id="show_password"
                                onclick="showPassword()">
                        </div>
                        <p>Nhấn vào "Đăng ký" quý khách chấp nhận điều khoản dịch vụ của chúng tôi</p>
                        <div class="event">
                            <button name="register" value="dangky" type="submit" class="btn btn-danger" onclick="">ĐĂNG
                                KÝ</button>
                            <?php
                                require("config.php");

                                if (isset($_POST["register"])) {
                                    $full_name = $_POST["full_name"];
                                    $gender = $_POST["gender"];
                                    $date_of_birth = $_POST["date_of_birth"];
                                    $phone = $_POST["phone"];
                                    $email = $_POST["email"];
                                    $password = $_POST["fill_password"];
                                    $confirm_password = $_POST["confirm_password"];

                                    if ($password != $confirm_password) {
                                        $check_password = "Mật khẩu và xác nhận mật khẩu không khớp.";
                                        echo '<p style="color: red; text-align: center; margin-top: -30px;">' . $check_password . '</p>';
                                    } else {
                                        $sql= "select * from users where email= '".$email."'";
                                        $result=mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result)>0){
                                            $eror_email="Email đã được đăng ký, vui lòng nhập email khác";
                                            echo '<p style="color: red; text-align: center; margin-top: -30px;">' . $eror_email . '</p>';
                                        } 
                                        else {
                                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                            $sql = "insert into users(full_name, gender, date_of_birth, phone, email, password) VALUES ('$full_name', '$gender', '$date_of_birth', '$phone', '$email', '$hashed_password')";
                                            
                                            if(mysqli_query($conn, $sql)){
                                                echo "Đăng ký thành công!";
                                            }
                                            else{
                                                echo "Đăng ký thất bại: " . $conn->error;
                                            }
                                        }
                                    }
                                }
                            ?>
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
            </form>
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
    </div>
</body>

</html>