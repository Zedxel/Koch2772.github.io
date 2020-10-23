<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <style>
        @font-face {
            font-family: 'Mystical';
            src: url(fonts/DsMysticora-d9dZ.ttf);
        }
    </style>
    
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8" />
    <meta name="author" content="Kochanski Group - T Temby, J Gibson, B Gray, P Chu" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>
  <body>
    <div class="title">
    <div class="mysticfont">
        <!-- Website title -->        
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>
    </div>

    <!-- The menu bar html -->        
    <?php require_once "inc/menu.inc.php"; ?>


    <div class="main-page-content">

        <!-- Containers for Hot Items -->   
        <div class="hot-items">
            <div class="mysticfont">
                 <h2>Hot Items</h2>
            </div>
            <div class="category-container">
            <ul class="category-list">
                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="product-unic1100.php">
                            <img src="productimages/unic1100.jpg" alt="productimg">
                            <h2>White Unicorn Horn</h2>
                        </a>
                    </div>
                </li>

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="product-phnx7330.php">
                            <img src="productimages/phnx7330.jpg" alt="productimg">
                            <h2>Phoenix Feather</h2>
                        </a>
                    </div>
                </li>
                
                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="product-basi9550.php">
                            <img src="productimages/basi9550.jpg" alt="productimg">
                            <h2>Basilisk Fang</h2>
                        </a>
                    </div>
                </li>

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="product-drag6510.php">
                            <img src="productimages/drag6510.jpg" alt="productimg">
                            <h2>Bronze Dragon Scale</h2>
                        </a>
                    </div>
                </li>
            </div>
        </div>

        <!-- Containers for Category links -->   
        <div class="categories">
            <div class="mysticfont">
                 <h2>Categories</h2>
            </div>
            <div class="category-container">
            <ul class="category-list">

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="category-fangs.php">
                            <img src="productimages/drag6550.jpg" alt="productimg">
                            <h2>Exotic Animal Fang's</h2>
                        </a>
                    </div>
                </li>

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="category-uniHorns.php">
                            <img src="productimages/unic3010.jpg" alt="productimg">
                            <h2>Unicorn Horns</h2>
                            <!--https://www.welchsworkshop.com/products/rainbow-5-padded-unicorn-horn-->
                        </a>
                    </div>
                </li>

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="category-DS.php">
                            <img src="productimages/merm3500.jpg" alt="productimg">
                            <h2>Dragon Scales</h2>
                        </a>
                    </div>
                </li>

                <!-- Item -->  
                <li>
                    <div class="category-product-1x4">
                        <a href="Categories.php">
                            <img src="productimages/rigth-arrow.jpg" alt="productimg">
                            <h2>All Categories</h2>
                        </a>
                    </div>
                </li>
            </div>
        </div>
  </body>
</html>
