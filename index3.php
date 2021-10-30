<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beep and Geek</title>
    <link rel="stylesheet" href="css/homepage.css">
</head>

<body>
    <div id="container">
        <header>
            <a href="">
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
        <div class="content">
            <img src="img/logo-cyan1.png" alt="logo" id="banner">
            <div id="tagline">
                <p>Your one stop solution for all things tech related </p>
            </div>
            <a href="catalogue.php">
                <div id="arrows">
                    <div class="arrow one"></div>
                    <div class="arrow two"></div>
                    <div class="arrow three"></div>
                </div>
            </a>
        </div>

    </div>
</body>
<script>
    function slideArrows() {
        if (i >= 3) {
            i = 0;
        }
        arrow_div.children[i].classList.toggle('hidden');
        i++;
    }

    function stopSliding() {
        arrow_div.children[0].classList.remove('hidden');
        arrow_div.children[1].classList.remove('hidden');
        arrow_div.children[2].classList.remove('hidden');
        clearInterval(intervalId);
        i = 0;
    }
    let arrow_div = document.getElementById("arrows");
    let i = 0;

    //Run slideArrows every 1s
    let intervalId = window.setInterval(slideArrows, 1000);

    arrow_div.addEventListener("mouseover", stopSliding);
    arrow_div.addEventListener("mouseout", () => intervalId = window.setInterval(slideArrows, 1000));
</script>

</html>