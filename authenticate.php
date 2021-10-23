<?php //authenticate.php
include "script/connectDB.php";
session_start();

if (isset($_POST['username']) && isset($_POST['password']))
{
    //if the user tried to log include
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = 'SELECT * from Customers '. "where Username='$username' "
                . " and Password='$password'";

    $result = mysqli_query($conn, $query);
    var_dump($result);
    if($result -> num_rows >0)
    {
        //if user is in database
        $_SESSION['valid_user']=$username;
    }
    mysqli_close($conn);
}
?>

<html>
<body>
<h1>Home Page</h1>
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