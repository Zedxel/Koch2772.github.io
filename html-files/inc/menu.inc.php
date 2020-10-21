<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kochanski Group - T Temby, J Gibson, B Gray, P Chu" />
    <meta name="description" content="Assignment 2 - COMP2772" />
    <title>Menu</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include "inc/dbconn.inc.php";
require_once "db_functions.php";
$stat = status();
    if(array_key_exists('button1', $_POST)) { 
        remove_item($conn, $_POST['button1']);
    

    } 
    echo '';
?>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" id="closebtn" onclick="closeNav()">×</a>
        <?php 
        if ($_SESSION['loggedin']) {
            $results = get_cart($conn);
            foreach ($results as $row ) { ?>
                <div class="cart-container">
                <div class="cart"> <form method="post"><label for="button1"><?php echo $row['productName']; ?> | </label><button id="removebtn" name="button1" value="<?php echo $row['stockNum']; ?>" type="submit">Remove</button></form></div>
                <span class="cart">ID: <?php echo $row['stockNum']; ?></span>
                <div class="cart">Cost: <?php echo $row['unitCost']; ?></div>
                <span class="cart">Quantity: <?php echo $row['qty']; ?></span>
                <span class="cart"> | Total: $<?php echo $row['totalCost']; ?></span>
                </div>
        <?php }
        } else {
            echo "<p> Cart is Empty</p>"; 
        } ?>

    <?php 
    if ($_SESSION['loggedin']) {
        echo "<a href='shippingdetail.php' id='Checkout'>Check out</a>";
    } else {
        echo "<a href='loginpage.php' id='Checkout'>Sign in to use cart!</a>";
    } ?>

</div>


<div id="menucontainer">
    <ul id="menu">
        <li><a href="categories.php" id="menuCat">Categories</a></li>
        <li><a href="FAQ.php" id="menuFAQ">FAQ</a></li>
        <li><a href="aboutus.php" id="menuAbout">About us</a></li>
        <span>
            <li>
                <!-- UPDATES THE CART TOTAL/COST ON MENU
                    BASED OFF CURRENT USER -->
                <?php 
                $cartTotal = update_cart_total($conn);
                $cartCost = update_cart_cost($conn);
                if($cartTotal != false && $cartCost != false) { ?>
                    <a href="#" id="carttotal"><?php echo $cartTotal; ?> 
                            <?php 
                                if($cartTotal > 1) {
                                    echo "<span id = \"cart_success1\">";
                                         echo "ITEMS | ";
                                    echo"</span>";     
                                } else {
                                    echo "<span id = \"cart_success2\">";
                                        echo "ITEM | ";
                                    echo "</span>";

                                }
                                 ?> $<?php echo $cartCost; ?></a>
                                 <?php

                                } else { ?>
                                    <a href="#" id="carttotal"><span id="cart_fail">? ITEM | $??</span></a>

                                 <?php } 

                mysqli_close($conn);?>

                <a href="#" id="carttext" onclick="openNav()">View Cart /</a>
                <a href="shippingdetail.php" id="carttext">Checkout</a>
            </li>
            <a href="shippingdetail.php" class="fa fa-shopping-cart" style="font-size:32px;color:purple"></a>
        </span>
        <div>
        <li><a href="Loginpage.html" id="menuLogin">Login /</a>
          
          <a href="Logout.php" id="menuLogin">Logout</a></li>
            <li class="menuStat"> <span id="status_text">Status: </span> </li><span class="dolstat"><?php 
                                    if ($_SESSION["loggedin"]) {
                                        echo "<span id = \"status_success\">";
                                            echo $stat; echo $_SESSION["username"]; 
                                        echo "</span>";
                                        ?></span><?php
                                    } else {
                                        echo "<span id = \"status_fail\">";
                                            echo $stat; 
                                        echo "</span>"; 
                                     ?></span> <?php
                                        
                                    } ?>
        </div>
    </ul>
</div>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html>