<?php //authenticate.php
include "script/connectDB.php";
session_start();

/*if (isset($_POST['username']) && isset($_POST['password'])) */
if (isset($_POST['submit']))
{
    //if the user tried to log include
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = 'SELECT * from Customers '. "where Username='$username' "
                . " and Password='$password'";

    $result = mysqli_query($conn, $query);
    if($result -> num_rows >0)
    {
        //if user is in database
        $_SESSION['valid_user']=$username;
        echo '<script type="text/javascript">alert("Login successful") </script>';
    }
    else
        echo '<script type="text/javascript">alert("Login unsuccessful") </script>';
    mysqli_close($conn);
}
?>

<html>
<body>
<!--
<?php
    if (isset($_SESSION['valid_user']))
    {
        echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />';
        echo '<a href="logout.php">Log out</a><br />';
    }
    else
    {
        if(isset($username))
        {
            echo 'Could not log you in <br />';
        }
        else
        {
            echo 'You are not logged in. <br />';
        }

        echo '<form method="POST" action="authenticate.php">';
        echo '<table>';
        echo '<tr><td>Username:</td>';
        echo '<td><input type="text" name="username"></td></tr>';
        echo '<tr><td>Password:</td>';
        echo '<td><input type="text" name="password"></td></tr>';
        echo '<tr><td colspan="2" align="center">';
        echo '<input type="submit" value="Log in"></td></tr>';
        echo '</table></form>';
    }
?>
-->

<!DOCTYPE html>
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
                    <br /><br /><div><h2>Beep & Geek's Member Login</h2></div>
                    <form action="" method="POST">
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
</div>
</body>
</html>