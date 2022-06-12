<?php
$catagory = array_map(function ($item) {
    return $item["item_catagory"];
}, $product_list);
$unique = array_unique($catagory);
sort($unique);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_to_cart_submit'])) {
        $cart->addToCart($_POST['user_id'], $_POST['item_id'], $_POST['quantity']);
    }
    if (isset($_POST['remove_from_cart_submit'])) {
        $cart->deleteCartItem( $_POST['item_id']);
    }
}
?>
<section id="catagory">
    <div class="container">
        <h4 class="font-rubik font-size-20">Products</h4>
        <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="*">All catagorys</button>
            <?php array_map(function ($item) { ?>
                <button class="btn" <?php echo "data-filter='.{$item}'" ?>><?php echo "{$item}" ?> </button>
            <?php }, $unique); ?>
        </div>
        <div class="grid" style="display: flex;">
            <?php array_map(function ($item) use ($cart, $product) { ?>
                <div class="grid-items <?php echo $item['item_catagory'] ?>"  style="width: 200px;">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-rale">
                            <a href="<?php printf("%s?item_id=%s", 'product.php', $item['item_id']) ?>">
                                <img src=<?php echo $item['item_image'] ?? "./assets/products/13.png" ?> style="width: 200px;" alt="product1" />
                            </a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?></h6>
                                
                                <div class="price py-2">
                                    <span>$<?php echo $item['item_price'] ?? "0" ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? "1"; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <?php
                                    if (in_array($item["item_id"], $cart->getCartId($cart->getCartItem($userid = $_SESSION["user_id"])))) {
                                        echo '<button type="submit" name = "remove_from_cart_submit" class="btn btn-success font-size-12" >Added To cart</button>';
                                    } else {
                                        echo '<button type="submit" name = "add_to_cart_submit" class="btn btn-warning font-size-12"> Add To cart </button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_list) ?>
        </div>
    </div>
</section>