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
    <link rel="stylesheet" href="css/form.css">
    <script type="text/javascript" src="script/validate.js"></script>
    <script type="text/javascript">
        function validate(){
            let formData = new FormData(document.querySelector('form'));
            let form = new Object;
            form.name = formData.get('cust_name');
            form.phone = formData.get('cust_phone');
            form.email = formData.get('cust_email');
            form.address = formData.get('cust_address');
            error = validateForm(form);
            if (!error) {
                return true;
            } else {
                alert(error);
                return false;
            }
        }
    </script>

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
                    <a href="catalogue.php?browseby=laptop">Macbook</a>
                    <a href="catalogue.php?browseby=earphone">Airpods</a>
                </b>
            </nav>
        </div>
        <div class="content">
            <div id="pagelayout">
                <div id="rightcolumn_2">
                    <div class="inputform">
                        <h2>Customer details</h2>
                        <p>Enter particulars to continue</p>
                        <form action="script/create_transaction.php" method="post" onsubmit="return validate();">
                            <label class="form-label" for="cust_name">Name <br></label>
                                <input type="text" name="cust_name" placeholder="Name" required><br>
                            <label class="form-label" for="cust_phone">Phone <br></label>
                                <input type="text" name="cust_phone" placeholder="Phone number" required><br>
                            <label class="form-label" for="cust_email">Email <br></label>
                                <input type="text" name="cust_email" placeholder="Email" required><br>
                            <label class="form-label" for="cust_address">Address <br></label>
                                <textarea name="cust_address" placeholder="Delivery address" required></textarea><br>
                            <input type="reset" value="Clear" class="button">
                            <input type="submit" value="Order now!" class="button">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>