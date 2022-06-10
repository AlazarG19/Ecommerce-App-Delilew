<!-- start of product header  -->
<?php include("./Components/ProductHeader.php") ?>
<!-- end of product header  -->
<?php include("./Components/DbComponent/RemoveClass.php")?>

<?php
include("./Functions.php");

?>
<?php $item =  $_GET["itemid"] ?? 0 ?>

<?php if($_SERVER["REQUEST_METHOD"] == "POST"){
    $remove = new RemoveClass($db);
    if(isset($_POST["delete-submit"])){
        $remove->remove($table = "reported_item",$columns = "item_id",$info = $_POST["item_id"],$isstring = false);
        $product->deleteItem("product",$_POST["item_id"]);

    }
    if(isset($_POST["remove-report"])){
        $remove->remove($table = "reported_item",$columns = "item_id",$info = $_POST["item_id"],$isstring = false);
        header("Location: ./ReportedItems.php");
    }
} ?>
<?php $reportinfo = $get->getBy($table = "reported_item", $column = "item_id", $info = $item, $isstring = false)[0]["reason"] ?>

<!-- start #main-site -->
<main id="main-site">

    <!--   product  -->
    <section id="product" class="py-3">
        <div class="container">
            <?php foreach ($product->getProductById("product", $item) as $item) { ?>
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item["item_image"] ?>" alt="product" class="img-fluid">
                        <div class="form-row pt-4 font-size-16 font-baloo">
                            <div class="col">

                                <form method="post">
                                    <input type="hidden" name = "item_id" value = "<?php echo $item["item_id"] ?>"  >
                                    <button type="submit" name = "delete-submit" class="btn btn-danger form-control">Remove Item</button>
                                </form>
                            </div>
                            <div class="col">
                            <form method="post">
                                    <input type="hidden" name = "item_id" value = "<?php echo $item["item_id"] ?>"  >
                                    <button type="submit" name = "remove-report" class="btn btn-warning form-control">Remove From Report</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-baloo font-size-20"><?php echo $item["item_name"] ?></h5>
                        <small><?php echo $item["item_catagory"] ?></small>

                        <hr class="m-0">

                        <!---    product price       -->
                        <table class="my-3">
                            <tr class="font-rale font-size-14">
                                <td>Price:</td>
                                <td class="font-size-20 text-danger">$<span><?php echo $item["item_price"] ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                            </tr>
                        </table>
                        <!---    !product price       -->

                        <hr>

                        <!-- order-details -->
                        <div id="order-details" class="font-rale d-flex flex-column text-dark">
                            <small>Added At: <?php echo $item["item_register"] ?></small>
                            <small>Sold by: <?php echo $item["seller"] ?></small>
                        </div>
                        <!-- !order-details -->

                        <h6 class="font-rubik">Product Description</h6>
                        <hr>
                        <p class="font-rale font-size-14"><?php echo $item["item_description"] ?></p>
                        <h6 class="font-rubik">Reported Reason</h6>
                        <hr>
                        <p class="font-rale font-size-14"><?php echo $reportinfo?></p>

                    </div>

                </div>
            <?php } ?>
        </div>
    </section>
    <!--   !product  -->

    </body>

    </html>