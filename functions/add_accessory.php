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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--<link rel="stylesheet" href="css/styles.css">-->

    <style type="text/css">
        body{ font: 1rem sans-serif; text-align: center; }
    </style>
</head>
<body>

<script>
$('.alert').alert();
</script>
<style>
.btn-outline-primary,.btn-outline-warning,.btn-outline-danger{
  font-size:16px;
}
.display_user{
  padding:2rem;
}
.display_user span{
  padding:1rem;
}
a{
  text-decoration:none;
}
a:hover{
  text-decoration:none;
  color:green;
}
</style>
    <div class="container-fluid">
        <div class="display_user"><span>Current user</span><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></div>
    </div>
    <div>
    <a href="add_accessory.php" class="card" style="width:100%;padding:1rem;border:none;font-size:20px;color:navy;">Add Accessory</a>

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
$date = mysqli_real_escape_string($link, $_POST['v_type']);
$v_type = mysqli_real_escape_string($link, $_POST['v_model']);
$v_model = mysqli_real_escape_string($link,$_POST['e_capacity']);
$e_capacity = mysqli_real_escape_string($link, $_POST['branch']);
$branch = mysqli_real_escape_string($link, $_POST['salesperson']);
//$salesperson = mysqli_real_escape_string($link, $_POST['salesperson']);

// Attempt insert query execution
$sql = "INSERT INTO accesory(date, name,type,branch,amount) VALUES ('$date', '$v_type', '$v_model', '$e_capacity', 
'$branch')";
if(mysqli_query($link, $sql)){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Records added successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='false'>&times;</span>
  </button>
    </div>";
    header("refresh: 5; url=accessories.php");
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
      <input type="date" name = "v_type" class="form-control" id="inputEmail3">
    </div>
  </div>   
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name = "v_model" class="form-control" id="inputEmail3">
    </div>
  </div>  
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label"> Type</label>
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
    <label for="inputEmail3" class="col-sm-3 col-form-label">Amount</label>
    <div class="col-sm-5">
      <input type="textarea" name = "salesperson" class="form-control" id="inputEmail3">
    </div>
  </div>   
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary save">Save</button>
    </div>  
</form>
    </div>
