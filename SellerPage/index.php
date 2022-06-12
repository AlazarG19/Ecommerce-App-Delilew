<?php session_start(); ?>
<?php 
include("db.php");
if(isset($_SESSION['seller_id']) == null){
  $_SESSION['seller_id'] = "";
}
if($_SESSION['seller_id'] != ""){
  $id = $_SESSION['seller_id'];
  $sql = "SELECT userName FROM seller where seller_id = '$id';";
  $results = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($results);
  while($row = mysqli_fetch_assoc($results)){
      $name = $row['userName'];
  }
}
?>
<?php 
    
?>
      <div class="big-wrapper light">
      <?php include("./Header.php"); ?>
        <div class="showcase-area">
          <div class="container">
            <div class="left">
              <div class="big-title">
                <h1>Welcome <?php echo isset($_SESSION["seller_id"])&& $_SESSION["seller_id"] != "" ? $name : "Seller" ?></h1>
                <h1>Start Selling now.</h1>
              </div>
              <p class="text">
                Browse through the navbar to find what you want and need.
              </p>
              <?php
              echo isset($_SESSION["seller_id"])&& $_SESSION["seller_id"] != ""?
              "<div class='cta'> </div>":"<div class='cta'>
              <a href='./Components/seller.php' class='btn'>Sign Up</a>
            </div>"  ;

              ?>
            </div>

            <div class="right">
              <img src="./img/person.png" alt="front Image" class="person" />
            </div>
          </div>
        </div>

      </div>
    </main>

    <!-- JavaScript Files -->

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    
  </body>
</html>
