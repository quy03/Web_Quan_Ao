<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Trang dang nhap</h1>
        <form action="login_category.php" method="post">
            Nhap ten dang nhap:
            <input type="text" name="txt_username" class="form-control">
            <br>
            Nhap vao mat khau:
            <input type="text" name="txt_password" class="form-control">
            <br>
            <input type="submit" value="Dang nhap" name="login" class="btn btn-primary">
            <input type="submit" value="Dang ky" name="register" class="btn btn-danger">
        </form>
    </div>
</body>

</html>

<?php
    require("config.php");
    session_start();
        if(isset($_POST["login"])){
        $user_name = $_POST["txt_username"];
        $password = $_POST["txt_password"];
        $sql = "select * from tbl_users where user_name = '".$user_name."' and password = '" .$password."'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $_SESSION["user"] = $user_name;
            header("location:category.php");
        }
        else{
            echo "sai ten dang nhap hoac mat khau";
        }
    }
    if(isset($_POST["register"])){
        header("location:register_category.php");
    }

?>