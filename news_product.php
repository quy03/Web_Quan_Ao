<?php
    require("config.php");
    if(isset($_POST["btn_insert"])){
        //lay ra gia tri duoc nhap vao text
        $cate_name = $_POST["cate"];
        $fullname = $_POST["txt_name"];
        $content = $_POST["txt_content"];
        $price = $_POST["txt_price"];
        $size = $_POST["txt_size"];
        $quantity = $_POST["txt_quantity"];
        $post_date = $_POST["txt_date"];
        $status = $_POST["txt_status"];
        //upload intro img
        $target_dir = "upload_tintuc";
        $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //kiem tra dinh dang file anh
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
       
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } 
          else {
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
                $sql_insert = "INSERT into tbl_product(product_id,fullname,content,intro_image,price,size,quantity,post_date,status) values(".$cate_name.",'".$fullname."','".$content."','".$target_file."','".$price."','".$size."','".$quantity."','".$post_date."',".$status.")";
                if (mysqli_query($conn, $sql_insert)) {
                    header("location:news_product.php");
                    //echo "New record created successfully";
                } 
                else {
                    echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
                }
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
          }

        
    }
    if(isset($_GET["task"]) && $_GET["task"]=="delete"){
        $id = $_GET["id"];
        $sql_delete = "delete from tbl_product where cate_id = " . $id;
        if (mysqli_query($conn, $sql_delete)) {
            //echo "New record created successfully";
            header("location:news_product.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    
?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <title>Trang Quản Trị Sản phẩm</title>
    <style>
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination {
        list-style: none;
        padding-top: 20px;
        padding-left: 500px;
        margin-bottom: 200px
    }

    .pagination a,
    .pagination span {
        margin: 0 5px;
        padding: 8px 12px;
        text-decoration: none;
        color: #333;
        background-color: #f2f2f2;
        border: 1px solid white;
        border-radius: 4px;
        cursor: pointer;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination span {
        background-color: #611E1E;
        color: white;
        border: 1px solid #611E1E;
        cursor: default;
    }
    </style>
</head>

<body style="background-color: #99FFFF;">
    <div class="container">
        <h1 style="text-align: center;">Trang Quản Trị Sản Phẩm</h1>
        <div class="row">
            <div class="col-6">
                <form action="news_product.php" method="post" enctype="multipart/form-data">
                    Chọn danh mục:
                    <select class="form-control" name="cate" id="">
                        <?php
                                $sql = "select * from tbl_category order by cate_id DESC";
                                $result = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='".$row["cate_id"]."'>".$row["cate_name"]."</option>";
                                    }
                                }
                            ?>
                    </select>
                    Nhập tên áo:
                    <input class="form-control" type="text" name="txt_name" id="">
                    Nhập mô tả:
                    <!-- <div id="editor" name="txt_content">This is some sample content.</div> -->
                    <textarea name="txt_content" id="editor"></textarea>
                    <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            console.log(editor);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                    </script>
                    Chọn ảnh sản phẩm:
                    <input class="form-control" type="file" name="upload_file" id="">
                    Gía Sản phẩm:
                    <input class="form-control" type="text" name="txt_price" id="">
                    Size Sản phẩm:
                    <input class="form-control" type="text" name="txt_size" id="">
                    Số lượng Sản phẩm:
                    <input class="form-control" type="text" name="txt_quantity" id="">
                    Ngày đăng:
                    <input class="form-control" type="date" name="txt_date" id="">
                    Nhập trạng thái tin tức:
                    <input class="form-control" type="text" name="txt_status" id="">
                    <br>
                    <input class="btn btn-primary" name="btn_insert" type="submit" value="Thêm mới">
                </form>
            </div>
        </div>
        <div class="row">

            <div class="col-6">
                <form action="#" method="post">

                    <input placeholder="tim kiem theo tieu de tin ..." class="form-control" type="text"
                        name="txt_search" id="">
                    <br>
                    <input class="btn btn-success" type="submit" value="Tìm kiếm" name="btn_search">
                </form>
            </div>
        </div>
        <?php
                // BƯỚC 2: TÌM TỔNG SỐ RECORDS
                $result = mysqli_query($conn, 'select count(cate_id) as total from tbl_product');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                
                // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 3;
                
                // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
                // tổng số trang
                $total_page = ceil($total_records / $limit);
                
                // Giới hạn current_page trong khoảng 1 đến total_page
                if ($current_page > $total_page){
                    $current_page = $total_page;
                }
                else if ($current_page < 1){
                    $current_page = 1;
                }
                
                // Tìm Start
                $start = ($current_page - 1) * $limit;
            ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-stripped">
                    <tr>
                        <th>Mã Sản phẩm</th>
                        <th>Tên danh mục sản phẩm</th>
                        <th>Tên Áo</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Gía sản phẩm</th>
                        <th>Các size sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Ngày Đăng</th>
                        <th>Trạng thái</th>
                        <th>Thao Tác</th>
                        <th>Chọn</th>
                    </tr>
                    <?php

                            $sql = " ";
                            if(isset($_POST["txt_search"])){
                                $fullname = $_POST["txt_search"];
                                $sql = "select * from tbl_product where fullname like '%".$fullname."%'";
                            }
                            else
                            $sql = "select * from tbl_product order by product_id DESC LIMIT $start,$limit";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $s = "";
                                    if($row["status"]==0){
                                        $s = "<p style='color:red'>An</p>";
                                    }
                                    else{
                                        $s = "<p style='color:green'>Hien</p>";
                                    }
                                    echo "<tr>";
                                    echo "<td>". $row["cate_id"] . "</td>";
                                    echo "<td>". $row["product_id"] . "</td>";
                                    echo "<td>". $row["fullname"] . "</td>";
                                    echo "<td>". $row["content"] . "</td>";
                                    echo "<td><img src='". $row["intro_image"] . "'width='100%' height='100%'></td>";
                                    echo "<td>". $row["price"] . "</td>";
                                    echo "<td>". $row["size"] . "</td>";
                                    echo "<td>". $row["quantity"] . "</td>";
                                    echo "<td>". $row["post_date"] . "</td>";
                                    echo "<td>".$s."</td>";
                                    echo "<td>";
                                        echo "<a class='btn btn-warning' href='update_news_product.php?task=update&id=".$row["cate_id"]."'>Sửa</a>";
                                        echo "<a class='btn btn-danger' href='news_product.php?task=delete&id=".$row["cate_id"]."'>Xóa</a>";
                                    echo "</td>";
                                    echo "<td>";
                                        echo "<input type='checkbox' name='cate_id[]' value='".$row["cate_id"]."' class='form-check-input'>";
                                    echo "</td>";
                                    echo "</tr>";
                                    //echo $row["cate_id"] . " , " . $row["cate_name"] . "<br>";
                                }
                            }
                        
                            else{
                                echo "Bảng không chứa dữ liệu";
                            }
                            
                        ?>

                </table>
            </div>
            <div class="pagination">
                <?php 
                        // PHẦN HIỂN THỊ PHÂN TRANG
                        // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                        if ($current_page > 1 && $total_page > 1){
                            echo '<a href="news_product.php?page='.($current_page-1).'">Truoc</a>  ';
                        }
                        
                        // Lặp khoảng giữa
                        for ($i = 1; $i <= $total_page; $i++){
                            // Nếu là trang hiện tại thì hiển thị thẻ span
                            // ngược lại hiển thị thẻ a
                            if ($i == $current_page){
                                echo '<span>'.$i.'</span>  ';
                            }
                            else{
                                echo '<a href="news_product.php?page='.$i.'">'.$i.'</a>  ';
                            }
                        }
                        
                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                        if ($current_page < $total_page && $total_page > 1){
                            echo '<a href="news_product.php?page='.($current_page+1).'">Sau</a>  ';
                        }
                    ?>
            </div>
        </div>
    </div>

</body>

</html>