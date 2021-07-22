<!DOCTYPE html>
<html lang="en">

<?php include 'dbcon.php'; ?>

<head>
  <title>Naughty Kids Apparel Co.</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Work+Sans:wght@400;500;700&display=swap"
    rel="stylesheet">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <style>
    <?php include "style.css" ?>
  </style>

  <script type="text/javascript" src="script.js"></script>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="assets\logo.png" alt="Naughty Kids logo" class="nav-logo">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <img src="assets\menu_black_36dp.svg" alt="Menu icon">
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php #shop-section">SHOP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about-section">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq-section">FAQ</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <img src="assets\Vector- bag.svg" alt="Bag icon" class="bag-icon">
              <span id="item-count">0</span>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- SHOP -->
  <div class="container-fluid shop-container">
    <div class="row">
      <h1><br>ALL PRODUCTS</h1>
    </div>
    <div class="row search-row">
        <form class="search-group" action="#" method="POST">
          <input type="text" name="search-box" placeholder="Search" class="search-box">
          <button id="search-btn" type="submit" name="search" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
            <a href="#">
              <img src="assets\Vector- search.svg" alt="Search icon" class="search-icon">
            </a>
          </button>
        </form>
    </div>


<!-- SEARCH RESULT -->
<div class="container-fluid products-row">
  <?php 
    if(isset($_POST["search"])) {
    $searched_item = $_POST['search-box'];
    $searched_caps = strtoupper($searched_item);

    $sql = "SELECT * FROM product WHERE product_name LIKE '%$searched_item%' OR product_name LIKE '%$searched_caps%'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      if($row['product_stock'] == 1) {
      $id = $row['product_id'];
      ?>
      <div class="card" style="width: 20rem;">
      <div class="overlay-trigger">
        <img src="assets\<?php echo $row['product_image'] ?>" class="card-img-top" alt="Photo Not Found">
        <div class="overlay">
           <a href="buyproduct.php<?php echo '?$id='.$id; ?>">
           <button type="button" name="buy" class="card-text add-to-cart">
             BUY NOW
           </button>
           </a>
        </div>
      </div>
      <div class="card-body">
        <p class="card-text"><?php echo $row['product_name'] ?>
        <br>₱<?php echo $row['product_price'] ?></p>
      </div>
      </div>
      <?php
      }
    }
  }
  ?>
</div>

  <!-- FAQ -->
  <div class="container-fluid general-container">
    <div class="row about-text-container">
      <h1>FREQUENTLY ASKED QUESTIONS</h1>
    </div>

    <div class="row accordion-container">
      <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              How can I order?
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">You can order here by adding items of you choice to your bag and proceed to
              checkout.
              You could also order by contacting us on our <a href="https://www.facebook.com/nkidsph"
                target="_blank">Facebook Page</a>.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
              What are the modes of payment?
            </button>
          </h2>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">You can pay through GCash, Palawan Express, Cebuana Lhuillier, or Cash on
              Delivery.</div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
              What is your shipping schedule?
            </button>
          </h2>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">We only ship on Monday, Wednesday, and Friday, holidays are not included on our
              shipping schedule.</div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
              Will I be able to replace wrong shirt size?
            </button>
          </h2>
          <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Sizes will only be replaceable if there was an issue in processing the orders
              but if the size you indicated in your order is what you receive, we are not able to replace it and it is
              none of our concern anymore.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SIGN IN -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
        <div class="container login-container">
          <form class="login-form" method="POST" action="login.php">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="username" name="username" class="form-control" id="username" aria-describedby="username">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="sign-in" name="sign-in" class="btn btn-primary btn-login">Sign In</button>
          </form>  
      </div>
    </div>
    <div class="modal-footer">
    </div>
  </div>
  </div>
</div>
</body>

<footer>
  <img src="assets\logo-md.png" alt="Naughty Kids logo" class="footer-logo">
  <div class="row footer-container">
    <p class="footer-text">Naughty Kids Apparel Co. will release more products in the future. Follow us on our social
      media channels for
      updates on our new products and promos.</p>
  </div>
  <div class="social-icons">
    <a href="https://www.facebook.com/nkidsph" target="_blank">
      <svg class="fb-icon" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor"
        class="bi bi-facebook" viewBox="0 0 16 16">
        <path
          d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
      </svg>
    </a>
  </div>
  <button type="button" name="sign-in" class="btn btn-primary admin-sign-in" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Sign in as Admin
  </button>
  
</footer>
</html>
