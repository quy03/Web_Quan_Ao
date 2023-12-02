<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/info_account.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Tài khoản</title>

</head>

<body>
    <div class="layout-info-account">
        <div class="title-infor-account text-center">
            <h1>Tài khoản của bạn</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 sidebar-account">
                    <div class="AccountSidebar">
                        <h3>Tài khoản</h3>
                        <div class="AccountContent">
                            <div class="AccountList">
                                <ul>
                                    <li>
                                        <a href="">Thông tin tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="index.php?act=logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="title-detail">Thông tin tài khoản</p>
                            <hr>
                            <?php
    require("config.php");

    // Start the session
    // session_start();

    // Check if the user is logged in
    if(isset($_SESSION['email'])) {
        // Lấy thông tin từ biểu mẫu hoặc session
        $user_email = $_SESSION['email']; // Thay thế bằng cách lấy từ session hoặc cách khác

        // Thực hiện truy vấn SQL để lấy id dựa trên email
        $sql_id = "SELECT user_id, full_name, gender, date_of_birth, email, phone FROM users WHERE email = ?";

        // Sử dụng prepared statement để tránh SQL injection
        $stmt_id = $conn->prepare($sql_id);
        $stmt_id->bind_param("s", $user_email);

        // Thực hiện truy vấn
        $stmt_id->execute();

        // Lấy kết quả
        $result_id = $stmt_id->get_result();

        // Kiểm tra xem có dữ liệu trả về không
        if ($result_id->num_rows > 0) {
            $row_id = $result_id->fetch_assoc();
            echo '<h2 class="name_account">' . $row_id["full_name"] . '</h2>';
            echo '<span>Giới tính: ' . $row_id["gender"] . '</span>';
            echo '<br>';
            echo '<span>Ngày đăng ký: ' . $row_id["date_of_birth"] . '</span>';
            echo '<br>';
            echo '<span>Email: ' . $row_id["email"] . '</span>';
            echo  '<br>';
            echo '<span>Phone: ' . $row_id["phone"] . '</span>';
        } else {
            echo "Không tìm thấy thông tin người dùng.";
        }
    } else {
        echo "Người dùng chưa đăng nhập.";
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