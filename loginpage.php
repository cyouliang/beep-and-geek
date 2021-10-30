<?php
session_start();
$login_fail = $_SESSION['recent_action'] == 'login_fail';
unset($_SESSION['recent_action']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="css/login-form.css">
    <title>B&G-Login</title>
    <script type="text/javascript" src="script/messages.js"></script>
    <?php if ($login_fail): ?>
        <script type="text/javascript">
        window.onload = setTimeout(loginFailMsg,100);   //No idea why onload itself doesn't work on chrome, so I added some delay
    </script>
    <?php endif; ?>
    
</head>
<body>
    <div id="container">
        <header>
            <a href="index3.php">
                <div id="name">Beep&Geek</div>
            </a>
            <a href="loginpage.php">
                <div id="login">Login</div>
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
                    <div><h2>Member Login</h2></div>
                    <form action="script/authenticate.php" method="POST">
                        <label class="form-label" for="">Username</label>
                        <input type="text" name="username" placeholder="Username" class="username">
                        <label class="form-label" for="">Password</label>
                        <input type="password" name="password" placeholder="Password" class="password">
                        <input type="submit" name="submit" value="Login" class="button">
                    </form>
                </div>
                <p class="cta_register"><a href="registration.php">Not a member yet? Register now!</a></p>
            </div>
        </div>

        </div>
    </div>
</body>
</html>