<?php
require_once 'session.php';
?>

<div class="container-fluid dashboard-div">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">our accessories</h5>
        <p class="card-text">Click here to go the todays sales</p>
        <a href="accessories.php" class="btn btn-primary">accessories</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">our sales</h5>
        <p class="card-text">Click here to go the todays sales</p>
        <a href="sales.php" class="btn btn-primary">see sales</a>
      </div>
    </div>
  </div>
</div>
<div class="card" style="margin-top:10vh;">
  <div class="card-body">
    <h5 class="card-title">our motto</h5>
    <p class="card-text">Our company enjoys supporting our clients</p>
  </div>
</div>

</div>

<div class="card" style="margin-top:10vh;bottom:0;">
  <div class="card-body">
    <h5 class="card-title">more</h5>
    <p class="card-text">sales tracking</p>
  </div>
</div>


<?php

include_once 'footer.php';

?>


