<?php
session_start();

// Initialise cart
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['buy'])) {
    $_SESSION['cart'][] = $_GET['buy'];
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
}

//Queries database for product information and image
include "script/connectDB.php";
$category = $_GET['browseby'];

$categories = array('phone', 'laptop', 'earphone');
if (in_array($category, $categories, true)) {
    $query = "SELECT Product_Main.ProductName AS product, 
                            Product_Main.ProductImage AS image, 
                            MAX(Products.Price) AS max_price,
                            MIN(Products.Price) AS min_price,
                            SUM(Products.Stock) AS stock
                    FROM Product_Main, Products
                    WHERE Products.ProductName = Product_Main.ProductName AND Product_Main.Category = '$category'
                    GROUP BY Product_Main.ProductName";
} else {
    $query = "SELECT Product_Main.ProductName AS product, 
                            Product_Main.ProductImage AS image, 
                            MAX(Products.Price) AS max_price,
                            MIN(Products.Price) AS min_price,
                            SUM(Products.Stock) AS stock
                    FROM Product_Main, Products
                    WHERE Products.ProductName = Product_Main.ProductName
                    GROUP BY Product_Main.ProductName";
}
$result = mysqli_query($conn, $query);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
    <title>B&G - Catalogue</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <div id="container">
        <header>
                <a href="index.html">
                    <div id="name">Beep&Geek</div>
                </a>
                <a href="loginpage.php">
                    <div id="login">Login</div>
                </a>
                <a href="checkout.php">
                    <div id="cart">Cart</div>
                </a>
        </header>

        <div class="content">
            <!--<header>
                <a href="index3.html"><img src="img/logo-blue.png" alt="Go back to maincatalog" style="width:20%"></a>
            </header> -->
            <div id="topnavbar">
                <nav>
                    <b>
                        <a href="index3.html">Home</a>
                        <a href="catalogue.php">All</a>
                        <a href="catalogue.php?browseby=phone">iPhones</a>
                        <a href="catalogue.php?browseby=laptop">Mac</a>
                        <a href="catalogue.php?browseby=earphone">Airpods</a>
                    </b>
                </nav>
            </div>

            <div id="pagelayout">
                <div id="rightcolumn_2">
                    <table border="0" id="product-table">
                        <?php
                        //Populate page with information from database
                        $counter = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            //TODO: Reduce spacing between each line
                            $divcontent = '
                            <a href="product.php?product=' . $row['product'] . '">
                            <img src="img/products/' . $row['image'] . '" alt = "' . $row['product'] . '" width = "400" class="product-image">
                            <h3 class = "product-name">' . $row['product'] . '</h3> </a>
                            <h4 class = "product-stock">Stock left: ' . $row['stock'] . '</h4>
                            <h4 class = "product-price-range">$' . $row['min_price'] . ' - $' . $row['max_price'] . '</h4>';

                            if ($counter % 3 == 0) {
                                echo '<tr> <td> <div class = "product" class = "left">';
                                echo $divcontent;
                                echo '</div> </td>';
                            } else if ($counter % 3 == 1) {
                                echo '<td> <div class = "product" class = "middle">';
                                echo $divcontent;
                                echo '</div> </td>';
                            } else if ($counter % 3 == 2) {
                                echo '<td> <div class = "product" class = "right">';
                                echo $divcontent;
                                echo '</div> </td> </tr>';
                            }
                            $counter++;
                        }

                        // Add empty cells if no. of entries not multiple of 3
                        if ($counter % 3 == 1) {
                            echo '<td> <div id="empty-cell"> </div> </td>';
                            $counter++;
                        }
                        if ($counter % 3 == 2) {
                            echo '<td> <div id="empty-cell"> </div> </td> </tr>';
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>