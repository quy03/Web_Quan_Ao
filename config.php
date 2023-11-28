<?php
    // khai báo biến     
    $server = "localhost";
    $user="root";
    $pass="";
    $db="csdl_web_ban_quan_ao";

    $conn = mysqli_connect($server,$user,$pass,$db);
    if ($conn->connect_error) {
        die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
    }
?>