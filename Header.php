<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

  <!-- custom css  -->
  <link rel="stylesheet" href="style.css" />
  <title>Delilew</title>
  <?php
  session_start();
  if (isset($_SESSION["user_id"]) == null) {
      $number =  random_int(1, 100000);
      $_SESSION["user_id"] = $number;
    }
  ?>
  <?php include("./Functions.php") ?>
</head>

<body>
  <!-- start header -->
  <header>
    <!-- primary navigation  -->
    <nav class="navbar navbar-expand-lg navbar-dar color-second-bg">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php">Delilew</a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav m-auto font-rubik">

            <a class="nav-link text-white" href="index.php">
              Product
            </a>
            <a class="nav-link text-white" href="SellerPage/index.php">Wanna Be A Seller?</a>
          </div>
          <form action="#" class="font-size-14 font-rale">
            <a href="Cart.php" class="py-2 rounded-pill color-primary-bg">
              <span class="font-size-16 px-2 text-white">
                <i class="fas fa-shopping-cart"></i>
              </span>
              <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($cart->getCartItem($userid = $_SESSION["user_id"])) ?></span>
            </a>
          </form>
        </div>
      </div>
    </nav>
    <!-- end of primary navigation  -->
  </header>
  <!-- endheader -->
  <!-- start main -->
  <main class="main-site">