<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<style>
#output{
  float:left;
  z-index:1;
  margin-top:3rem;
  display:inline-block;
  border-radius:20px;
  background:snow;
}
.btn{
  margin:auto;

}
input[type=date]{
  border:1px solid blue;
  border-radius:2px;
  background:snow;
  color:navy;
  font-size:1.5rem;
}
.form-inline{
  float:right;
}
.btn-outline-primary,.form-inline{
  width:25rem;
  background:snow;
  border:2px solid black;
  color:black;
  font-size:2rem;
}
</style>

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
 
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
   
<link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
        body{ font: 18px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <div class="display_user">Current user &nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></div>
    </div>
  <div class= "container-fluid">

      <a href="dashboard.php" class="btn btn-outline-primary btn-lg">Home</a>
        <a href="sales.php" class="btn btn-outline-primary btn-lg">sales</a>
        <input type="date" name="search" id="search" class="form-inline" placeholder="search" /> 
</div>

     
  <script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'searcsript.php',
              method: 'POST',
              data: {query:query},
              success: function(data){
 
                $('#output').html(data);
                $('#output').css('display', 'block');
 
                $("#search").focusout(function(){
                    $('#output').css('display', 'block');
                });
                $("#search").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'flex');
        }
      });
    });
  </script>


<div id="output" class="container-fluid" style="display:none; float:left;"></div>
    </body> 