<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales system</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
        body{ font: 18px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <div class="display_user">Current user<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></div>
    </div>
    <div>
        <a href="dashboard.php" class="btn btn-outline-primary btn-lg">Home</a>
        <a href="sales.php" class="btn btn-outline-primary btn-lg">sales</a>
        <a href="accessories.php" class="btn btn-outline-primary btn-lg">Accessories</a>
    
        <a href="passreset.php" class="btn btn-outline-warning btn-lg">Reset Your Password</a>
        <a href="logout.php" class="btn btn-outline-danger btn-lg">Sign Out of Your Account</a>
        </div>
    </div>
