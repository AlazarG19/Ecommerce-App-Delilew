<!-- start of header fle  -->
<?php include("./Components/SellersHeader.php") ?>
<?php include("./Functions.php") ?>
<?php 
$seller_id = 1;
 ?>
<!-- end of header fle  -->
<section class="main">
    <div class="main-top">
        <h1>Sellers</h1>
        <i class="fas fa-user-cog"></i>
    </div>
    <section class="seller">
        <div class="seller-list">
            <h1>Seller List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <th>User Name</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($get->get($table = "seller") as $item){ ?>
                    <tr>
                        <td><?php echo $item["seller_id"] ?></td>
                        <td><?php echo $item["firstName"] ?></td>
                        <td><?php echo $item["lastName"] ?></td>
                        <td><?php echo $item["userName"] ?></td>
                        <td>
                        <button> <a style="width: auto;" href=<?php printf("%s?sellerid=%s", "SellerInfo.php", $item["seller_id"]); ?>>Details</a> </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
</div>

</body>

</html>