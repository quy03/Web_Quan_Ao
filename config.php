<?php
    // khai báo biến     
    $server = "localhost";
    $user="root";
    $pass="";
    $db="web_quan_ao";

    $conn = mysqli_connect($server,$user,$pass,$db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else 
    {
        echo"";
    }
?>