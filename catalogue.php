<!DOCTYPE html>
<html lang ="en">

<head>
    <title>Beep and Geek</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <link type="text/css" rel="stylesheet" href="magicscroll-trial/magicscroll/magicscroll.css" />
    <script type="text/javascript" src="magicscroll-trial/magicscroll/magicscroll.js"></script>
    <?php
        //Queries database for product information and image
        include "script/connectDB.php";
        $category = $_GET['browseby'];
        $categories = array('phone', 'laptop', 'earphone');
        if (in_array($category, $categories, true)) {
            $query = "SELECT Product_Main.ProductName AS product, 
                            Product_Main.ProductImage AS image, 
                            MAX(Products.Price) AS max_price,
                            MIN(Products.Price) AS min_price,
                            SUM(Products.Stock) AS stock
                    FROM Product_Main, Products
                    WHERE Products.ProductName = Product_Main.ProductName AND Product_Main.Category = '$category'
                    GROUP BY Product_Main.ProductName";
        }
        else {
            $query = "SELECT Product_Main.ProductName AS product, 
                            Product_Main.ProductImage AS image, 
                            MAX(Products.Price) AS max_price,
                            MIN(Products.Price) AS min_price,
                            SUM(Products.Stock) AS stock
                    FROM Product_Main, Products
                    WHERE Products.ProductName = Product_Main.ProductName
                    GROUP BY Product_Main.ProductName";
        }
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
    ?>
</head>

<body>
    <header>
        <a href="index2.html"><img src="img/logo.png" alt="Go back to maincatalog"></a>
    </header>
    <div id="topnavbar">
        <nav>
            <b>
                <a href="index2.html">Home</a>
                <a href="catalogue.php">All</a>
                <a href="catalogue.php?browseby=phone">Phones</a>
                <a href="catalogue.php?browseby=laptop">Laptops</a>
                <a href="catalogue.php?browseby=earphone">Earphones</a>
            </b>
        </nav>
    </div>

    <div id="pagelayout">
        <div id="rightcolumn">
            <table border = "0" id = "product-table">
            <?php
                //Populate page with information from database
                $counter = 0;
                while ($row = mysqli_fetch_array($result)) {
                    //TODO: Reduce spacing between each line
                    $divcontent = '
                    <a href="product.php?product='.$row['product'].'">
                    <img src="img/products/'.$row['image'].'" alt = "'.$row['product'].'" width = "300" class="product-image">
                    <h3 class = "product-name">'.$row['product'].'</h3> </a>
                    <h4 class = "product-stock">Stock left: '.$row['stock'].'</h4>    
                    <h4 class = "product-price-range">$'.$row['min_price'].' - $'.$row['max_price'].'</h4>';

                    if ($counter % 3 == 0) {
                        echo '<tr> <td> <div class = "product" class = "left">';
                        echo $divcontent;                             
                        echo '</div> </td>';
                        
                    }
                    else if ($counter % 3 == 1) {
                        echo '<td> <div class = "product" class = "middle">';
                        echo $divcontent;                             
                        echo '</div> </td>';
                    }
                    else if ($counter % 3 == 2) {
                        echo '<td> <div class = "product" class = "right">';
                        echo $divcontent;                             
                        echo '</div> </td> </tr>';
                    }
                    $counter++;
                }
                
                // Add empty cells if no. of entries not multiple of 3
                if ($counter%3 == 1){
                    echo '<td> <div id="empty-cell"> </div> </td>';
                    $counter++;
                }
                if ($counter%3 == 2){
                    echo '<td> <div id="empty-cell"> </div> </td> </tr>';
                }

            ?>
            </table>
        </div>
    </div>

</body>