<?php
session_start();
$clear_mode = $_GET['clear'];
if ($clear_mode == 1) {
    // Clear cart and send to homepage
    $_SESSION['cart'] = array();
    $_SESSION['recent_action'] = 'reset_cart';
    header('location: ../catalogue.php');
    exit();
} else if ($clear_mode == 2){
    // Remove items from cart so that qty <= stock
    // and redirect back to checkout page
    $cart = $_SESSION['cart'];
    include 'connectDB.php';
    require_once 'functions.php';
    $products = get_products_from_cart($conn, $cart);

    foreach ($products as $product) {
        $deficit = $product['Quantity'] - $product['Stock'];
        if ($deficit > 0) {
            for ($x = 0; $x < $deficit; $x++) {
                $key = array_search($product['ProductID'], $_SESSION['cart']);
                unset($_SESSION['cart'][$key]);
            }
        }
    }

    mysqli_close($conn);
    $_SESSION['recent_action'] = 'reduce_cart';
}
    header('location: ../checkout.php');
    exit();
