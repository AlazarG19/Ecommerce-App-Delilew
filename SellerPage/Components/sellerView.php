<?php
include '../db.php';
include 'addProduct.html';
    if(isset($_POST['addbtn'])){
        $fileNameNew = "h";
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize<500000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../../assets/products/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                }else{
                    ?>
                    <script>alert('file too big to be uploaded')</script>
                <?php
                }
            }else{
                ?>
                    <script>alert('error uploading a file')</script>
                <?php
            }
        }else{
            ?>
            <script>alert('file extension not allowed')</script>
            <?php
        }

        $productName = $_POST['pname'];
        $price = $_POST['price'];
        $pseller = $_COOKIE['name'];
        // $pseller = $_POST['pseller'];
        $PCatagory = $_POST['pcatagory'];
        $Pdescription = $_POST['pdescription'];
        $date = date_default_timezone_get();
        $imgsrc = './assets/products/'.$fileNameNew;
        $sql = "Insert into product (item_catagory, item_description, item_name, item_price, item_image, seller,item_register) Values ('$PCatagory', '$Pdescription', '$productName', '$price', '$imgsrc', '$pseller','$date');";
        mysqli_query($conn, $sql);
        header("location: viewAllProducts.php");
    }
?>