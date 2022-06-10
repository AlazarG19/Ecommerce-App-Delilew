<?php
include("./Functions.php");
?>
<!-- start of header fle  -->
<?php include("./Components/Header.php") ?>
<!-- end of header fle  -->
<section class="main">
  <div class="main-top">
    <h1>Items List</h1>
  </div>
  <div class="items">
    <?php foreach($product->getAllProduct() as $item){?>
      <div class="card">
        <img src="<?php echo $item["item_image"] ?? "unknown" ?>" />
        <h4>Name : <?php echo $item["item_name"] ?? "unknown" ?></h4>
        <p>Item Id :<?php echo $item["item_id"] ?? 0 ?></p>
        <p>Seller : <?php echo $item["seller"]?? "unknown" ?></p>
        <p>Price : <?php echo $item["item_price"]?? 0 ?></p>
        <button> <a href= <?php printf("%s?itemid=%s","Product.php",$item["item_id"]); ?>>Details</a> </button>
      </div>
    <?php }?>
</section>
</div>
</body>
</html>