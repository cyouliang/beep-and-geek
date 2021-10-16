<?php
// Session
session_start();
// Initialise cart
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_SESSION['newly_added'])) {
    $new_item = $_SESSION['newly_added'];
    unset($_SESSION['newly_added']);
    unset($_SESSION['recent_action']);
}
if (isset($_GET['buy'])) {
    $_SESSION['cart'][] = $_GET['buy'];
    $_SESSION['recent_action'] = 'add_cart';
    $_SESSION['newly_added'] = $_GET['product_added'];
    header('location: ' . $_SERVER['PHP_SELF'] . '?product=' . $_GET['product'] . '#product-table');
    exit();
}
// print_r($_SESSION['cart']);

// Get product info
$product = $_GET['product'];
include "script/connectDB.php";
$query = "SELECT * FROM Products WHERE ProductName = '$product'";
$result = mysqli_query($conn, $query);
$rowcount = mysqli_num_rows($result);
if ($rowcount == 0) die("Sorry this product does not exists");
$rows = array();
while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
// echo '<pre>' . var_export($rows, true) . '</pre>';
mysqli_free_result($result);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <title>B&G - <?= $product ?></title>
</head>


<body>
    <header>
        <a href="index2.html"><img src="img/logo.png" alt="Go back to main page"></a>
    </header>

    <div id="topnavbar">
        <nav>
            <b>
                <a href="index2.html">Home</a>
                <a href="catalogue.php">All</a>
                <a href="catalogue.php?browseby=phone">Phones</a>
                <a href="catalogue.php?browseby=laptop">Laptops</a>
                <a href="catalogue.php?browseby=earphone">Earphones</a>
            </b>
        </nav>
    </div>

    <div id="pagelayout">
        <div id="rightcolumn_2">

            <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->

                <?php foreach ($rows as $row) : ?>
                    <div class="mySlides fade">
                        <div class="numbertext"> <?= $row['ProductID'] . ' / ' . $rowcount ?></div>
                        <img src="img/products/<?= $row['VariantImage'] ?>" style="width:100%">
                        <div class="text"><strong><?= $row['ProductName'] ?><br><?= $row['Color'] ?><br> $<?= $row['Price'] ?></strong></div>
                    </div>
                <?php endforeach; ?>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    <?php for ($i = 1; $i <= $rowcount; $i++) : ?>
                        <span class="dot" onclick="currentSlide(<?= $i ?>)"></span>
                    <?php endfor; ?>
                </div>
            </div>
            <div id="product-table">
                <table border="1">
                    <tr>
                        <th>Product Name</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Add to cart</th>
                    </tr>
                    <!-- Generate row for each product variant -->
                    <?php foreach ($rows as $row) : ?>
                        <?php
                        // URL back to original product page
                        $cartlink = $_SERVER['PHP_SELF'] . '?product=' . $_GET['product'] . '&buy=' . $row["ProductID"] . '&product_added=' . $row["ProductName"] . ' ' . $row["Color"];
                        $cartlink = basename($cartlink);
                        ?>
                        <tr>
                            <td><?= $row['ProductName'] . ' ' . $row['Color'] ?></td>
                            <td><?= $row['Color'] ?></td>
                            <td>$<?= $row['Price'] ?></td>
                            <td><?= $row['Stock'] ?></td>
                            <td align="center"><a href="<?= $cartlink ?>"> <img src="img/cart.png" alt="Buy" width="50px"> </a></td>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
            <?php if (isset($new_item)) : ?>
                <p>Successfully added to cart: <?= $new_item ?></p>
            <?php endif ?>
            <?php if (!empty($_SESSION['cart'])) : ?>
                <div id="checkout"><a href=checkout.php>
                        <p>Go to cart</p>
                    </a></div>
            <?php endif ?>
        </div>
        <script type="text/javascript" src="promaxslideshow.js"></script>
    </div>
</body>

</html>