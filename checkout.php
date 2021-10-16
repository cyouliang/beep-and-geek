<?php
session_start();
include 'script/connectDB.php';
require_once 'script/functions.php';
$products = get_products_from_cart($conn, $_SESSION['cart'], false);

$total_price = total_price($products);
$all_available = true; //Tracks if all items have enough stock

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>B&G - Shopping cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <?php if ($_SESSION['recent_action'] == 'reduce_cart') : ?>
        <p>Unavailable items have been removed</p>
        <?php unset($_SESSION['recent_action']) ?>
    <?php endif ?>
    <p>You have <?= count($_SESSION['cart']) ?> items in your cart!<br></p>

    <?php if (!empty($products)) : ?>
        Cart: <br>
        <table border="1">
            <tr>
                <th>Product ID</th>
                <th>Product</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <!-- php foreach loop embedded in html: https://stackoverflow.com/questions/10258345/php-simple-foreach-loop-with-html -->
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td align="center"><?= $product['ProductID']; ?></td>
                    <td align="left"><?= $product['ProductName']; ?></td>
                    <td align="left"><?= $product['Color']; ?></td>
                    <td align="center"><?= $product['Price']; ?></td>
                    <?php
                    //Check if there is enough stock
                    if ($product["Stock"] >= $product["Quantity"])
                        echo '<td align="center"> ' . $product['Quantity'] . '</td>';
                    else {
                        $all_available = false;
                        echo '<th align="center"> ' . $product['Quantity'] . '*</th>';
                    }
                    ?>
                    <td align="center">$<?= number_format($product['Price'] * $product['Quantity']); ?></td>
                </tr>
            <?php endforeach; ?>
            <th id="total-price" align="center" colspan="6">Total: $<?= number_format($total_price) ?></th>
        </table>

        <!-- Check if all items available before proceeding -->
        <?php if ($all_available) : ?>
            <form action="input_details.php">
                <input type="submit" value="Proceed with transaction!">
            </form>
        <?php else : ?>
            <p><b>*Sorry one or more items are not available</b></p>
            <p><a href="script/clear_cart.php?clear=1" value="">Click here to clear cart</a></p>
            <p><a href="script/clear_cart.php?clear=2" value="">Or click here to remove unavailable items</a></p>
        <?php endif; ?>

    <?php else : ?>
        <a href="catalogue.php" alt="Catalogue">Click here to start filling it up!</a>
    <?php endif; ?>
</body>

</html>