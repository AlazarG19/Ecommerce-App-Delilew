<?php
include("./Functions.php");
?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["accept_submit"])){
        $validate->validate($table1 = "product", $table2 = "to_be_validated",$item_id = $_POST["item_id"]);
        }
} ?>
<!-- start of header fle  -->
<?php include("./Components/ValidateProductHeader.php") ?>
<!-- end of header fle  -->
<section class="main">
    <div class="main-top">
        <h1>Validate Items List</h1>
    </div>
    <div class="items">
        <?php foreach ($get->get("to_be_validated") as $item) { ?>
            <div class="card">
                <img src="<?php echo $item["item_image"] ?? "unknown" ?>" />
                <h4>Name : <?php echo $item["item_name"] ?? "unknown" ?></h4>
                <p>Item Id :<?php echo $item["item_id"] ?? 0 ?></p>
                <p>Seller : <?php echo $item["seller"] ?? "unknown" ?></p>
                <p>Price : <?php echo $item["item_price"] ?? 0 ?></p>
                <div class="btns-row" style="display: flex;flex-direction :column;">
                    <button> <a href=<?php printf("%s?itemid=%s", "Product.php", $item["item_id"]); ?>>Details</a> </button>
                    <form method="post">
                        <input type="hidden" value="<?php echo $item["item_id"] ?>" name="item_id">
                        <button type="submit" name="accept_submit"> Accept </button>
                    </form>
                </div>
            </div>
        <?php } ?>
</section>
</div>
</body>

</html>