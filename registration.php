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
    $sql = "INSERT INTO Customers (Username, HashedPW, Name, Address, Phone, Email)
            VALUES ('$username','$password','$name','$address','$phone','$email')";

    // echo "<br>" . $sql. "<br>";
    $result = mysqli_query($conn, $sql);

    if (!$result)
        echo "Your query failed";
    else {
        session_start();
        $_SESSION['valid_user'] = $username;
        $_SESSION['recent_action'] = 'register_success';
        header('Location: catalogue.php');
    }
    // echo ' <script type="text/javascript"> alert("Registration successful! Login now");';
    // echo 'window.location.href = "loginpage.html";';
    // echo '</script>';
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="css/form.css">
    <title>B&G-Registration</title>
    <script type="text/javascript" src="script/validate.js"></script>
    <script type="text/javascript">
        function validate() {
            let formData = new FormData(document.querySelector('form'));
            let form = new Object;
            form.username = formData.get('username');
            form.password1 = formData.get('password');
            form.password2 = formData.get('password2');
            form.name = formData.get('name');
            form.phone = formData.get('phone');
            form.email = formData.get('email');
            form.address = formData.get('address');
            error = validateForm(form); //validates name, phone, email, and address
            if (error) {
                alert(error);
                return false;
            }
            if (!validateUsername(form.username)) {
                alert('Username too long');
                return false;
            }
            if (!validatePassword(form.password1, form.password2)) {
                alert('Password doesn\'t match');
                return false;
            }
            return true;
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
                        <h2>Member Registration</h2>
                        <p>Sign up now to become a member</p>
                        <form action="" method="POST" onsubmit="return validate();">
                            <label class="form-label" for="">Username</label>
                            <input type="text" name="username" placeholder="Username" required>
                            <label class="form-label" for="">Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                            <label class="form-label" for="">Confirm Password</label>
                            <input type="password" name="password2" placeholder="Confirm password" required>
                            <label class="form-label" for="">Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                            <label class="form-label" for="">Phone</label>
                            <input type="text" name="phone" placeholder="Phone number" required>
                            <label class="form-label" for="">Email</label>
                            <input type="text" name="email" placeholder="Email" required>
                            <label class="form-label" for="">Address</label>
                            <textarea type="text" name="address" placeholder="Address" required></textarea>
                            <input type="reset" name="reset" value="Reset" class="button">
                            <input type="submit" name="submit" value="Submit" class="button">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</body>

</html>