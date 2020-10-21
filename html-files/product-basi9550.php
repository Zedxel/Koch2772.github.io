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
    <meta name="author" content="T Temby, J Gibson, Author 3, Author 4" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <script src="scripts/script.js" defer></script>
    <title>Mystic Shop</title>
  </head>
  <body>
    <div>
        <!-- Website title -->        
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>

        <!-- The menu bar html -->        
        <?php require_once "inc/menu.inc.php"; ?>


        <div class="product-page-container">
            <div class="product-image-container">
                <a href="#">
                    <img src="productimages/Basilisk Fang.jpg" alt="productimg" class="product-img">
                </a>
            </div>
            <div class="product-info-container">
            
            <div class="mysticfont"><h3>Basilisk Fang</h3></div>
            <div class="price"><h4>$63</h4></div>
            <form action="add_to_cart.php" method ="POST">
              <div class="qtyitem">
              <label for="qtyitem" id="titleqtyitem">Quantity:</label>
              <input type="number" id="qtyitem" name="qtyitem" min="1"></div>
              <input type="hidden" name="stockNum" value="basi9550">
              <input type="hidden" name="unitCost" value="63">
              <div class="add-to-cart"><input type="submit" class="centerd-button" value="Add to cart"></div>
            </form>
            <div class="stock-ammount"><p>ID: basi9550 Stock:N/A</p></div>
            </div>

            <div class="zero-space-buttons">
            <button class="description info-button" onclick="showDescrption()" id="descButton">Description</button>
            <button class="specifications info-button" onclick="showSpecs()" id="specButton">Specifications</button>
            <button class="blank" onclick="">QuickEzFix</button>
            </div>

            <div class="info-box"  id="desc" >
            <div class="mysticfont"><h3>Description</h3></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="info-box hidden" id="spec">
                <div class="mysticfont"><h3>Specifications</h3></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    <script>
    function showDescrption() {
      var y = document.getElementById("desc");
      var x = document.getElementById("spec");
      var specButton = document.getElementById("specButton");
      var descButton = document.getElementById("descButton");
      y.style.display = "block";
      x.style.display = "none";
      descButton.style.backgroundColor = "#d87d94";
      specButton.style.backgroundColor = "#e6aab9";
    };
    function showSpecs() {
      var y = document.getElementById("desc");
      var x = document.getElementById("spec");
      specButton.style.backgroundColor = "#d87d94";
      descButton.style.backgroundColor = "#e6aab9";
      x.style.display = "block";
      y.style.display = "none";
    };
    </script>
  </body>
</html>

