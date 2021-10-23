<?php
session_start();
require_once 'script/functions.php';
$transaction = $_SESSION['transaction'];
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Transaction complete</title>
</head>

<body>
    <p>Thank you <b><?= $transaction['cust_name'] ?></b></p>
    <p>We have received your order!</p>
    <p>Please keep the order number for future reference: <b><?= $transaction['orderid'] ?></b></p>
    <p>Here is a summary of what you ordered</p>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Product</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <?php foreach ($transaction['products'] as $product) : ?>
            <tr>
                <td align="center"><?= $product['ProductID']; ?></td>
                <td align="left"><?= $product['ProductName']; ?></td>
                <td align="left"><?= $product['Color']; ?></td>
                <td align="center"><?= $product['Price']; ?></td>
                <td align="center"><?= $product['Quantity']; ?></td>
                <td align="center">$<?= number_format($product['Price'] * $product['Quantity']); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th id="total-price" align="right" colspan="6">Total: $<?= number_format(total_price($transaction['products'])) ?></th>
        </tr>
    </table>
    <p>A copy of the receipt has been sent to your email at <b><?= $transaction['cust_email'] ?></b>
</body>

</html>