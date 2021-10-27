<?php
session_start();
require_once 'script/functions.php';
$transaction = $_SESSION['transaction'];
unset($_SESSION['transaction']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transaction complete!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <script type="text/javascript" src="validate.js"></script>
</head>

<body>
    <div id="container">
        <header>
            <a href="index3.php">
                <div id="name">Beep&Geek</div>
            </a>

            <div id="login">
                <?php if (isset($_SESSION['valid_user'])) : ?>
                <div class="dropdown">
                    <?= $_SESSION['valid_user'] ?>
                    <div class="dropdown-content">
                        <a href="myinfo.php">My Info</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
                <?php else : ?>
                    <a href="loginpage.php">Login</a>
                <?php endif; ?>
            </div>

            <a href="checkout.php">
                <div id="cart">Cart</div>
            </a>
        </header>

        <div id="topnavbar">
            <nav>
                <b>
                    <a href="index3.php">Home</a>
                    <a href="catalogue.php">All</a>
                    <a href="catalogue.php?browseby=phone">iPhones</a>
                    <a href="catalogue.php?browseby=laptop">Mac</a>
                    <a href="catalogue.php?browseby=earphone">Airpods</a>
                </b>
            </nav>
        </div>
        <div class="content">
            <div id="pagelayout">
                <div id="rightcolumn_2">
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
                </div>

            </div>
        </div>
    </div>
</body>