<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome Cdn Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="#" class="logo">
              <img src="./assets/4_(50).jpg" />
              <span class="nav-item">Admin</span>
            </a>
          </li>
          <li  >
            <a href="index.php">
              <i  class="fas fa-chart-bar"></i>
              <span  class="nav-item">Items</span>
            </a>
          </li>
          <li>
            <a href="Sellers.php">
              <i class="fas fa-menorah"></i>
              <span class="nav-item">Sellers</span>
            </a>
          </li>
          <li><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Add Admin</span>
        </a></li>
          <li>
          <a href="ValidateProduct.php">
              <i class="fas fa-database"></i>
              <span class="nav-item">Validate Item</span>
            </a>
          </li>
          <li>
            <a href="ReportedItems.php">
              <i style="color: #4AD489;" class="fas fa-chart-bar"></i>
              <span style="color: #4AD489;" class="nav-item">Reported Items</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Setting</span>
            </a>
          </li>
          <form action="./Components/logout.php" method="post">
            <li>
              <button type="submit" name="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Logout</span>
              </button>
            </li>
          </form>
          <li>
            <a href="#" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a>
          </li>
        </ul>
      </nav>
