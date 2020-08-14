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
<style>

</style>
    <div class="page-header">
        <div class="display_user"><span>Current user</span><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></div>
    </div>
    <a href="sales.php" class="btn btn-outline-primary btn-lg" style="width:100%;padding:1rem;border:none;font-size:20px;color:navy;">sales</a>

        <a href="dashboard.php" class="btn btn-outline-primary btn-lg">Home</a>
        <a href="add.php" class="btn btn-outline-primary btn-lg">add a sale</a>
        <a href="accessories.php" class="btn btn-outline-primary btn-lg">Accessories</a>
    
        <a href="passreset.php" class="btn btn-outline-warning btn-lg">Reset Your Password</a>
        <a href="logout.php" class="btn btn-outline-danger btn-lg">Sign Out of Your Account</a>


        <?php
        require_once "dbconfig.php";
        $res = 'SELECT SUM(amount) AS value_sum FROM sales'; 
        $row = mysqli_query($link, $res); 
        if (mysqli_num_rows($row) > 0) {
          while($rwo = mysqli_fetch_assoc($row)) {
             echo "<button class = 'btn btn-outline-warning btn-lg  amount'>Total sales: " . $rwo["value_sum"]. "</button>";
          }
       } else {
          echo "0 results";
       }
        ?>
        <a href="search.php" class="btn btn-outline-danger btn-lg">Search</a>



   <!--end of search-->
    <!--search -->
    <div class="container-fluid center-div  sales_div" style="margin-top:5vh;">

    <?php
    require_once "dbconfig.php";

    $sql = "SELECT * FROM sales ORDER BY id desc";
    if($result = mysqli_query($link, $sql)){

      if(mysqli_num_rows($result) > 0){
     
      echo '<table>';
      echo "<thead>";
          echo "<th>id</th>";
          echo "<th>date</th>";
          echo "<th>vehicle type</th>";
          echo "<th>vehicle model</th>";
          echo "<th>capacity</th>";
          echo "<th>branch</th>";
          echo "<th>Sales person</th>";
          echo "<th>Amount</th>";
          echo "<th>Amount</th>";
      echo "</thead>";
  while($row = mysqli_fetch_array($result)){
      echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['date'] . "</td>";
          echo "<td>" . $row['v_type'] . "</td>";
          echo "<td>" . $row['v_model'] . "</td>";
          echo "<td>" . $row['e_capacity'] . "</td>";
          echo "<td>" . $row['branch'] . "</td>";
          echo "<td>" . $row['salesperson'] . "</td>";
          echo "<td>" . $row['amount'] . "</td>";
          echo "<td>" . $row['comment'] . "</td>";
      echo "</tr>";
     
      
  }
  echo '</table>';
  mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection

$link->close();
?>
</div>
