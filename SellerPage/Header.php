
<?php 
if(isset($_POST['logout'])){
    $_SESSION['seller_id'] = null;
    header("Location:" . $_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Seller Landing Page</title>
      <link rel="stylesheet" href="landingstyle.css" />
  </head>

  <body>
      <main>
          <header>
              <div class="container">
                  <div class="links">
                      <ul>
                          <?php echo isset($_SESSION["seller_id"])? 
                          "<li><a href='./Components/viewAllProducts.php'>View And Edit Own Product</a></li>".
                           "<li><a href='#'>Edit Own Product</a></li>".
                          "<li><a href='./Components/sellerView.php'>Add New Product</a></li> ".
                          "<li>
                          <form  method='post'>
                            <input  type='hidden' name='logout' value='Logout'>
                            <button type='submit' class='btn' style = 'margin-left : 20px; border : none; font-family : Poppins' name = 'logout' >Logout</button>
                            
                            </form>
                          </li>":
                          "<li><a href='./signin.php' class='btn btn-login'>Login</a></li>"; ?>
                      </ul>
                  </div>
              </div>
          </header>