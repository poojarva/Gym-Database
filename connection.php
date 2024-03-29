<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost"; // localhost means "itself" because the MySQL servers runs on the same server than the Apache webserver.
$username = "patelp16";
$password = "V00947239";
$database = "project_patelp16";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


// Start or resume session variables
session_start();

// If the user_ID session is not set, then the user has not logged in yet
if (!isset($_SESSION['username_id']))
{
    // If the page is receiving the email and password from the login form then verify the login data
    if (isset($_POST['email']) && isset($_POST['password']))
    {
        $stmt = $conn->prepare("SELECT username_id, password FROM users WHERE email=:email");
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->execute();
        
        $queryResult = $stmt->fetch();
        
        // Verify password submitted by the user with the hash stored in the database
        if(!empty($queryResult) && password_verify($_POST["password"], $queryResult['password']))
        {
            // Create session variable
            $_SESSION['username_id'] = $queryResult['username_id'];
           
            // Redirect to URL
            // redirect to index for members
            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        } else {
            // Password mismatch
            echo "User not in the System - Please try again.";
            require('login.php');
            exit();
        }
    }
    
    else
    {
        // Show login page
        require('login.php');
        exit();
    }
}

?>