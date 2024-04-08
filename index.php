<?php 

require 'function.php';


// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah pengguna sudah masuk atau belum
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    // Set cookie jika pengguna sudah masuk
    setcookie('user_logged_in', 'true', time() + (1 * 24 * 60 * 60), '/');

    // Tampilkan alert menggunakan Bootstrap CSS
    echo '<div id="myAlert" class="alert alert-danger text-center" role="alert">';
    echo 'This page requires cookies';
    echo '</div>';
    echo "<script>
    function hideAlert() {
        setTimeout(function() {
            document.getElementById('myAlert').style.display = 'none';
        }, 2000);
    }

    document.addEventListener('DOMContentLoaded', function() {
        hideAlert();
    });
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DUCATI &mdash; Discover the 2024 range</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700" />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="css/aos.css" />

    <link rel="stylesheet" href="css/style.css" />
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
                    👋🏻 Selamat Datang <?php echo $_SESSION['user']['name']?>
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

      <!-- FOTO HOME -->
      <div class="site-blocks-cover" style="background-image: url(images/userducati.jpg)" data-aos="fade">
        <div class="container">
          <div class="row align-items-start align-items-md-center justify-content-end"></div>
        </div>
      </div>
      <!-- AND -->

      <!-- LAYANAN -->
      <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
              <div class="icon mr-4 align-self-start">
                <span class="icon-truck"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">Free Shipping</h2>
                <p>Enjoy the convenience of shopping without shipping costs! We have a special offer for you - FREE SHIPPING on all your purchases. Find your favorite products now and enjoy delivery at no additional cost.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
              <div class="icon mr-4 align-self-start">
                <span class="icon-refresh2"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">Free Returns</h2>
                <p>
                  Ducati is committed to ensuring your shopping experience is truly satisfying. Therefore, we are happy to offer a free returns service for all products you purchase from us, if you are not completely satisfied with your
                  purchase, please do not hesitate to return it. We will process your return at no additional charge.
                </p>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
              <div class="icon mr-4 align-self-start">
                <span class="icon-help"></span>
              </div>
              <div class="text">
                <h2 class="text-uppercase">Customer Support</h2>
                <p>We are ready to help you with any questions, complaints or requests you may have. Please provide information regarding your problem, and we will do our best to provide a satisfactory solution.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- AND LAYANAN -->

      <!-- RACETRAK -->
      <div class="site-section site-blocks-2">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
              <a class="block-2-item" href="https://www.ducati.com/ww/en/experience/ducati-riding-experience/riding-courses/racetrack-academy/one-to-one-v4-s">
                <figure class="image">
                  <img src="images/v4s.jpg" alt="" class="img-fluid" />
                </figure>
                <div class="text">
                  <span class="text-uppercase">Racetrack</span>
                  <h3>Panigale V4S</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
              <a class="block-2-item" href="https://www.ducati.com/ww/en/experience/ducati-riding-experience/riding-courses/racetrack-academy/one-to-one-panigale-v4-r">
                <figure class="image">
                  <img src="images/v4r.jpg" alt="" class="img-fluid" />
                </figure>
                <div class="text">
                  <span class="text-uppercase">Racetrack</span>
                  <h3>Panigale V4R</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
              <a class="block-2-item" href="https://www.ducati.com/ww/en/experience/ducati-riding-experience/riding-courses/racetrack-academy/one-to-one-superleggera-v4">
                <figure class="image">
                  <img src="images/superlegera.jpg" alt="" class="img-fluid" />
                </figure>
                <div class="text">
                  <span class="text-uppercase">Racetrack</span>
                  <h3>Superleggera V4</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- RACETRAK -->

      <!-- PRODUK -->
      <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
              <h2>Products</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="nonloop-block-3 owl-carousel">
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="images/poloducati.jpg" alt="Image placeholder" class="img-fluid" />
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">Short-sleeved polo</a></h3>
                      <p class="mb-0">Shirt-GP Team Replica 24 Men</p>
                      <p class="text-primary font-weight-bold">$119</p>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="images/gloves.jpg" alt="Image placeholder" class="img-fluid" />
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">Gloves</a></h3>
                      <p class="mb-0">Short-sleeved polo</p>
                      <p class="text-primary font-weight-bold">$109</p>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="images/racingsuit.jpg" alt="Image placeholder" class="img-fluid" />
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">Racing suit</a></h3>
                      <p class="mb-0">Ducati Corse K3</p>
                      <p class="text-primary font-weight-bold">$2,990.00</p>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="images/cap.jpg" alt="Image placeholder" class="img-fluid" />
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">Cap</a></h3>
                      <p class="mb-0">Cap-GP Team Replica 23 EB23</p>
                      <p class="text-primary font-weight-bold">$49.00</p>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="images/sarung.jpg" alt="Image placeholder" class="img-fluid" />
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="#">Bike Canvas</a></h3>
                      <p class="mb-0">Paddock bike canvas</p>
                      <p class="text-primary font-weight-bold">$419.00</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- AND PRODUK -->

      <!-- BIG SALE -->
      <div class="site-section block-8">
        <div class="container">
          <div class="row justify-content-center mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
              <h2>Big Sale!</h2>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 mb-5">
              <a href="#"><img src="images/sepatu.jpg" alt="Image placeholder" class="img-fluid rounded" /></a>
            </div>
            <div class="col-md-12 col-lg-5 text-center pl-md-5">
              <h2><a href="#">Down To 50%</a></h2>
              <p class="post-meta mb-4"><a href="#"></a> <span class="block-8-sep">&bullet;</span> APRIL 1, 2024</p>
              <p>$109.5</p>
              <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
            </div>
          </div>
        </div>
      </div>
      <!-- AND BIG SALE -->

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
                    <li><a href="https://scramblerducati.com/ww/?_gl=1*143mo9e*_ga*NjQxMDI2NDYyLjE3MTE2MzEyNDk.*_ga_8W811JZPVD*MTcxMTg4OTk0Ni40LjEuMTcxMTg5NzEzMC4wLjAuMA..">SCAMBLER DUCATI</a></li>
                    <li><a href="https://configurator.ducati.com/bikes/ww/en">Ducati Configurator</a></li>
                    <li><a href="https://www.ducati.com/ww/en/experience/ducati-riding-experience/riding-courses">Academy</a></li>
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
