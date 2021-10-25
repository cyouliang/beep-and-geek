<?php
include 'connectDB.php';
require_once 'functions.php';

session_start();
if (empty($_SESSION['cart'])) die('Nothing in cart');
$products = get_products_from_cart($conn, $_SESSION['cart']);

// Ensure that there is enough stock before proceeding
foreach ($products as $product) {
    if ($product['Quantity'] > $product['Stock']) {
        die("Sorry, we do not have enough items for your order");
    }
}

if (empty($_SESSION['valid_user'])){
    // Insert customer
    $name = $_POST['cust_name'];
    $address = $_POST['cust_address'];
    $phone = $_POST['cust_phone'];
    $email = $_POST['cust_email'];
    $add_cust = "INSERT INTO Customers (Name, Address, Phone, Email) VALUES 
    ('$name', '$address', '$phone', '$email')";
    mysqli_query($conn, $add_cust);
    $customerid = mysqli_insert_id($conn); // Previous auto increment is customer id
} 
elseif (isset($_SESSION['user'])) {
    // Get customer details
    $query = 'SELECT * FROM Customers '. 'WHERE Username="'.$_SESSION['valid_user'].'"';
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    $name = $_SESSION['user']['Name'];
    $address = $_SESSION['user']['Address'];
    $phone = $_SESSION['user']['Phone'];
    $email = $_SESSION['user']['Email'];
    $customerid = $_SESSION['user']['CustomerID'];
}

// Insert transaction
$amount = total_price($products);
$add_transaction = "INSERT INTO Orders VALUES
(NULL, $customerid, $amount, NULL)";
mysqli_query($conn, $add_transaction);

// Insert Transaction_items for each type of product in cart
// and update stock for the products
$orderid = mysqli_insert_id($conn);
foreach ($products as $product) {
    $productid = $product["ProductID"];
    $quantity = $product["Quantity"];
    $add_item = "INSERT INTO Order_Items VALUES
    ($orderid, '$productid', $quantity)";
    mysqli_query($conn, $add_item);
    $adjust_stock = "UPDATE Products SET Stock = Stock - $quantity WHERE ProductID = '$productid'";
    mysqli_query($conn, $adjust_stock);
}

$_SESSION['cart'] = array(); // Reset cart upon completion
$_SESSION['recent_action'] = 'completed_transaction';
$_SESSION['transaction'] = array(
    'orderid' => $orderid, 
    'cust_name' => $name, 
    'cust_email' => $email, 
    'products' => $products);
print_r($_SESSION['transaction']);
header('location: ../completion_page.php');
exit();
?>