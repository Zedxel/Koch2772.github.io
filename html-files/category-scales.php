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
        <!-- Website title -->        
        <a href="index.php" id="title"><div class="mysticfont"><h1>Mystic Shop</h1></div></h1></a>

        <!-- The menu bar html -->        
        <?php require_once "inc/menu.inc.php"; ?>
            <div class="mysticfont">
                    <h2>Scales</h2>
            </div>
                <div class="category-container">
        <?php
                    require_once "inc/dbconn.inc.php";
                    define("DB_HOST", "localhost");
                    define("DB_NAME", "mcp");
                    define("DB_USER", "dbadmin");
                    define("DB_PASS", "");

                    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                    $tmp= "Scale";
                    $sql = "SELECT * FROM `product` WHERE `category` LIKE '";
                    $sql .= $tmp;
                    $sql .= "' ORDER BY `category` ASC";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["stockNum"] != $StockNum){
                                    echo    "<div class=\"category-product-1x4\">";
                                    echo        "<a href=product-";
                                    echo            $row["stockNum"];
                                    echo            ".php>";
                                    echo            "<img src=\"productimages/";
                                    echo            $tmp = $row["stockNum"];
                                    echo            ".jpg\" alt=\"";
                                    echo            $row["stockNum"];
                                    echo            "\">";
                                    echo            "<h2>";
                                    echo            $row["productName"];
                                    echo            "</h2>";
                                    echo        "</a>";
                                    echo    "</div>";
                                }
                            }
	                    }
                    }
                    ?>
                </div>
    </div>
  </body>
</html>