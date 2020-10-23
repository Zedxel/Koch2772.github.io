<?php

// Function that returns the stockQty from the database of a selected item
// and checks to see if the store has sufficient product before sale
function check_qty($conn, $stockNum, $qty) {
    $query = "SELECT stockQty FROM product WHERE stockNum=?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $stockNum);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_bind_result($stmt, $stockQty);
        mysqli_stmt_fetch($stmt);

        if ($stockQty < $qty) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    mysqli_stmt_close($stmt);
    
}

// Function to add items into a cart as well as custId
function add_to_cart($conn, $custId, $stockNum, $unitCost, $qty) {
    $totalCost = $unitCost * $qty;
    $query = "INSERT INTO cart(custId, stockNum, unitcost, qty, totalCost) VALUES(?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $custId, $stockNum, $unitCost, $qty, $totalCost);
        $outcome = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        return $outcome;

    } else {
        return FALSE;
    }

}

function update_cart_total($conn) {

    if ($_SESSION["id"]) {
        $cartTotal = 0;
        $query = "SELECT qty FROM cart WHERE custId = ?;";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $qty);
            while (mysqli_stmt_fetch($stmt)) {
                $cartTotal += $qty;
            }
        }

        return $cartTotal;

    } else {
        return false;
    }

}

function update_cart_cost($conn) {

    if ($_SESSION["id"]) {
        $cartCost = 0;
        $query = "SELECT totalCost FROM cart WHERE custId = ?;";

        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $totalCost);
            while (mysqli_stmt_fetch($stmt)) {
                $cartCost += $totalCost;
            }
        }

        return $cartCost;

    } else {
        return false;
    }

}

function get_cart($conn) {
    if ($_SESSION["id"]) {
        $cartCost = 0;
        $query = "SELECT product.productName, cart.stockNum, cart.unitCost, cart.qty, cart.totalCost 
                    FROM product, cart
                        WHERE product.stockNum = cart.stockNum && cart.custId = ?;";

        $stmt = mysqli_prepare($conn, $query);
        $results = array();

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $productName, $stockNum, $unitCost, $qty, $totalCost);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["productName"] = $productName;
                $row["stockNum"] = $stockNum;
                $row["unitCost"] = $unitCost;
                $row["qty"] = $qty;
                $row["totalCost"] = $totalCost;
                
                $results[] = $row;
            }
        }

        return $results;

    } else {
        return false;
    }

}

function remove_item($conn, $stockNum) {
    $query = "DELETE FROM cart WHERE custId=? && stockNum=?;";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['id'], $stockNum);
        mysqli_stmt_execute($stmt);
    }
}

function create_invoice($conn, $fName, $lName, $email, $address1, $address2, $apartment, $planet,
                                                                 $galaxy, $system, $postcode, $phone, $finCost) {

    $query = "INSERT INTO invoice(custId, fname, lname, email, address, address2, apartType, Suburb, galaxy, sSystem, Postcode, phone, finCost) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $_SESSION['id'], $fName, $lName, $email, $address1, $address2, $apartment, $planet, $galaxy, $system, $postcode, $phone, $finCost);
        mysqli_stmt_execute($stmt);
    } else {
        return FALSE;
    }
}

function delete_cart($conn) {
    $query = "DELETE FROM cart WHERE custId=?";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
        mysqli_stmt_execute($stmt);
    }
}

function update_product_qty($conn) {

    // Query to get cart details for cust
    $query = "SELECT stockNum, qty FROM cart WHERE custId = ?";

    $stmt = mysqli_prepare($conn, $query);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_bind_result($stmt, $stock, $qty);
        $cartres = array();

        // store cart details in array $cartres[]
        while (mysqli_stmt_fetch($stmt)) {
            $row = array();
            $row["stock"] = $stock;
            $row["qty"] = $qty;
            
            $cartres[] = $row;
        }

        // go through each product entry in the $cartres[] array -
        foreach ($cartres as $row ) { 

            // Get the qty from the product table for the stockNum
            $query = "SELECT stockQty FROM product WHERE stockNum = ?";
            $stmt = mysqli_prepare($conn, $query);

            // Run statement
            if($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $row["stock"]);
                mysqli_stmt_execute($stmt);

                // Store the product qty for stockNum in array
                mysqli_stmt_bind_result($stmt, $prodqty);
                // Remove the cart qty from prod qty - store in $newqty
                $newqty = $prodqty - $row["qty"];

                // Update the qty in product using $newqty
                $query = "UPDATE product SET stockQty = ? WHERE stockNum = ?";
                $stmt = mysqli_prepare($conn, $query);

                if($stmt) {
                    mysqli_stmt_bind_param($stmt, "ss", $newqty, $row["stock"]);
                    mysqli_stmt_execute($stmt);
                }
            }
        }
    }
}

?>