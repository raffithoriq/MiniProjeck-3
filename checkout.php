<?php

require 'function.php';

// cek jika user belum login, maka alihkan ke halaman login
if (!isset($_SESSION['is_login'])) {
  header('Location: login.php');
  exit;
}

if (isset($_POST['submit'])) {
  checkout($_POST);
  header('Location: thankyou.php');
  exit;
}

$cart = getDetailCart();

$total = 0;

if (count($cart) == 0) {
  header('Location: shop.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Checkout</title>
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
                    <li>
                      <a href="cart.php" class="site-cart" title="Cart">
                        <span class="icon icon-shopping_cart"></span>
                      </a>
                    </li>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- AND NAVBAR -->

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.php">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <form method="POST" action="">
          <div class="row">

            <div class="col-md-6 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Billing Details</h2>
              <div class="p-3 p-lg-5 border">
                
                <div class="form-group">
                  <label for="c_fname" class="text-black">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="fullname" value="<?= $_SESSION['user']['name'] ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="address" placeholder="Street address" required>
                </div>

                <div class="form-group">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="phone" placeholder="Phone Number" required>
                </div>

                <div class="form-group">
                  <label for="c_order_notes" class="text-black">Order Notes</label>
                  <textarea name="notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                </div>

              </div>
            </div>

            <div class="col-md-6"> 
              <div class="row mb-5">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Your Order</h2>
                  <div class="p-3 p-lg-5 border">
                    <table class="table site-block-order-table mb-5">
                      <thead>
                        <th>Product</th>
                        <th>Total</th>
                      </thead>
                      <tbody>

                        <?php foreach($cart as $item) { ?>
                          <tr>
                            <td>
                              <?= $item['name'] ?>
                              <strong class="mx-2">x</strong> 
                              <?= $item['quantity'] ?>
                            </td>
                            <td>
                              <?php 
                              
                              $subtotal_per_product = intval($item['price']) * intval($item['quantity']);
                              $total += $subtotal_per_product

                              ?>

                              $<?= number_format($subtotal_per_product, 0, '', ',') ?>
                            </td>
                          </tr>
                        <?php } ?>

                        <tr>
                          <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                          <td class="text-black font-weight-bold">
                            <strong>$<?= number_format($total, 0, '', ',') ?></strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                      <div class="collapse" id="collapsebank">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-3">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                      <div class="collapse" id="collapsecheque">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="border p-3 mb-5">
                      <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                      <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                          <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" name="submit" value="Place Order" class="btn btn-primary btn-lg py-3 btn-block">
                    </div>

                  </div>
                </div>
              </div>

            </div>

          </div>
        </form>
      </div>
    </div>

    <!-- FOOTER -->
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a
                      href="https://scramblerducati.com/ww/?_gl=1*143mo9e*_ga*NjQxMDI2NDYyLjE3MTE2MzEyNDk.*_ga_8W811JZPVD*MTcxMTg4OTk0Ni40LjEuMTcxMTg5NzEzMC4wLjAuMA..">SCAMBLER
                      DUCATI</a></li>
                  <li><a href="https://configurator.ducati.com/bikes/ww/en">Ducati Configurator</a></li>
                  <li><a
                      href="https://www.ducati.com/ww/en/experience/ducati-riding-experience/riding-courses">Academy</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="https://www.ducati.com/ww/en/racing/motogp/home">MotoGP</a></li>
                  <li><a href="https://www.ducati.com/ww/en/racing/superbike/home">WorldSBK</a></li>
                  <li><a href="https://www.ducati.com/ww/en/racing/off-road">Off-Road</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="shop.php">Shopping</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="#" class="block-6">
              <img src="images/bajuducati.jpg" alt="Image placeholder" class="img-fluid rounded mb-4" />
              <h3 class="font-weight-light mb-0">Finding Your t-shirt</h3>
              <p>Promo from April 10 &mdash; 15, 2024</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">Via Antonio Cavalieri Ducati, 3, 40132 Bologna BO, Italia</li>
                <li class="phone"><a href="tel://23923929210">+390516413111</a></li>
                <li class="email">ducati@gmail.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email" />
                  <input type="submit" class="btn btn-sm btn-primary" value="Send" />
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
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
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>