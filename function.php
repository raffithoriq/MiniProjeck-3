<?php

session_start();

// config database
$host     = "localhost"; // Host MySQL (biasanya localhost)
$username = "root"; // Username MySQL
$password = ""; // Password MySQL
$database = "ducati"; // Nama database yang digunakan

// buat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

function register(string $name, string $email, string $password, string $confirm_password) : bool|string
{    
    // cek password & konfirmasi password telah sama persis
    if ($password !== $confirm_password) {
        return "Konfirmasi password tidak sesuai !";
    }

    global $koneksi;

    // cek email telah terdaftar
    $cek_email = mysqli_query($koneksi, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($cek_email) > 0) {
        return "Email anda telah terdaftar sebelumnya !";
    }

    // simpan data ke database
    $query = "INSERT INTO users VALUES (NULL, '$name', '$email', '$password', 'CUSTOMER')";

    mysqli_query($koneksi, $query);

    $is_success = (int) mysqli_affected_rows($koneksi);

    // cek ada error
    if ($is_success <= 0) {
        return "Terjadi kesalahan";
    }

    // regis berhasil
    return true;
}

function login(string $email, string $password) : bool|string
{    
    global $koneksi;

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    // cek user valid
    $cek_user = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($cek_user) === 0) {
        return "Email atau password salah !";
    }

    $user = mysqli_fetch_assoc($cek_user);

    // set session
    $_SESSION['is_login'] = true;
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'role' => $user['role']
    ];

    // regis berhasil
    return true;
}

function logout()
{
    $_SESSION = [];
    session_destroy();
    session_reset();
    
    header("Location: index.php");
    exit;
}

function getProducts($category_id = NULL) : array
{
    global $koneksi;

    $query = "SELECT *, products.name AS product_name, products.id AS product_id, product_categories.name AS category_name
            FROM products 
            INNER JOIN product_categories ON products.category_id = product_categories.id";

    if ($category_id != NULL) {
        $query .= " WHERE products.category_id = $category_id";
    }

    $result = mysqli_query($koneksi, $query);

    $products = [];
    
    while($product = mysqli_fetch_assoc($result)) {
        $products[] = $product;
    }

    return $products;
}

function getProduct($product_id) : array
{
    global $koneksi;

    $query = "SELECT * FROM products WHERE id = '$product_id'";

    $result = mysqli_query($koneksi, $query);

    $product = mysqli_fetch_assoc($result);

    return $product;
}

function getProductCategories() : array
{
    global $koneksi;

    $query = "SELECT * FROM product_categories";

    $result = mysqli_query($koneksi, $query);

    $categories = [];
    
    while($category = mysqli_fetch_assoc($result)) {
        $categories[] = $category;
    }

    return $categories;
}

function addProductToCart($data) : bool
{
    $product_id = $_POST['product_id'];
    $quantity   = $_POST['quantity'];

    $items = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

    $is_update_item = false;
    $index_update_item = null;

    if (count($items) > 0) {
        foreach ($items as $index_item => $item) {
            if ($item['product_id'] === $product_id) {
                $is_update_item = true;
                $index_update_item = $index_item;
            }
        }
    }

    if ($is_update_item == true) {
        $items[$index_update_item]['quantity'] = $quantity;
    } else {
        $items[] = [
            'product_id' => $product_id,
            'quantity' => $quantity,
        ];
    }

    $_SESSION['cart'] = $items;

    return true;
}

function updateCart($items) : bool
{
    $_SESSION['cart'] = $items;

    return true;
}

function getDetailCart() : array
{
    $detail_items = [];

    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    
    foreach ($cart as $item) {
        $product = getProduct($item['product_id']);
        $product['quantity'] = $item['quantity'];
        $detail_items[] = $product;
    }

    return $detail_items;
}

function checkout($input) : bool 
{
    date_default_timezone_set('Asia/Kuala_Lumpur');

    $detail_cart = getDetailCart();
    $amount = 0;

    foreach ($detail_cart as $item) {
        $amount += intval($item['price']) * intval($item['quantity']);
    }

    $items = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    
    $items_json = json_encode(array_values($items));
    $user_id    = $_SESSION['user']['id'];
    $datetime   = date('Y-m-d H:i:s');
    $address    = $input['address'];
    $phone      = $input['phone'];
    $notes      = $input['notes'] ?? '';

    $query = "INSERT INTO orders VALUES (NULL, $user_id, '$datetime', '$items_json', $amount, '$address', '$phone', '$notes')";

    global $koneksi;

    mysqli_query($koneksi, $query);

    $_SESSION['cart'] = [];

    return true;
}

function manageProduct($input) : bool
{
    $image       = $input['image'];
    $name        = $input['name'];
    $price       = $input['price'];
    $category_id = $input['category_id'];
    $description = $input['description'];

    $form_action = $input['form_action'];

    if ($form_action === 'create') {
        $query = "INSERT INTO products VALUES (NULL, '$image', '$name', $category_id, $price, '$description')";
    } else {
        $product_id = $input['product_id'];
        $query = "UPDATE products SET image = '$image', name = '$name', category_id = $category_id, price = $price, description = '$description' WHERE id = $product_id";
    }

    global $koneksi;

    mysqli_query($koneksi, $query);

    return true;
}

function deleteProduct($product_id) : bool
{
    $query = "DELETE FROM products WHERE id = $product_id";

    global $koneksi;

    mysqli_query($koneksi, $query);

    return true;
}

function getOrders() : array
{
    global $koneksi;

    $query = "SELECT * FROM orders 
    INNER JOIN users ON orders.user_id = users.id
    ORDER BY datetime DESC";

    $result = mysqli_query($koneksi, $query);

    $orders = [];
    
    while($category = mysqli_fetch_assoc($result)) {
        $orders[] = $category;
    }

    return $orders;
}

function getUsers() : array
{
    global $koneksi;

    $query = "SELECT * FROM users ORDER BY role DESC";

    $result = mysqli_query($koneksi, $query);

    $users = [];
    
    while($user = mysqli_fetch_assoc($result)) {
        $users[] = $user;
    }

    return $users;
}

function getUser($user_id) : array
{
    global $koneksi;

    $query = "SELECT * FROM users WHERE id = '$user_id'";

    $result = mysqli_query($koneksi, $query);

    $user = mysqli_fetch_assoc($result);

    return $user;
}

function manageUser($input) : bool
{
    $name     = $input['name'];
    $email    = $input['email'];
    $password = $input['password'];

    $form_action = $input['form_action'];

    if ($form_action === 'create') {
        $query = "INSERT INTO users VALUES (NULL, '$name', '$email', '$password', 'ADMIN')";
    } else {
        $user_id = $input['user_id'];
        $query = "UPDATE users SET name = '$name', email = '$email'";

        if (isset($input['password']) && $input['password'] !== "") {
            $query .= ", password = '$password'";
        } 

        $query .= " WHERE id = $user_id";
    }

    global $koneksi;

    mysqli_query($koneksi, $query);

    return true;
}

function deleteUser($user_id) : bool
{
    $query = "DELETE FROM users WHERE id = $user_id";

    global $koneksi;

    mysqli_query($koneksi, $query);

    return true;
}