<?php 
require 'function.php';

if (isset($_POST['submit'])) {

    $register_status = register($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirmPassword']);

    if ($register_status === true) {
        echo "<script>alert('Registrasi berhasil'); window.location.href='login.php'</script>";
    } else {
        echo "<script>alert('$register_status'); window.location.href='regis.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/regis.css">
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="shadow p-5">
            <h5 class="fw-bold mb-4">Register Here!</h5>
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label for="lastname">Name</label>
                        <input type="text" class="form-control" id="lastname" name="name" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <input type="submit" name="submit" class="btn btn-primary py-2">
                </div>
            </form>

            <p class="text-muted fz-13 text-center">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
