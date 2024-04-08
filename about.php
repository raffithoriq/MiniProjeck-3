<?php

require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>The Ducati History</title>
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
              class="text-black">About</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6">
            <div class="block-16">
              <figure>
                <img src="images/historiducati.jpg" alt="Image placeholder" class="img-fluid rounded" />
              </figure>
            </div>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5">
            <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">How We Started</h2>
            </div>
            <p>
              Ducati was founded in 1926 in Bologna, Italy, by three brothers Adriano, Bruno, and Marcello Ducati
              together with their father, Antonio Cavalieri Ducati. Initially, the company focused on producing radio
              components before switching to the motorcycle industry. In 1935, Ducati produced its first motorcycle, the
              Cucciolo, which became popular and helped expand their business. Over the following decades, Ducati
              strengthened its reputation as a premium sports motorcycle manufacturer through technical innovation and
              success in motor racing. In 1983, Ducati was acquired by Cagiva Group and then by Investindustrial
              Holdings in 1996. Investindustrial strengthened Ducati's position as a premium motorcycle brand with a
              focus on research and development, technology and product development. Today, Ducati remains one of the
              world's most prominent motorcycle brands, renowned for its iconic designs, high performance and active
              presence in the world of motorcycling.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- TEAM -->
    <div class="site-section border-bottom" data-aos="fade">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>The Team</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/AntonioCavalieriDucati.jpeg" alt="Image placeholder" class="mb-4" />
                  <h3 class="block-38-heading h4">Antonio Cavalieri Ducati</h3>
                  <p class="block-38-subheading">Founder</p>
                </div>
                <div class="block-38-body">
                  <p>Antonio Cavalieri Ducati is an Italian entrepreneur and industrialist best known for founding the
                    Ducati motorcycle company with his three brothers. The company initially focused on producing radio
                    components before switching to making motorcycles. Under Antonio's leadership, Ducati became famous
                    for producing high-quality motorbikes and winning many championships in motorbike racing. His
                    contributions have made Ducati one of the most well-known and respected brands in the motorcycle
                    industry.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/AdrianoCavalieriDucati.jpeg" alt="Image placeholder" class="mb-4" />
                  <h3 class="block-38-heading h4">Adriano Cavalieri Ducati</h3>
                  <p class="block-38-subheading">Founder</p>
                </div>
                <div class="block-38-body">
                  <p>Adriano Cavalieri Ducati is the son of an Italian engineer and entrepreneur who is one of the
                    founders of Ducati Motor Holding Spa, namely Antonio Cavalieri Ducati. Together with his brothers,
                    he founded the company in 1926. Adriano was involved in the design and technological development of
                    Ducati motorcycles, helping to build the company's reputation as the world's leading motorcycle
                    manufacturer. Although his position within the company is not specific, his contribution to the
                    development of the company and the Italian motorcycle industry is very significant.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/BrunoCavalieriDucati.jpeg" alt="Image placeholder" class="mb-4" />
                  <h3 class="block-38-heading h4">Bruno Cavalieri Ducati</h3>
                  <p class="block-38-subheading">Founder</p>
                </div>
                <div class="block-38-body">
                  <p>Bruno Cavalieri Ducati is an Italian entrepreneur who is one of the founders of Ducati Motor
                    Holding Spa. Together with his brothers, he founded the company in 1926, initially focusing on the
                    production of radio components before switching to the motorcycle industry. His contribution to the
                    development of the company helped build Ducati's reputation as the world's leading motorcycle
                    manufacturer. Ducati Motor Holding Spa continues to grow and become one of the leading brands in the
                    motorcycle industry. Bruno died in 1954, but his legacy lives on in Ducati's success and reputation.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-38 text-center">
              <div class="block-38-img">
                <div class="block-38-header">
                  <img src="images/MarcelloCavalieriDucati.jpeg" alt="Image placeholder" class="mb-4" />
                  <h3 class="block-38-heading h4">Marcello Cavalieri Ducati</h3>
                  <p class="block-38-subheading">Founder</p>
                </div>
                <div class="block-38-body">
                  <p>Marcello Cavalieri Ducati is an Italian businessman who was one of the founders of Ducati Motor
                    Holding Spa with his brothers. The company initially focused on producing radio components before
                    shifting to the motorcycle industry. His contributions helped build Ducati's reputation as a
                    world-renowned manufacturer of high-quality motorcycles. Although his role in the company was not
                    always clear, Marcello was instrumental in the success of the family company. He died in 1988, but
                    his legacy lives on in Ducati history.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- AND TEAM -->

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
              <p>Enjoy the convenience of shopping without shipping costs! We have a special offer for you - FREE
                SHIPPING on all your purchases. Find your favorite products now and enjoy delivery at no additional
                cost.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
              <span class="icon-refresh2"></span>
            </div>
            <div class="text">
              <h2 class="text-uppercase">Free Returns</h2>
              <p>
                Ducati is committed to ensuring your shopping experience is truly satisfying. Therefore, we are happy to
                offer a free returns service for all products you purchase from us, if you are not completely satisfied
                with your
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
              <p>We are ready to help you with any questions, complaints or requests you may have. Please provide
                information regarding your problem, and we will do our best to provide a satisfactory solution.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- AND LAYANAN -->

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