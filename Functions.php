<?php
include("./Database/DBController.php");
// require product classs 
require("./Database/ProductClass.php");
// require cart class 
require("./Database/CartClass.php");
$db = new DBController();

$product = new ProductClass($db);

$cart = new CartClass($db);

$product_list = $product->getData();