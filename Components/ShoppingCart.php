<!-- start of header  -->
<?php
include("./Header.php");
?>
<!-- end of header  -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_r($_POST);
    if (isset($_POST["delete-btn-submit"])) {
        $deletedItemId = $cart->deleteCartItem($_POST["item_id"]);
        // print_r($deletedItemId);
    }
} ?>
<!-- Shopping cart section  -->
<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData("cart") as $item) {
                    $result = $product->getProduct($item["item_id"]);
                    $result[0]["quantity"] = $item["quantity"];
                    $result[0]["user_id"] = 1;
                    $subTotal[] = array_map(function ($item) {
                ?>
                <div></div>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item["item_image"]; ?>" alt="cart1" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item["item_name"]; ?></h5>
                                <small>by <?php echo $item["item_catagory"]; ?></small>

                                <!-- product qty -->
                                <div class="qty2 d-flex pt-2">
                                    <div class="d-flex font-rale w-25">
                                        <button class="qty-up border bg-light" data-id=<?php echo $item["item_id"] ?? 0; ?> data-user_id="1"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id=<?php echo $item["item_id"] ?? 0; ?> class="qty2-input border px-2 w-100 bg-light" disabled value=<?php echo $item["quantity"] ?? 0; ?> placeholder=<?php echo $item["quantity"] ?? 0; ?>>
                                        <button class="qty-down border bg-light" data-id=<?php echo $item["item_id"] ?? 0; ?> data-user_id="1"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item["item_id"] ?? 0; ?>">
                                        <button type="submit" name="delete-btn-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                    </form>
                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span data-id=<?php echo $item["item_id"] ?? 0; ?> class="product_price"><?php echo $item["item_price"] * $item["quantity"] ; ?></span>
                                </div>
                            </div>
                        </div>
                <?php
                        return $item["item_price"] * $item["quantity"];
                    }, $result);
                }
                // print_r($subTotal[]) ; 
                ?>
                <!-- !cart item -->
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?php echo isset($subTotal) ? count($subTotal) : 0  ?> item):&nbsp;
                            <span class="text-danger">$
                                <span class="text-danger" id="deal-price" data-id="deal-price">
                                    <?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0 ?>
                                </span>
                            </span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->