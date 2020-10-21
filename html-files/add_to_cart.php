<?php
session_start();

include_once 'db_functions.php';
include_once 'inc/dbconn.inc.php';

if ($conn) {
    $stockNum = $_POST["stockNum"];
    $qty = $_POST["qtyitem"];
    $unitCost = $_POST["unitCost"];

    if (check_qty($conn, $stockNum, $qty)) {
        add_to_cart($conn, $_SESSION["id"], $stockNum, $unitCost, $qty);
        header("location: itemAdded.html");
    }
    else {
        echo "Not enough qty";
        return false;
    }
}
else {
    echo "Connection to database failed";
    return false;
}
?>