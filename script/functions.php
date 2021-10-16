<?php
function get_products_from_cart($conn, $cart) {
    $unique_qty = array(); // Array to store items and their quantities
    foreach ($cart as $item) {
        if (array_key_exists($item, $unique_qty)) {
            $unique_qty[$item]++;
        } else {
            $unique_qty[$item] = 1;
        }
    }
    // print_r($unique_qty);

    // Query database for info on products in cart
    $productids = '(\'' . join("','", array_keys($unique_qty)) . '\')';
    $query = 'SELECT * FROM Products WHERE ProductID IN ' . $productids;
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != count($unique_qty)) die("Row counts doesn't match");

    $products = array();
    $i = 0;
    $total = 0;
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $products[$i] = $row;
        $products[$i]['Quantity'] = $unique_qty[$row['ProductID']]; //Append the quantity to the list
        $total += $row['Price'] * $unique_qty[$row['ProductID']]; //Keep track of total price
        $i++;
    }
    mysqli_free_result($result);
    return $products;
}

function total_price($products) {
    $total = 0;
    foreach ($products as $product) {
        $total += $product['Quantity'] * $product['Price'];
    }
    return $total;
}