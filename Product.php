<!-- start of header  -->
<?php
include("Header.php"); ?>
<!-- end of header  -->

<!-- start of product  -->
<?php
// print_r();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_to_cart_submit'])) {
        $cart->addToCart2($_POST['user_id'], $_POST['item_id'], $_POST['quantity']);
    }
    if (isset($_POST['remove_from_cart_submit'])) {
        $cart->deleteCartItem2($_POST['item_id']);
    }
}

$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item) {
    if ($item['item_id'] == $item_id) {
?>
        <!-- start of product  -->
        <section class="py-3" id="product">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item["item_image"] ?? "./assets/products/1.png" ?>" alt="" class="img-fluid" />
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
                                    <?php
                                    if (in_array($item["item_id"], $cart->getCartId($product->getData("cart")))) {
                                        echo '<button type="submit" name = "remove_from_cart_submit" class="btn btn-success font-size-12 form-control" >Added To cart</button>';
                                    } else {
                                        echo '<button type="submit" name = "add_to_cart_submit" class="btn btn-warning font-size-12 form-control"> Add To cart </button>';
                                    }
                                    ?>
                                    <button type="submit" name="top_sale_submit" class="btn btn-danger font-size-12 form-control">Proceed to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-balooo font-size-20"><?php echo $item["item_name"] ?? "UnKnown" ?></h5>
                        <small>Catagory : <?php echo $item["item_catagory"] ?? "Brand" ?></small>
                        <hr />
                        <!-- product price  -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Deal Price</td>
                                <td class="font-size-20 text-danger">
                                    $
                                    <span><?php echo $item["item_price"] ?? "0" ?></span>
                                </td>
                            </tr>
                        </table>
                        <!-- end of product price  -->
                        
                        <hr />
                        <!-- order details  -->
                        <div class="font-rale d-flex flex-column text-dark">
                            <small>
                                Sold by
                                <a href="#"><?php echo $item["seller"] ?? "unknown" ?></a>
                                
                            </small>
                        </div>

                        <hr />
                        <!-- end of order details  -->
                        <div class="row">
                            <div class="col-6">
                                <!-- product qty section  -->
                                <div class="qty d-flex">
                                    <h6 class="font-baloo">Qty</h6>
                                    <div class="px-4 d-flex font-rale">
                                        <button data-id=<?php echo $item["item_id"] ?? "0" ?> data-user_id="<?php echo $_SESSION["user_id"]; ?>" class="qty-up border bg-light">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <input type="text" class="qty-input border px-2 w-50 bg-light" disabled value="<?php echo $cart->getCartQuantity($cart->getCartItem($userid = $_SESSION["user_id"]), $item["item_id"]) ?>" placeholder=" <?php echo $cart->getCartQuantity($cart->getCartItem($userid = $_SESSION["user_id"]), $item["item_id"]) ?>" data-id=<?php echo $item["id"] ?? "0" ?> />
                                        <button data-id=<?php echo $item["item_id"] ?? "0" ?> data-user_id="<?php echo $_SESSION["user_id"]; ?>"  class="qty-down border bg-light">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- end of product qty section   -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12" style="margin-top : 100px">
                        <h6 class="font-rubik">Product Description</h6>
                        <hr />
                        <p class="font-rale font-size-14">
                        <?php echo $item["item_description"] ?? "0" ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
?>
<!-- end of product  -->

<!-- start of footer  -->
<?php include("./Footer.php"); ?>
<!-- end of foooter  -->