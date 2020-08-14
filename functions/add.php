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
        <a href="sales.php" class="btn btn-outline-primary btn-lg">Sales</a>
        <a href="accessories.php" class="btn btn-outline-primary btn-lg">Accessories</a>
    
        <a href="passreset.php" class="btn btn-outline-warning btn-lg">Reset Your Password</a>
        <a href="logout.php" class="btn btn-outline-danger btn-lg">Sign Out of Your Account</a>
        </div>
    </div>
    <div class="container-sm center-div" style="margin-top:5vh;">
    <?php
// Include config file
require_once "dbconfig.php";


// Define variables and initialize with empty values
$date=$v_type=$v_model=$e_capacity=$branch=$salesperson=$amount=$comment="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Processing form data when form is submitted
$date = mysqli_real_escape_string($link, $_POST['date']);
$v_type = mysqli_real_escape_string($link, $_POST['v_type']);
$v_model = mysqli_real_escape_string($link,$_POST['v_model']);
$e_capacity = mysqli_real_escape_string($link, $_POST['e_capacity']);
$branch = mysqli_real_escape_string($link, $_POST['branch']);
$salesperson = mysqli_real_escape_string($link, $_POST['salesperson']);
$amount = mysqli_real_escape_string($link, $_POST['amount']);
$comment = mysqli_real_escape_string($link, $_POST['comment']);
 
// Attempt insert query execution
$sql = "INSERT INTO sales(date, v_type, v_model,e_capacity,branch,salesperson,amount,comment) VALUES ('$date', '$v_type', '$v_model', '$e_capacity', 
'$branch', '$salesperson', '$amount', '$comment')";
if(mysqli_query($link, $sql)){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Records added successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='false'>&times;</span>
  </button>
    </div>";
    header("refresh: 5; url=sales.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

    mysqli_close($link);
}
?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Date</label>
    <div class="col-sm-5">
      <input type="date" name = "date" class="form-control" id="inputEmail3">
    </div>
  </div> 
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Vehicletype</label>
    <div class="col-sm-5">
      <input type="text" name = "v_type" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Vehicle model</label>
    <div class="col-sm-5">
      <input type="text" name = "v_model" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label"> Engine capacity</label>
    <div class="col-sm-5">
      <input type="text" name="e_capacity" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Branch</label>
    <div class="col-sm-5">
      <input type="text" name= "branch" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Salesperson</label>
    <div class="col-sm-5">
      <input type="text" name = "salesperson" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
    <div class="col-sm-5">
      <input type="text" name= "amount" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Comment</label>
    <div class="col-sm-5">
      <input type="text" name="comment" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary save">Save</button>
    </div>  
</form>
    </div>
