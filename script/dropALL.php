<?php

include "connectDB.php";

$sql = '
DROP TABLE Customers;
DROP TABLE Products; 
DROP TABLE Images;
DROP TABLE Orders; 
DROP TABLE Order_Items
';


if (mysqli_multi_query($conn, $sql)) {
    echo "Tables deleted successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>