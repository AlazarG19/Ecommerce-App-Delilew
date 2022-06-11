<?php
session_start();
include "../db.php";
include "viewProduct.html";
$name = $_COOKIE['name'];
// $query = "SELECT * FROM product WHERE seller = '$name'";
$query = "SELECT * FROM product WHERE seller = '$name';";
$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);
$name;
?>
<?php
if (isset($_POST['editbtn'])) {
    $productId = $_POST['id'];
    $_SESSION['productId'] = $productId;
    header('location: ../editProducts.php');
}
if (isset($_POST['addproductbtn'])) {
    header("location: sellerView.php");
}
if (isset($_POST['deletebtn'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM product WHERE item_id = $id;";
    mysqli_query($conn, $sql);
}
?>
<div class="bodycont">
    <div class="productcont">
        <div class="headercomp">
            <h1>View Products</h1>
            <form action="" method="post">
                <input type="submit" class="newbtn" value="Add new Product   >" name="addproductbtn">
            </form>
        </div>
        <div class="itemcontainer">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="item">
                    <img src="<?php echo "../." . $row['item_image'] ?>" alt="">
                    <div class="itemdesc">
                        <h3><?php echo $row['item_name'] ?></h3>
                        <hr>
                        <div class="itemdetail">
                            <h2>$<?php echo $row['item_price'] ?></h2>
                            <form action="" method="post">
                                <div class="btnscont">
                                    <input type="hidden" value="<?php echo $row['item_id'] ?>" name="id">
                                    <input class="editbtn" type="submit" value="Edit" name="editbtn" />
                                    <input class="editbtn" type="submit" value="Delete" name="deletebtn" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                // setcookie("productName", $row['item_name']);
                // setcookie("productPrice", $row['item_price']);
            } ?>
        </div>
    </div>
</div>
