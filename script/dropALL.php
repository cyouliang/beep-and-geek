<?php
include "connectDB.php";

$sql = '
DROP TABLE IF EXISTS Products; 
DROP TABLE IF EXISTS Customers;
DROP TABLE IF EXISTS Product_Main;
DROP TABLE IF EXISTS Image ;
DROP TABLE IF EXISTS Orders; 
DROP TABLE IF EXISTS Order_Items
';


if (mysqli_multi_query($conn, $sql)) {
    echo "Tables deleted successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>