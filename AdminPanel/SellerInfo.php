<?php include("./Components/SellerInfoHeader.php") ?>
<?php include("./Functions.php") ?>
<?php include("./Components/DbComponent/RemoveClass.php")?>
<?php
$sellerid = $_GET["sellerid"] ?? 0;
$sellerinfo = $get->getBy($table = "seller", $column = "seller_id", $info = $sellerid, $isstring = false)[0];
$sellerusername = $sellerinfo["userName"];
$sellerfirstname = $sellerinfo["firstName"];
$sellerlastname = $sellerinfo["lastName"];
// print_r($get->getBy($table = "product",$column = "seller",$info = $sellername,$isstring = true));

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $remove = new RemoveClass($db);
    $remove->remove("product","seller",$sellerusername,true);
    $remove->remove("to_be_validated","seller",$sellerusername,true);
    $remove->removeSeller($table = "seller",$columns = $sellerid);
};
    
?>

<main>
    <div class="container">
        <div class="profile-container-parent">
            <div class="profile-container">
                <div class="profile-image">
                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                </div>
                <div class="profile-info">
                    <h3><?php echo $sellerfirstname ?></h3>
                    <h4> <?php echo$sellerusername ?> </h4>
                    <p>Lorem ipsum </p>
                </div>
            </div>
            <div class="profile-image">
                <form method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?>">
                    <button type="submit" name="delete-submit" class="remove-btn">Remove</button>
                </form>
            </div>

        </div>
        <div class="items-posted">
            <h2>Items Posted</h2>
            <div class="items">
                <?php foreach ($get->getBy($table = "product", $column = "seller", $info = "{$sellerusername}", true) as $item) { ?>
                    <div class="card">
                        <img src="<?php echo $item["item_image"] ?? "unknown" ?>" />
                        <h4>Name : <?php echo $item["item_name"] ?? "unknown" ?></h4>
                        <p>Item Id :<?php echo $item["item_id"] ?? 0 ?></p>
                        <p>Seller : <?php echo $item["seller"] ?? "unknown" ?></p>
                        <p>Price : <?php echo $item["item_price"] ?? 0 ?></p>
                        <button><a href=<?php printf("%s?itemid=%s", "Product.php", $item["item_id"]); ?>>Details</a> </button>
                    </div>
                <?php } ?>
            </div>
        </div>
</main>
</body>

</html>