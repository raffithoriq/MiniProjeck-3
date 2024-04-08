<?php

require 'function.php';

// cek jika user belum login, maka alihkan ke halaman login
if (!isset($_SESSION['is_login'])) {
  header('Location: login.php');
  exit;
}

$orders = getOrders();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Orders</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">
    <!-- NAVBAR -->
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">

          <div class="row align-items-center">
            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) { ?>
                <p class="m-0 font-weight-bold">
                  👋🏻 Selamat Datang
                  <?php echo $_SESSION['user']['name'] ?>
                </p>
              <?php } ?>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <img width="50" src="images/ducati_id.png" alt="ducati" />
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul class="list-unstyled mb-0">
                  <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) { ?>
                    <?php if ($_SESSION['user']['role'] === 'CUSTOMER') { ?>
                    <li>
                      <a href="cart.php" class="site-cart" title="Cart">
                        <span class="icon icon-shopping_cart"></span>
                      </a>
                    </li>
                    <?php } ?>
                    <li>
                      <a href="logout.php" title="Logout"><span class="icon icon-exit_to_app"></span></a>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="login.php" title="Login"><span class="icon icon-person"></span></a>
                    </li>
                  <?php } ?>
                  <li class="d-inline-block d-md-none ml-md-0">
                    <a href="#" class="site-menu-toggle js-menu-toggle">
                      <span class="icon-menu"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="admin-products.php">Products</a></li>
            <li><a href="admin-orders.php">Orders</a></li>
            <?php if ($_SESSION['user']['role'] === 'SUPERADMIN') { ?>
            <li><a href="admin-users.php">Users</a></li>
            <?php } ?>
          </ul>
        </div>
      </nav>
    </header>
    <!-- AND NAVBAR -->

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="site-blocks-table w-100">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Customer</th>
                  <th class="product-name">Items</th>
                  <th class="product-price">Amount</th>
                  <th class="">Time</th>
                  <th class="product-remove">Notes</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($orders as $order) { ?>
                  <tr>
                    <td class="text-left">
                      <p>
                        <?= $order['name'] ?>
                        <hr/>
                        <?= $order['address'] ?> <br/>
                        <hr/>
                        <?= $order['phone'] ?>
                      </p>
                    </td>
                    <td class="product-name text-left">

                    

                    <ul class="list-group list-group-flush">
                      <?php 
                      
                      $items = json_decode($order['items'], true);

                      foreach ($items as $item) {

                      $product = getProduct($item['product_id']);

                      if ($product == null) {
                        continue;
                      }
                      ?>

                      <li class="list-group-item">
                        <?= $product['name'] ?> <strong>x</strong> <?= $item['quantity'] ?>
                      </li>

                      <?php } ?>
                    </ul>

                    
                      
                    </td>
                    <td>
                      $<?= number_format($order['amount'], 0, '', ',') ?>
                    </td>
                    <td>
                      <?= $order['datetime'] ?>
                    </td>
                    <td>
                      <?= $order['notes'] ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER -->
    <footer class="site-footer border-top py-2">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <p class="m-0">
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              Ducati Motor Holding S.p.A.
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- AND FOOTER -->
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <script type="text/javascript">
    function deleteItem(rowNumber) {
      $('#item-' + rowNumber).remove();
    }
  </script>

</body>

</html>