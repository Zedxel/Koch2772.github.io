<?php
session_start();

// Include config file
require_once "inc/dbconn.inc.php";

 // Define variables and initialize with empty values
$uname = "";
$pword = "";
 
// Processing form data when form is submitted
$_SERVER["REQUEST_METHOD"] == "POST";
    $uname = $_POST['username'];
    $pword = $_POST['password'];
        // Prepare a select statement
        $sql = "SELECT * FROM `customer` WHERE `usrNme` LIKE '";
        $sql .= $uname;
        $sql .= "'";
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                    $item = mysqli_fetch_assoc($result);
	        }
	    }
        echo $item["pwd"];
        if(password_verify($pword, trim($item["pwd"])))
        {// Password is correct, so start a new session
            session_start();
            // Store data in session variables
            header("location: index.php");
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $item["custId"];
            $_SESSION["username"] = $uname;                            
                            
            // Redirect user to the home page
            header("location: index.php");
            exit;

        } else { 
                header("location: notright.html");
        }

    // Close connection
    mysqli_close($conn);


?>