<?php 
include("./Components/DbComponent/DbController.php");
$db = new DBController();
include("./Components/DbComponent/ProductClass.php");
$product = new ProductClass($db);
include("./Components/DbComponent/GetClass.php");
$get = new GetClass($db);
include ("./Components/DbComponent/ValidateClass.php");
$validate = new ValidateClass($db);
?>