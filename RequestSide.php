<?php
require("./Database/Cartclass.php");
require("./Database/DBController.php");
require("./Database/ProductClass.php");

$db = new DBController();
$cart = new CartClass($db);
$product = new ProductClass($db);
// print_r( $product->getProduct($_POST['itemid'])); 
if (isset($_POST["itemid"])) {
    if ($_POST["eval"] == "increment") {
        $result = $cart->increment($_POST["userid"], $_POST["itemid"]);
        echo json_encode(["result" => $result]);
        // echo json_encode($result);
    } else if ($_POST["eval"] == "decrement") {
        $result = $cart->decrement($_POST["userid"], $_POST["itemid"]);
        echo json_encode(["result" => $result]);
        // echo json_encode($result);
    } else if ($_POST["eval"] == "getid") {
        $result = $product->getProduct($_POST['itemid']);
        
        echo json_encode($result);
        // echo json_encode($result);
    }
}
