<head>
    <meta charset="UTF-8">
    <title>Sales system</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/styles.css">
</head>
<style>
table{
  background:snow;
  border:0.5px solid black;
  margin-top:2rem;
  align:center;
  width:100%;

}
tr{
  background:whitesmoke;
  padding:1rem;
  border:0.5px solid black;
}
tr:nth-child(even) {
  background-color: gray;
}
tr:hover {
  background-color: #f5f5f5;
  }
th{
  background:lightgray;
}
td,th{
  border:0.5px solid black;
}
.btn-outline-primary{
  width:25rem;
  background:snow;
  border:2px solid black;
  color:black;
  font-size:2rem;
}
</style>
<?php
require_once "dbconfig.php";
  if (isset($_POST['query'])){
     
    //$query = "SELECT * FROM sales WHERE date LIKE '{$_POST['query']}%' LIMIT 100";
    $query = "SELECT SUM(amount) as salsa FROM sales WHERE date LIKE '{$_POST['query']}%' LIMIT 100";
   $row = mysqli_query($link, $query); 
    if (mysqli_num_rows($row) > 0) {
      while($rwo = mysqli_fetch_assoc($row)) {
         echo "<button class='btn btn-outline-primary'>This day sales: " . $rwo["salsa"]. "</button>";
      }
   } else {
      echo "0 results";
   }
  }
  
//$query = "SELECT SUM(amount) as salsa FROM sales WHERE date LIKE '{$_POST['query']}%' LIMIT 100";
?>
<?php
require_once "dbconfig.php";
  if (isset($_POST['query'])){
     
    $query = "SELECT * FROM sales WHERE date LIKE '{$_POST['query']}%' LIMIT 100";
    //$query = "SELECT SUM(amount) as salsa FROM sales WHERE date LIKE '{$_POST['query']}%' LIMIT 100";

    if($result = mysqli_query($link, $query)){

      if(mysqli_num_rows($result) > 0){
        echo '<div class="container-fluid">';
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
  echo '</div>';
  mysqli_free_result($result);
    } else{
        echo "<div style='background:snow;color:red;'>ooops! cant find this</div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
  
}
// Close connection

$link->close();
  
?>