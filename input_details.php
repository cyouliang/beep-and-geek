<?php
    session_start();
    if (isset($_SESSION['valid_user'])) {
        // Skip input details for logged in users
        header('Location: script/create_transaction.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>B&G - Cart</title>
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
            <a href="loginpage.php">
                <div id="login">
                    <?php if (isset($_SESSION['valid_user'])) : ?>
                        <?= $_SESSION['valid_user'] ?>
                    <?php else : ?>
                        Login
                    <?php endif; ?>
                </div>
            </a>
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
                    <form action="script/create_transaction.php" method="post" onsubmit="return validate()">
                        <label>Name: <input type="text" name="cust_name" placeholder="Name" required></label><br>
                        <label>Phone: <input type="text" name="cust_phone" placeholder="Phone number" required></label><br>
                        <label>Email: <input type="text" name="cust_email" placeholder="Email" required></label><br>
                        <label>Address: <textarea name="cust_address" rows="4" cols="40" placeholder="Delivery address" required></textarea></label><br>
                        <input type="reset" value="Oops">
                        <input type="submit" value="Order now!">
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>