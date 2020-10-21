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
        $sql = "SELECT custid, usrnme, pwd FROM Customer WHERE usrnme = ? && pwd = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
            // Bind variables to the prepared statement
            mysqli_stmt_bind_param($stmt, "ss", htmlspecialchars($uname),($pword));
            // Attempt to execute the prepared statement
            mysqli_stmt_execute($stmt);
                // Store the result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
                $numrows = mysqli_stmt_num_rows($stmt);                  
                    // Bind result variables   
                    mysqli_stmt_bind_result($stmt, $cid, $usrname, $pssword);
                    mysqli_stmt_fetch($stmt);
                        if($numrows ==1){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $cid;
                            $_SESSION["username"] = $usrname;                            
                            
                            // Redirect user to the home page
                            header("location: index.php");
                            exit;

                        } else { 
                             header("location: notright.html");
                        }

            // Close statement
            mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);


?>