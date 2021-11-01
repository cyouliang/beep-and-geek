<?php
include "connectDB.php";
$sql = 
"INSERT INTO Product_Main VALUES
('Iphone 13', 'phone', 'iphone13-red.png'),
('Iphone 13 Mini', 'phone', 'iphone13mini-blue.png'),
('Iphone 13 Pro', 'phone', 'iphone13pro-gold.png'),
('Iphone 13 Pro Max', 'phone', 'iphone13promax-silver.png'),
('Macbook Air', 'laptop', 'macbookair-gold.png'),
('Macbook Pro 13', 'laptop', 'macbookpro13-silver.png'),
('Airpods Gen 2', 'earphone', 'airpods-gen2.png'),
('Airpods Pro', 'earphone', 'airpods-pro.png');


INSERT INTO Products VALUES
('A01', 'Iphone 13', 'iphone13-black.png', 1299, 3, 'Black','146.7mm x 71.5mm x 7.65mm', '173g', '6.1 inch', 'A15', '19Hrs'),
('A02', 'Iphone 13', 'iphone13-blue.png', 1299, 1, 'Blue','146.7mm x 71.5mm x 7.65mm', '173g', '6.1 inch', 'A15', '19Hrs'),
('A03', 'Iphone 13', 'iphone13-pink.png', 1349, 2, 'Pink','146.7mm x 71.5mm x 7.65mm', '173g', '6.1 inch', 'A15', '19Hrs'),
('A04', 'Iphone 13', 'iphone13-red.png', 1299, 0, 'Red','146.7mm x 71.5mm x 7.65mm', '173g', '6.1 inch', 'A15', '19Hrs'),
('A05', 'Iphone 13', 'iphone13-starlight.png', 1349, 2, 'Starlight','146.7mm x 71.5mm x 7.65mm', '173g', '6.1 inch', 'A15', '19Hrs'),
('B01', 'Iphone 13 Mini', 'iphone13mini-black.png', 1149, 3, 'Black','131.5mm x 64.2mm x 7.65mm', '140g', '5.4 inch', 'A15', '17Hrs'),
('B02', 'Iphone 13 Mini', 'iphone13mini-blue.png', 1199, 2, 'Blue','131.5mm x 64.2mm x 7.65mm', '140g', '5.4 inch', 'A15', '17Hrs'),
('B03', 'Iphone 13 Mini', 'iphone13mini-pink.png', 1199, 1, 'Pink','131.5mm x 64.2mm x 7.65mm', '140g', '5.4 inch', 'A15', '17Hrs'),
('B04', 'Iphone 13 Mini', 'iphone13mini-red.png', 1149, 1, 'Red','131.5mm x 64.2mm x 7.65mm', '140g', '5.4 inch', 'A15', '17Hrs'),
('B05', 'Iphone 13 Mini', 'iphone13mini-starlight.png', 1149, 1, 'Starlight','131.5mm x 64.2mm x 7.65mm', '140g', '5.4 inch', 'A15', '17Hrs'),
('C01', 'Iphone 13 Pro', 'iphone13pro-gold.png', 1649, 3, 'Gold','146.7mm x 71.5mm x 7.65mm', '203g', '6.1 inch', 'A15', '22Hrs'),
('C02', 'Iphone 13 Pro', 'iphone13pro-graphite.png', 1699, 2,'Graphite','146.7mm x 71.5mm x 7.65mm', '203g', '6.1 inch', 'A15', '22Hrs'),
('C03', 'Iphone 13 Pro', 'iphone13pro-sierrablue.png', 1699, 1,'Sierra Blue','146.7mm x 71.5mm x 7.65mm', '203g', '6.1 inch', 'A15', '22Hrs'),
('C04', 'Iphone 13 Pro', 'iphone13pro-silver.png', 1649, 1, 'Silver','146.7mm x 71.5mm x 7.65mm', '203g', '6.1 inch', 'A15', '22Hrs'),
('D01', 'Iphone 13 Pro Max', 'iphone13promax-gold.png', 1799, 0, 'Gold','160.8mm x 78.1mm x 7.65mm', '238g', '6.7 inch', 'A15', '28Hrs'),
('D02', 'Iphone 13 Pro Max', 'iphone13promax-graphite.png', 1799, 0, 'Graphite','160.8mm x 78.1mm x 7.65mm', '238g', '6.7 inch', 'A15', '28Hrs'),
('D03', 'Iphone 13 Pro Max', 'iphone13promax-sierrablue.png', 1799, 0, 'Sierra Blue','160.8mm x 78.1mm x 7.65mm', '238g', '6.7 inch', 'A15', '28Hrs'),
('D04', 'Iphone 13 Pro Max', 'iphone13promax-silver.png', 1799, 0, 'Silver','160.8mm x 78.1mm x 7.65mm', '238g', '6.7 inch', 'A15', '28Hrs'),
('E01', 'Macbook Air', 'macbookair-gold.png', 1449, 10, 'Gold','1.61cm x 30.41cm x 21.24cm','1.29kg','13.3 inch','M1','18Hrs'),
('E02', 'Macbook Air', 'macbookair-silver.png', 1449, 10, 'Silver','1.61cm x 30.41cm x 21.24cm','1.29kg','13.3 inch','M1','18Hrs'),
('E03', 'Macbook Air', 'macbookair-spacegrey.png', 1549, 10, 'Space Grey','1.61cm x 30.41cm x 21.24cm','1.29kg','13.3 inch','M1','18Hrs'),
('F01', 'Macbook Pro 13', 'macbookpro13-silver.png', 1849, 10, 'Silver','1.56cm x 30.41cm x 21.24cm','1.4kg','13.3 inch','M1','20Hrs'),
('F02', 'Macbook Pro 13', 'macbookpro13-spacegrey.png', 1899, 10, 'Space Grey','1.56cm x 30.41cm x 21.24cm','1.4kg','13.3 inch','M1','20Hrs'),
('G01', 'Airpods Gen 2', 'airpods-gen2.png', 199, 10, 'White','40.5mm x 16.5mm x 18.0mm','4g','-','H1','5Hrs'),
('H01', 'Airpods Pro', 'airpods-pro.png', 379, 10, 'White','30.9mm x 21.8mm x 24.0mm','5.4g','-','H1','4.5Hrs');
";


if (mysqli_multi_query($conn, $sql)) {
    echo "Items inserted successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>