<?php
session_start();
$login_fail = $_SESSION['recent_action'] == 'login_fail';
echo($login_fail);
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
    <title>B&G-Registration</title>
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
            <a href="index3.html">
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
                        <a href="index3.html">Home</a>
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
                <div id="registration">
                    <br /><br /><div><h2>Beep & Geek's Member Login</h2></div>
                    <form action="script/authenticate.php" method="POST">
                            Username:<br />
                            <input type="text" name="username"><br /><br />
                            Password:<br />
                            <input type="password" name="password"><br /><br />

                            <input type="submit" name="submit" value="Login">
                            <input type="reset" name="reset" value="Reset">
                            <br /><br />
                            <a href="registration.php">Not a member yet? Register now!</a>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</body>
</html>