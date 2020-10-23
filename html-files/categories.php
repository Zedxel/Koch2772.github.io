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
    <div>
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>

        <!-- The menu bar html -->        
        <?php require_once "inc/menu.inc.php"; ?>

        <div class="category-container">
            <ul class="category-list">
                <li>
                    <div class="category-product">
                        <a href="category-fangs.php">
                            <img src="productImages/basi9550.jpg" alt="productimg">
                            <h2>Exotic Animal Fang's</h2>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="category-product">
                        <a href="category-horns.php">
                            <img src="productImages/unic1100.jpg" alt="productimg">
                            <h2>Horns</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="category-product">
                        <a href="category-feathers.php">
                            <img src="productImages/phnx7330.jpg" alt="productimg">
                            <h2>Feathers</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="category-product">
                        <a href="category-scales.php">
                            <img src="productImages/drag6510.jpg" alt="productimg">
                            <h2>Scales</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="category-product">
                        <a href="category-beaks.php">
                            <img src="productImages/grif2360.jpg" alt="productimg">
                            <h2>Beaks</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="category-product">
                        <a href="category-talons.php">
                            <img src="productImages/drag6490.jpg" alt="productimg">
                            <h2>Talons</h2>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="category-product">
                        <a href="category-all.php">
                            <img src="productImages/merm3500.jpg" alt="productimg">
                            <h2>All Poducts</h2>
                        </a>
                    </div>
                </li>
        </div>

    </div>
  </body>
</html>
