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
    <a href="accesories.php" class="btn btn-outline-primary btn-lg" style="width:100%;padding:1rem;border:none;font-size:20px;color:navy;">Accessories</a>

        <a href="dashboard.php" class="btn btn-outline-primary btn-lg">Home</a>
        <a href="sales.php" class="btn btn-outline-primary btn-lg">sales</a>
        <a href="accessories.php" class="btn btn-outline-primary btn-lg">Accessories</a>
        <a href="add_accessory.php" class="btn btn-outline-primary btn-lg">Add accessory</a>
        <a href="accessorysearch.php" class="btn btn-outline-primary btn-lg">search accessories</a>

    
        <a href="passreset.php" class="btn btn-outline-warning btn-lg">Reset Your Password</a>
        <a href="logout.php" class="btn btn-outline-danger btn-lg">Sign Out of Your Account</a>
        </div>
    </div>

   
    <div class="container-fluid center-div  sales_div" style="margin-top:5vh;">
   
    <?php
    require_once "dbconfig.php";

    $sql = "SELECT * FROM accesory ORDER BY id desc";
    if($result = mysqli_query($link, $sql)){

      if(mysqli_num_rows($result) > 0){
     
      echo '<table>';
      echo "<thead>";
          echo "<th>date</th>";
          echo "<th>item_id</th>";
          echo "<th> item_name</th>";
          echo "<th>item_type</th>";
          echo "<th>Branch</th>";
          echo "<th>Amount</th>";
      echo "</thead>";
  while($row = mysqli_fetch_array($result)){
      echo "<tr>";
          echo "<td>" . $row['date'] . "</td>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['type'] . "</td>";
          echo "<td>" . $row['branch'] . "</td>";
          echo "<td>" . $row['amount'] . "</td>";
      echo "</tr>";
     
      
  }
  echo '</table>';
  mysqli_free_result($result);
    } else{
        echo "Please add something to start.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection

$link->close();
?>
</div>