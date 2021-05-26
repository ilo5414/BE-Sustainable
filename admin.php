
<?php
session_start();
if(!isset($_SESSION['admin'])) {
  header("location: index.php");

}

else {
?>

<div class="container-fluid" id="homepage_himg">

  <?php include("navbar.php"); ?>


<div class="jumbotron"  >


<div class="row">

  <div class="col-12">

  <h1>Welcome User xxxx</h1>
  <p><a href = "index.php?page=logout">logout</a></p>

  </div>

</div>
<!-- end of row 1 -->

<div class="row">
  <div class="col-6">
    <h1>Favourite products</h1>

  </div>

  <div class="col-6">
    <h1>Favourite certificates</h1>
    
  </div>
</div>

</div>
<!-- end of container-fluid -->


<?php

}

 ?>
