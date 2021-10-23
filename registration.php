<!DOCTYPE html>

<?php //register.php
include "script/connectDB.php";
if(isset($_POST['submit']))
{
    if( empty($_POST['username']) || empty($_POST['password'])
    || empty($_POST['password2']) || empty($_POST['name'])
    || empty($_POST['address']) || empty($_POST['phone'])
    || empty($_POST['email']) )
    {
        echo "All fields must be filled to register";
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // echo ("$username" . "<br />" . "$password2" . "<br />");
    if($password != $password2)
    {
        echo "Passwords do not match";
        exit;
    }

    $password = md5($password);
    //echo $password;
    $sql = "INSERT INTO Customers (Username, Password, Name, Address, Phone, Email)
            VALUES ('$username','$password','$name','$address','$phone','$email')";

    // echo "<br>" . $sql. "<br>";
    $result = mysqli_query ($conn, $sql);

    if(!$result)
        echo "Your query failed";
    else
        echo ' <script type="text/javascript"> alert("Registration successful! Login now");';
        echo 'window.location.href = "loginpage.php";';
        echo '</script>';
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <title>B&G-Registration</title>
</head>
<body>
<div id="container">
    <header>
        <a href="">
            <div id="name">Beep&Geek</div>
        </a>
        <a href="login.html">
            <div id="login">Login/Register</div>
        </a>
        <a href="checkout.php">
            <div id="cart">Cart</div>
        </a>
    </header>
    <div class="content">
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
                <div id="registration">
                    <form action="" method="POST">
                        <br /><br /><div><h2>Beep & Geek's Member Registration</h2>
                        Username:<br />
                        <input type="text" name="username"><br /><br />
                        Password:<br />
                        <input type="password" name="password"><br /><br />
                        Password Confirmation:<br />
                        <input type="password" name="password2"><br /><br />
                        Name:<br />
                        <input type="text" name="name"><br /><br />
                        Address:<br />
                        <input type="text" name="address"><br /><br />
                        Phone:<br />
                        <input type="text" name="phone"><br /><br />
                        Email:<br />
                        <input type="text" name="email"><br /><br />

                        <input type="submit" name="submit" value="Submit">
                        <input type="reset" name="reset" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
</body>
</html>