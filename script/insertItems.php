<?php
include "connectDB.php";
$sql = 
"INSERT INTO Product_Main VALUES
('Iphone 13', 'phone', 'iphone13-red.png'),
('Iphone 13 Mini', 'phone', 'iphone13mini-blue.png'),
('Iphone 13 Pro', 'phone', 'iphone13pro-gold.png'),
('Iphone 13 Pro Max', 'phone', 'iphone13promax-silver.png');


INSERT INTO Products VALUES
('A01', 'Iphone 13', 'iphone13-black.png', 1299, 3, 'Black'),
('A02', 'Iphone 13', 'iphone13-blue.png', 1349, 1, 'Blue'),
('A03', 'Iphone 13', 'iphone13-pink.png', 1299, 2, 'Pink'),
('A04', 'Iphone 13', 'iphone13-red.png', 1349, 0, 'Red'),
('A05', 'Iphone 13', 'iphone13-starlight.png', 1299, 2, 'Starlight'),
('B01', 'Iphone 13 Mini', 'iphone13mini-black.png', 1149, 3, 'Black'),
('B02', 'Iphone 13 Mini', 'iphone13mini-blue.png', 1149, 2, 'Blue'),
('B03', 'Iphone 13 Mini', 'iphone13mini-pink.png', 1199, 1, 'Pink'),
('B04', 'Iphone 13 Mini', 'iphone13mini-red.png', 1179, 1, 'Red'),
('B05', 'Iphone 13 Mini', 'iphone13mini-starlight.png', 1149, 1, 'Starlight'),
('C01', 'Iphone 13 Pro', 'iphone13pro-gold.png', 1649, 3, 'Gold'),
('C02', 'Iphone 13 Pro', 'iphone13pro-graphite.png', 1699, 2, 'Graphite'),
('C03', 'Iphone 13 Pro', 'iphone13pro-sierrablue.png', 1699, 1, 'Sierra Blue'),
('C04', 'Iphone 13 Pro', 'iphone13pro-silver.png', 1699, 1, 'Silver'),
('D01', 'Iphone 13 Pro Max', 'iphone13promax-gold.png', 1799, 0, 'Gold'),
('D02', 'Iphone 13 Pro Max', 'iphone13promax-graphite.png', 1799, 0, 'Graphite'),
('D03', 'Iphone 13 Pro Max', 'iphone13promax-sierrablue.png', 1799, 0, 'Sierra Blue'),
('D04', 'Iphone 13 Pro Max', 'iphone13promax-silver.png', 1799, 0, 'Silver');
";


if (mysqli_multi_query($conn, $sql)) {
    echo "Items inserted successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>