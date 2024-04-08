<?php 

require 'function.php';

// cek jika user sudah login, maka alihkan ke halaman utama
if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $login_status = login($_POST['email'], $_POST['password']);

    if ($login_status === true) {
        echo "<script>alert('Login berhasil');</script>";

        $redirect_page = ($_SESSION['user']['role'] === 'CUSTOMER') ? 'index.php' : 'admin-products.php';

        echo "<script>window.location.href='$redirect_page'</script>";
    } else {
        echo "<script>alert('$login_status'); window.location.href='login.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="shadow p-5">
            <h5 class="fw-bold mb-4">Login Here!</h5>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary py-2" name="submit">Login</button>
                </div>
            </form>
            <p class="text-muted fz-13 mt-3 text-center">Do you already have an account? <a href="regis.php">Register</a></p>
            <p class="text-muted fz-13 text-center"><a href="index.php">Back</a></p>
        </div>
    </div>
</body>
</html>
