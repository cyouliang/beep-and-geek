<?php

include "script/connectDB.php";
session_start();
$userid = $_SESSION['valid_user'];
if (empty($userid)) {
    // echo '<script type="text/javascript"> alert("User is not logged in");</script>';
    header('Location: index3.php');
    exit();
}
$query = "SELECT * FROM Customers WHERE Username = '".$userid."' ";
//"SELECT user_name FROM users WHERE user_name = '".$user_name."'";
$result = mysqli_query($conn, $query);
if($result -> num_rows >0)
{
    $row = mysqli_fetch_array($result);
    $rows[] = $row;
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
                    <div class="techspecs">
                        <div id="linespace"></div>
                        <h2><strong>My Information:</strong></h2>
                        <p>
                        <ul>
                            <li>
                                <h3>Name: </h3><?= $row['Name'] ?>
                            </li>
                            <li>
                                <h3>Address:</h3><?= $row['Address'] ?>
                            </li>
                            <li>
                                <h3>Phone:</h3><?= $row['Phone'] ?>
                            </li>
                            <li>
                                <h3>Email:</h3><?= $row['Email'] ?>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <script type="text/javascript" src="slideshow.js"></script>
            </div>
        </div>
    </div>
</body>

</html>