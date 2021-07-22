<!DOCTYPE html>
<html lang="en">

<?php include 'dbcon.php' ?>

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

<body class="admin-body">
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
            <a class="nav-link" aria-current="page" href="index.php">BACK TO STORE PAGE</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- DASHBOARD -->
  <div class="container-fluid dashboard-container">
    <h1>ADMIN DASHBOARD</h1> 
    <br>
    <div class="row modifier-container">
      <div class="col-4 view-container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="#products" aria-selected="true">Products</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="add-product-tab" data-bs-toggle="tab" data-bs-target="#add-product" type="button" role="tab" aria-controls="#add-product" aria-selected="false">Add Product</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="archive-products-tab" data-bs-toggle="tab" data-bs-target="#archive-products" type="button" role="tab" aria-controls="#archive-products" aria-selected="false">Archive</button>
        </li>
      </ul>
      <!-- PRODUCTS DASHBOARD -->
      <div class="tab-content" id="myTabContent">
        <!-- LIST OF PRODUCTS -->
        <div class="tab-pane fade show active" id="products" role="tabpanel" aria-labelledby="products-tab">
          <?php
          $sql = "SELECT * FROM product";
          $result = mysqli_query($conn, $sql);
          ?>
          <table class="table table-hover">
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php 
                while($row = $result->fetch_assoc()) {
                  if($row['product_stock'] == 1) {
                    $id = $row['product_id'];
                  ?> 
                  <tr class="view-table-row">
                    <td><img class="table-img" src="assets/<?php echo $row['product_image'] ?>" 
                      alt="Photo not found"></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['product_price'] ?></td>
                    <td>
                      <a class="modify-icon" href="archiveproduct.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                          <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                      </a>
                      <a class="modify-icon delete-icon" href="deleteproduct.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- ADD PRODUCT -->
        <div class="tab-pane fade" id="add-product" role="tabpanel" aria-labelledby="add-product-tab">
          <form class="add-product-form" action="addproduct.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="add-product-name" class="form-label">Product Name</label>
              <input type="text" class="form-control" name="add-product-name" id="add-product-name" aria-describedby="add-product-name">
            </div>
      
                <div class="mb-3">
                  <label for="add-product-price" class="form-label">Price</label>
                  <input type="text" name="add-product-price" class="form-control" aria-label="add-product-price">
                </div>
            <div class="input-group mb-3">
              <input type="file" name="file" class="form-control" id="add-product-img">
            </div>
            
            <button type="add-product" name="add-product" class="btn btn-primary">Add Product</button>
          </form>
        </div>

        <!-- ARCHIVE -->
        <div class="tab-pane fade" id="archive-products" role="tabpanel" aria-labelledby="#archive-products-tab">
          <?php
          $sql = "SELECT * FROM product";
          $result = mysqli_query($conn, $sql);
          ?>
          <table class="table table-hover">
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php 
                while($row = $result->fetch_assoc()) {
                  if($row['product_stock'] == 0) {
                    $id = $row['product_id'];
                  ?> 
                  <tr class="view-table-row">
                    <td><img class="table-img" src="assets/<?php echo $row['product_image'] ?>" 
                      alt="Photo not found"></td>
                    <td><?php echo $row['product_name'] ?></td>
                    <td><?php echo $row['product_price'] ?></td>
                    <td>
                      <a class="modify-icon" href="activateproduct.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z"/>
                          <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 1.707V10.5a.5.5 0 0 1-1 0V1.707L5.354 3.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                      </a>
                      <a class="modify-icon delete-icon" href="deleteproduct.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>          

      </div>
      
    </div>
                
      <!-- ORDERS DASHBOARD -->

        <div class="col-7 view-container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="#orders" aria-selected="true">Orders</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="complete-tab" data-bs-toggle="tab" data-bs-target="#complete" type="button" role="tab" aria-controls="#complete" aria-selected="false">Completed</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab" aria-controls="#cancelled" aria-selected="false">Cancelled</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- LIST OF ORDERS -->
        <div class="tab-pane fade show active orders" id="orders" role="tabpanel" aria-labelledby="#orders-tab">
          <?php
          $sql="SELECT * FROM sales ORDER BY date_time DESC";
          $result = $conn->query($sql) or die($conn->error);
          ?>
          <table class="table table-hover">
            <tr>
              <th>Date Ordered</th>
              <th>Customer Name</th>
              <th>Mobile Number</th> 
              <th>Email</th>
              <th>Address</th>
              <th>Product Ordered</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php 
                while($row = $result->fetch_assoc()) {
                  if($row['cancelled'] == 0 && $row['completed'] == 0) {
                    $id = $row['sales_id'];
                  ?> 
                  <tr class="view-table-row">
                    <td><?php echo $row['date_time'] ?></td>
                    <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['product'] ?></td>
                    <td><?php echo $row['price'] ?></td>

                    <td>
                      <a class="modify-icon" href="completeorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                        </svg>
                      </a>
                      <a class="modify-icon delete-icon" href="cancelorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                          <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>

        <!-- COMPLETE ORDERS -->
        <div class="tab-pane fade orders" id="complete" role="tabpanel" aria-labelledby="#complete-tab">
          <?php
          $sql="SELECT * FROM sales ORDER BY date_time DESC";
          $result = mysqli_query($conn, $sql);
          ?>
          <table class="table table-hover">
            <tr>
              <th>Date Ordered</th>
              <th>Customer Name</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Address</th>
              <th>Product Ordered</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php 
                while($row = $result->fetch_assoc()) { 
                  if($row['completed'] == 1 && $row['cancelled'] == 0) {
                    $id = $row['sales_id'];
                  ?>  
                  <tr class="view-table-row">
                    <td><?php echo $row['date_time'] ?></td>
                    <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['product'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    
                    <td>
                      <a class="modify-icon" href="undocompleteorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                          <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                        </svg>
                      </a>
                      <a class="modify-icon delete-icon" href="deleteorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php   
                  }
                }
              ?>
              
            </tbody>
          </table>
        </div>

        <!-- CANCELLED ORDERS -->
        <div class="tab-pane fade orders" id="cancelled" role="tabpanel" aria-labelledby="#cancelled-tab">
          <?php
          $sql="SELECT * FROM sales ORDER BY date_time DESC";
          $result = mysqli_query($conn, $sql);
          ?>
          <table class="table table-hover">
            <tr>
              <th>Date Ordered</th>
              <th>Customer Name</th>
              <th>Mobile Number</th>
              <th>Email</th>
              <th>Address</th>
              <th>Product Ordered</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <tbody>
              <?php 
                while($row = $result->fetch_assoc()) { 
                  if($row['cancelled'] == 1 && $row['completed'] == 0) {
                    $id = $row['sales_id'];
                  ?>  
                  <tr class="view-table-row">
                    <td><?php echo $row['date_time'] ?></td>
                    <td><?php echo $row['full_name'] ?></td>
                    <td><?php echo $row['mobile'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['product'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    
                    <td>
                      <a class="modify-icon" href="recoverorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                          <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                        </svg>
                      </a>
                      <a class="modify-icon delete-icon" href="deleteorder.php<?php echo '?$id='.$id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </a>
                    </td>
                  </tr>
                  <?php   
                  }
                }
              ?>
              
            </tbody>
          </table>
        </div>          

      </div>
      
    </div>
      
    </div>
    <div class="row modifier-container">
      <div class="col total-view-container">
        <div class="row">
          <div class="col"><h2>TOTAL SALES</h2></div>
          <?php 
            $sql="SELECT SUM(price) FROM sales WHERE completed=TRUE"; 
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
          ?>
          <div class="col total-container"><h2 class="total">₱ <?php echo implode("₱",$row);  ?></h2></div>
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
</footer>
</html>