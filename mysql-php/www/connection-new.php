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

    // If the page is receiving the email and password from the login form then verify the login data
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['location_id']))
    {
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, type, location_id) VALUES (:first_name, :last_name, :email, :password, :type, :location_id)");
        $stmt->bindValue(':first_name', $_POST['first_name']);
        $stmt->bindValue(':last_name', $_POST['last_name']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':type', "Member");
        $stmt->bindValue(':password', password_hash($_POST["password"], PASSWORD_DEFAULT));
        $stmt->bindValue(':location_id', $_POST['location_id']);
        
        if( $stmt->execute()){
        
        echo "You have successfully become a member of our gym! Continue back to the home page and sign in!";
            header("location: https://https://www.cmsc508.com/~patelp16/508-project-patelp16/mysql-php/www/index.php");
        } 
    else
    {
        // Show login page
        echo "There was an error please try again!";
        
        header("location: https://https://www.cmsc508.com/~patelp16/508-project-patelp16/mysql-php/www/sign-up.php");
        
   }
    }
?>