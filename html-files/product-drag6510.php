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
        <?php 
        $StockNum = "drag6510";

        require_once "inc/menu.inc.php"; 
        require_once "inc/dbconn.inc.php";
        define("DB_HOST", "localhost");
        define("DB_NAME", "mcp");
        define("DB_USER", "dbadmin");
        define("DB_PASS", "");
        $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $sql = "SELECT * FROM `product` WHERE `stockNum` LIKE '";
                    $sql .= $StockNum;
                    $sql .= "' ORDER BY `category` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                                $item = mysqli_fetch_assoc($result);
	                    }
	                }






echo "        <div class=\"product-page-container\">";
echo "            <div class=\"product-image-container\">";
echo "                    <img src=\"productimages/";
echo                      $item["stockNum"];
echo                     ".jpg\" alt=\"productimg\" class=\"product-img\">";
echo "            </div>";
echo "            <div class=\"product-info-container\">";
echo "            <div class=\"mysticfont\"><h3>";
echo              $item["productName"];
echo "            </h3></div>";
echo "            <div class=\"price\"><h4>$";
echo              $item["unitCost"];
echo "            </h4></div>";
echo "            <form action=\"add_to_cart.php\" method =\"POST\">";
echo "              <div class=\"qtyitem\">";
echo "              <label for=\"qtyitem\" id=\"titleqtyitem\">Quantity:</label>";
echo "              <input type=\"number\" id=\"qtyitem\" name=\"qtyitem\" min=\"1\"></div>";
echo "              <input type=\"hidden\" name=\"stockNum\" value=\"";
echo                $item["stockNum"];
echo "              \">";
echo "              <input type=\"hidden\" name=\"unitCost\" value=\"";
echo                $item["unitCost"];
echo "              \">";
echo "              <div class=\"add-to-cart\"><input type=\"submit\" class=\"centerd-button\" value=\"Add to cart\"></div>";
echo "            </form>";
echo "            <div class=\"stock-ammount\"><p>ID: ";
echo              $item["stockNum"];
echo"             Stock:";
echo              $item["stockQty"];
echo "            </p></div>";
echo "            </div>";
echo "            <br>";
echo "            <br>";
echo "            <div class=\"zero-space-buttons\">";
echo "            <button class=\"description info-button\" onclick=\"showDescrption()\" id=\"descButton\">Description</button>";
echo "            <button class=\"specifications info-button\" onclick=\"showSpecs()\" id=\"specButton\">Specifications</button>";
echo "            <button class=\"blank\" onclick=\"\">QuickEzFix</button>";
echo "            </div>";
echo "            <div class=\"info-box\"  id=\"desc\" >";
echo "            <div class=\"mysticfont\"><h3>Description</h3></div>";
echo "            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
echo "            </div>";
echo "            <div class=\"info-box hidden\" id=\"spec\">";
echo "                <div class=\"mysticfont\"><h3>Specifications</h3></div>";
echo "                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";
echo "            </div>";
echo "        </div>";
echo "    </div>";
    require_once "inc/simmilarproducts.inc.php";
    mysqli_close($conn);?>

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

