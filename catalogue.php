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

//Check login
$register_success = $_SESSION['recent_action'] == "register_success";
$login_success = $_SESSION['recent_action'] == 'login_success';
unset($_SESSION['recent_action']);
if (isset($_SESSION['valid_user']))
    $user = $_SESSION['valid_user'];
else
    $user = null;

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
<script type="text/javascript" src="script/messages.js"> </script>
<script type="text/javascript">
    <?php if ($login_success) : ?>
        window.onload = setTimeout(() => loginSucMsg("<?= $user ?>"), 100);
    <?php elseif ($register_success) : ?>
        window.onload = setTimeout(() => registerSucMsg("<?= $user ?>"), 100);
    <?php endif; ?>

    function ActiveTab(number) {
        var tabs = document.getElementsByClassName("tab");
        tabs[number].classList.add("active_tab");
    }
    function setActiveTab(number) {
        window.onload = () => ActiveTab(number);
    }

    <?php 
    if ($category == 'phone') {
        echo 'setActiveTab(1);';
    } else if ($category == 'laptop') {
        echo 'setActiveTab(2);';
    } else if ($category == 'earphone') {
        echo 'setActiveTab(3);';
    } else {
        echo 'setActiveTab(0);';
    }
    ?>

</script>

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
                    <a href="catalogue.php" class="tab">All</a>
                    <a href="catalogue.php?browseby=phone" class="tab">iPhones</a>
                    <a href="catalogue.php?browseby=laptop" class="tab">Macbook</a>
                    <a href="catalogue.php?browseby=earphone" class="tab">Airpods</a>
                </b>
            </nav>
        </div>
        <div class="content">
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
                                <img src="img/products/' . $row['image'] . '" alt = "' . $row['product'] . '"class="product-image">
                                <h3 class = "product-name">' . $row['product'] . '</h3> </a>
                                <h4 class = "product-stock">Stock left: ' . $row['stock'] . '</h4>';
                            if ($row['min_price'] == $row['max_price']) {
                                $divcontent = $divcontent . '<h4 class = "product-price-range">$' . $row['min_price'] . '</h4>';
                            } else {
                                $divcontent = $divcontent . '<h4 class = "product-price-range">$' . $row['min_price'] . ' - $' . $row['max_price'] . '</h4>';
                            }

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
</html>