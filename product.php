<?php
$product = $_GET['product'];
include "script/connectDB.php";
$query = "SELECT * FROM Products WHERE ProductName = '$product'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
echo $row['ProductName'].'<br>';
mysqli.close($conn);

?>