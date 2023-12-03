<?php
    require("config.php");
    if(isset($_POST["register"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $re_password=$_POST["re_password"];
        if($password!=$re_password){
            echo"2 mat khau khong trung nhau,de nghi nhap lai";
        }
        else{
            $sql="select*from tbl_users where user_name='".$username."'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo"ten dang nhap da ton tai , de nghi nhap ten dang nhap moi";


            }
            else{
                $sql_insert = "insert into tbl_users(user_name, password, status) values ('".$username."','".$password."' , 1)";
                if(mysqli_query($conn, $sql_insert)){
                    header("location:login.php");
                }
                else{
                    echo "Error: " . $sql_insert . "br" . mysql_error($conn);
                }
            }
        }
    }
    if(isset($_POST["login"])){
        header("location:login.php");
    }
?>
<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Trang dang ki tai khoan</h1>
        <form action="register_category.php" method="post">
            Nhap vao ten dang nhap:
            <input type="text" name="username" class="form-control">
            Nhap vao mat khau:
            <input type="password" name="password" class="form-control">
            Nhap lai mat khau:
            <input type="password" name="re_password" class="form-control">
            <br>
            <input type="submit" value="dang ky" name="register" class="btn btn-danger">
            <input type="submit" value="Dang nhap" name="login" class="btn btn-primary">
        </form>

    </div>
</body>

</html>