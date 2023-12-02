<?php
    require("../config.php");
    $this_id = $_GET['id'];
   
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    //khi nhaasn nuts luu lai

    if(isset($_POST['update'])){

        $cate_id = $_POST["cate"];
        $name = $_POST["txt_name"];
        $content = $_POST["txt_content"];
        $price = $_POST["txt_price"];
        $size = $_POST["txt_size"];
        $quantity = $_POST["txt_quantity"];
        $post_date = $_POST["txt_date"];
        $status = $_POST["txt_status"];

        //anhr
        
       $target_dir = "upload_tintuc/";
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
            if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)){
                $sql = "UPDATE tbl_product SET product_id = '$cate_id', fullname='$name',content='$content',intro_image='$target_file',price='$price',size='$size',quantity='$quantity',post_date='$post_date',status='$status' 
                WHERE cate_id =".$this_id;
                
                mysqli_query($conn, $sql);
                header("location:news_product.php");
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

</head>



<body style="background-color: #ffffcc; ">
    <div class="container">
        <div class="row">
            <h1>Trang sửa tin tức</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
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
                        </div>
                        <div class="form-group">
                            Nhập tên áo:
                            <input class="form-control" type="text" name="txt_name" id="">
                        </div>
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
                        <div class="form-control">
                            Chọn ảnh sản phẩm:
                            <input class="form-control" type="file" name="upload_file" id="">
                        </div>
                        <div class="form-group">
                            Gía Sản phẩm:
                            <input class="form-control" type="text" name="txt_price" id="">
                        </div>
                        <div class="form-group">
                            Size Sản phẩm:
                            <input class="form-control" type="text" name="txt_size" id="">
                        </div>
                        <div class="form-group">
                            Số lượng Sản phẩm:
                            <input class="form-control" type="text" name="txt_quantity" id="">
                        </div>
                        <div class="form-group">
                            Ngày đăng:
                            <input type="date" name="txt_date" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            Nhập trạng thái tin tức:
                            <input type="text" name="txt_status" id="" class="form-control">
                        </div>
                        <br>
                        <input type="submit" value="Lưu lại" name="update" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>