<?php
require("config.php");
    $this_id = $_GET['id'];
    echo "tin tức đã bị  xóa với id là:  ";
    echo  $this_id;

    $sql = "DELETE FROM tbl_product WHERE cate_id ='$this_id' ";

    mysqLi_query($conn,  $sql );

    header('location: news_product.php');
?>