<?php

require 'function.php';

// cek jika user belum login, maka alihkan ke halaman login
if (!isset($_SESSION['is_login'])) {
  header('Location: login.php');
  exit;
}


$form_action = $_GET['action'];


if (isset($_POST['submit'])) {
  manageProduct($_POST);

  if ($form_action === 'create') {
    echo "<script>alert('Produk baru berhasil ditambahkan.'); window.location.href='admin-products.php'</script>";
  } else {
    echo "<script>alert('Produk berhasil diupdate.'); window.location.href='admin-products.php'</script>";
  }
}

$categories = getProductCategories();

$product = [
  'id'          => '',
  'image'       => '',
  'name'        => '',
  'category_id' => '',
  'price'       => 0,
  'description' => '',
];

if ($form_action === 'edit') {
  $product_id = $_GET['product_id'];
  $product    = getProduct($product_id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product</title>
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
        <div class="row mb-4">
          <div class="col-md-12 d-flex justify-content-between align-items-center">
            <a href="admin-products.php" class="btn btn-outline-primary btn-sm">Back</a>
            <h5 class="text-right d-inline m-0">
            <?= ($form_action === 'create') ? 'Add Product' : 'Edit Product' ?>
            </h5>
          </div>
        </div>
        
        <div class="row mb-5">
          <div class="col-md-12">
            <form action="" method="POST">
              <input type="hidden" name="form_action" value="<?= $form_action ?>">
              <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

              <div class="p-3 p-lg-5 border">

                <div class="form-group">
                  <label class="text-black">Image Link <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="image" value="<?= $product['image'] ?>" required>
                </div>

                <div class="form-group">
                  <label class="text-black">Product Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>" required>
                </div>

                <div class="form-group">
                  <label class="text-black">Product Price ($) <span class="text-danger">*</span></label>
                  <input type="number" min="0" class="form-control" name="price" value="<?= $product['price'] ?>" required>
                </div>

                <div class="form-group">
                  <label class="text-black">Product Category <span class="text-danger">*</span></label>
                  <select name="category_id" class="form-control" require>
                    <?php foreach ($categories as $category) { ?>
                      <option value="<?= $category['id'] ?>" <?= ($product['category_id'] === $category['id']) ? 'selected' : '' ?>>
                        <?= $category['name']?>
                      </option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label class="text-black">Description</label>
                    <textarea name="description" cols="30" rows="7" class="form-control"><?= $product['description'] ?></textarea>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-lg-12">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Save">
                  </div>
                </div>
              </div>
            </form>
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