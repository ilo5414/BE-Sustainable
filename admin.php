



<div class="container-fluid" id="homepage_himg">

  <?php include("navbar.php"); ?>

  <?php

  if(!isset($_SESSION['admin'])) {
    header("location: index.php?page=login");

  }


  else {
  ?>
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

  <div class="column col-6" >
    <h1>Favourite certificates</h1>
    <div class="row sb_cards">

     <?php

$colno = 6;
     $call = "JOIN favcert ON favcert.certID = cert.certID WHERE userID=$userID";
    include ("certcard.php"); ?>

  </div>
</div>

</div>
</div>
</div>
<!-- end of container-fluid -->


<?php

}

 ?>
