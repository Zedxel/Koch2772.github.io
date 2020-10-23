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

        <div class="productslist">
            <div class="product-container">
                
                <!-- Need to reference image in product database and insert -->  
                <img src="https://via.placeholder.com/100" alt="productimg">
                <div class="product-desc">

                    <!-- Need to change into a DB Function to allow easy product insertion -->  
                    <?php
                    require_once "inc/dbconn.inc.php";
                    $sql = "SELECT productName, description FROM product WHERE productName = 'Basilisk fang';";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <a href="product-fang.php" class="product-title"><?php echo $row["productName"]; ?></a>
                            <p><?php echo $row["description"]; ?></p>
                 <?php }
                    } 
                    echo mysqli_error($conn);
                    mysqli_close($conn); ?>

                </div> 
            </div>
        </div>

    </div>
  </body>
</html>