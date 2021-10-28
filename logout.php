<?php //logout.php
session_start();
// store to test if they *were* logged in
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
session_destroy();
?>

<html>
<body>
<h1> Log out </h1>
<?php
    if(!empty($old_user))
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
            header('Location: index3.php');
    }
?>
</body>
</html>