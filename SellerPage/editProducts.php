<?php
include "db.php";
include "./Components/EditProduct.html";
session_start();
print_r($_SESSION);
$id = $_SESSION['productId'];

$sql = "SELECT * FROM product where item_id = '$id';";
$results = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($results);
while($row = mysqli_fetch_assoc($results)){
    $name = $row['item_name'];
    $price = $row['item_price'];
    $catagory = $row['item_catagory'];
    $desc = $row['item_description'];
    $seller = $row['seller'];
    $image = $row['item_image'];
}
?>

<?php
if(isset($_POST['updatebtn'])){
    $id = $_SESSION['productId'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['price'];
    $productCatagory = $_POST['pcatagory'];
    $productDescription = $_POST['pdescription'];
    $productSeller = $_POST['pseller'];
    $sql = "UPDATE product SET item_name = '$productName', item_price = '$productPrice', item_catagory='$productCatagory', item_description='$productDescription', seller='$productSeller' WHERE item_id = '$id';";
    mysqli_query($conn, $sql);
    header("location: ./Components/viewAllProducts.php");
    
}

?>
<form action="" method="post">
            <div class="container">
                <div class="firstcol">
                    <div>
                        <label for="">Product name</label>
                        <input type="text" placeholder="Product name" value="<?php echo $name?>" name="productName">
                    </div>
                    <div>
                        <label for="">Product Catagory</label>
                        <input type="text" placeholder="Product Catagory" value="<?php echo $catagory?>" name="pcatagory">
                    </div>
                    <div>
                        <label for="">Item Description</label>
                        <input type="text" placeholder="Item Description" value="<?php echo $desc?>" name="pdescription">
                    </div>
                    <div>
                        <label for="">Seller</label>
                        <input type="text" placeholder="Seller" value="<?php echo $seller?>" name="pseller">
                    </div>
                </div>   
                <div class="seccol">
                    <div>
                        <label for="">Product price</label>
                        <input type="text" placeholder="Product price" value="<?php echo $price?>" name="price">
                    </div>
                    <div>
                        <img src="uploads/<?php echo $image?>" style="margin-top:50px; margin-bottom:20px; width:130px; height:130px object-fit:contain;">
                        <input type="file" name="file" disabled>
                    </div>
                </div>
            </div>
            <input class="submitbtn" type="submit" value="Save" name="updatebtn">
        </form>
    </div>
<!-- <form action="" method="post">
    <input type="text" placeholder="Product Name" value="<?php echo $name?>" name="productName"><br>
    <input type="text" placeholder="Product Price" value="<?php echo $price?>" name="productPrice"><br>
    <input type="submit" value="Update" name="updatebtn">
</form> -->
