<?php
include("./Functions.php");
?>
<!-- start of header fle  -->
<?php include("./Components/ReportedItemHeader.php") ?>
<!-- end of header fle  -->
<section class="main">
  <div class="main-top">
    <h1>Reported Items List</h1>
  </div>
  <div class="items">
    <?php foreach($get->get($table = "reported_item") as $item){?>
      <?php $item2 = $get->getBy($table = "product", $column = "item_id", $info = $item["item_id"] , $isstring = false)?>
      <div class="card">
        <img src="<?php echo $item2[0]["item_image"] ?? "unknown" ?>" />
        <h4>Name : <?php echo $item2[0]["item_name"] ?? "unknown" ?></h4>
        <p>Item Id :<?php echo $item2[0]["item_id"] ?? 0 ?></p>
        <p>Seller : <?php echo $item2[0]["seller"]?? "unknown" ?></p>
        <p>Price : <?php echo $item2[0]["item_price"]?? 0 ?></p>
        <button> <a href= <?php printf("%s?itemid=%s","ReportedItemsDetail.php",$item["item_id"]); ?>>Details</a> </button>
      </div>
    <?php }?>
</section>
</div>
</body>
</html>