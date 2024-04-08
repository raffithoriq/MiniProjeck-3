<?php

require 'function.php';

$product_id = (isset($_GET['product_id'])) ? $_GET['product_id'] : NULL;

if ($product_id === NULL) {
  header('Location: shop.php');
  exit;
}

if (isset($_POST['submit'])) {
  addProductToCart($_POST);
  header('Location: cart.php');
  exit;
}

$product = getProduct($product_id);

$other_products = getProducts($product['category_id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Shop</title>
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

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong
              class="text-black">
              <?= $product['name'] ?>
            </strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="<?= $product['image'] ?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">
              <?= $product['name'] ?>
            </h2>
            <p>
              <?= $product['description'] ?>
            </p>
            <p>
              <strong class="text-primary h4">
                $<?= number_format($product['price'], 0, '', ',') ?>
              </strong>
            </p>
            
            <form action="" method="POST">
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                  </div>
                  <input type="hidden" name="product_id" value="<?= $product_id ?>"/>
                  <input 
                    type="text" 
                    name="quantity" 
                    class="form-control text-center" 
                    value="1" 
                    placeholder=""
                    aria-label="Example text with button addon" 
                    aria-describedby="button-addon1"/>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                  </div>
                </div>
              </div>

              <p>
                <input type="submit" class="buy-now btn btn-sm btn-primary" name="submit" value="Add To Cart">
              </p>
            </form>

          </div>
        </div>
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