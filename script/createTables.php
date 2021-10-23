<?php
include "connectDB.php";

$sql = 
"CREATE TABLE Customers (
CustomerID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR (30) NOT NULL,
Password VARCHAR (30) NOT NULL,
Name VARCHAR(30) NOT NULL,
Address VARCHAR(100),
Phone INT(20),
Email VARCHAR(50) NOT NULL
);

CREATE TABLE Product_Main (
ProductName VARCHAR(30) PRIMARY KEY NOT NULL,
Category VARCHAR(20) NOT NULL,
ProductImage VARCHAR (50) NOT NULL
);

CREATE TABLE Products (
ProductID VARCHAR(6) PRIMARY KEY NOT NULL,
ProductName VARCHAR(30) NOT NULL,
VariantImage VARCHAR (50) NOT NULL,
Price DOUBLE NOT NULL,
Stock INT(6) DEFAULT 0,
Color VARCHAR(20) NOT NULL,
Size VARCHAR(50) NOT NULL,
Weight VARCHAR(50) NOT NULL,
Display VARCHAR(10) NOT NULL,
Chip VARCHAR(10) NOT NULL,
Battery VARCHAR(30) NOT NULL
);


CREATE TABLE Orders (
OrderID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
CustomerID INT(6) UNSIGNED NOT NULL,
Amount DOUBLE NOT NULL,
TransactionTime TIMESTAMP
);

CREATE TABLE Order_Items (
OrderID INT(6) NOT NULL, 
ProductID VARCHAR(6) NOT NULL,
Quantity INT(10) NOT NULL
)
";


if (mysqli_multi_query($conn, $sql)) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>