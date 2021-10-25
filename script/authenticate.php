<?php //authenticate.php
include "connectDB.php";
session_start();

if (isset($_POST['submit']))
{
    //if the user tried to log include
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    //$sql = 'SELECT * from Customers WHERE Username = '.$username.' AND Password = '.$password.'';
    $query = 'SELECT * FROM Customers '. "WHERE Username='$username'" ." AND HashedPW = '$password'";
    $result = mysqli_query($conn, $query);
    if($result -> num_rows >0)
    {
        //if user is in database
        $_SESSION['valid_user']=$username;
        $_SESSION['recent_action'] = 'login_success';
        header('Location: ../catalogue.php');
        // echo '<script type="text/javascript">alert("Login successful");';
        // echo 'window.location.href ="../catalogue.php"';
        // echo '</script>';
    }
    else
    {
        $_SESSION['recent_action'] = 'login_fail';
        header('Location: ../loginpage.php');
        // echo '<script type="text/javascript">alert("Login unsuccessful");';
        // echo 'window.location.href ="../loginpage.html"';
        // echo '</script>';
    }

    mysqli_close($conn);
}
?>