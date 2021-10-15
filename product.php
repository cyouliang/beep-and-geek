<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Beep and Geek</title>
    <?php
        $product = $_GET['product'];
        include "script/connectDB.php";
        $query = "SELECT * FROM Products WHERE ProductName = '$product'";
        $result = mysqli_query($conn, $query);
        $rowcount = mysqli_num_rows($result);
        $rows = array();
        while($row = mysqli_fetch_array($result))
        {
            $rows[] = $row;
        }

        echo '<pre>'. var_export($rows,true) .'</pre>';
        mysqli_close($conn);
    ?>
</head>


<body>
    <header>
        <a href="index2.html"><img src="../beep-and-geek/img/logo.png" alt="maincatalog"></a>
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
        <div id="rightcolumn_2">
        
        <!-- Slideshow container -->
            <div class="slideshow-container">
                <!-- Full-width images with number and caption text -->
                

                <?php
                    foreach($rows as $row){
                        $image = $row['VariantImage'];
                        $name = $row['ProductName'];
                        $color = $row['Color'];
                        $price = $row['Price'];
                        $productid = $row['ProductID'];

                        echo
                        '
                        <div class="mySlides fade">
                            <div class="numbertext">'.$productid.' / '.$rowcount.'</div>
                            <img src=" img/products/'.$image.'" style="width:100%">
                            <div class="text"><strong>'.$name.'<br>'.$color.'<br> $'.$price.'</strong></div>
                        </div>
                        ';
                    }
                
                ?>
                
                <!-- <div class="mySlides fade">
                    <div class="numbertext">2 / 4</div>
                    <img src="../beep-and-geek/img/products/iphone13pro-sierrablue.png" style="width:100%">
                    <div class="text"><strong>iPhone 13 Pro <br> Sierra Blue</strong></div>
                </div>
                
                <div class="mySlides fade">
                    <div class="numbertext">3 / 4</div>
                    <img src="../beep-and-geek/img/products/iphone13pro-gold.png" style="width:100%">
                    <div class="text"><strong>iPhone 13 Pro <br> Gold</strong></div>
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 4</div>
                    <img src="../beep-and-geek/img/products/iphone13pro-silver.png" style="width:100%">
                    <div class="text"><strong>iPhone 13 Pro <br> Silver</strong></div>
                </div> -->
                
                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <?php 
                switch($rowcount)
                {   
                    case("2")?>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span> 
                <?php break; 
                    case("3")?>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                <?php break; 
                    case("4")?>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>  
                <?php break; 
                    case("5")
                   ?>
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                    <span class="dot" onclick="currentSlide(5)"></span> 
                <?php break;
                } ?> 
                
                </div>
            </div>
        </div>        
        
        <script type="text/javascript" src="promaxslideshow.js"></script>

    </div>
    
</body>
</html>



