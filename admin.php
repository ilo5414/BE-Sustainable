<!-- user page -->
<script>
function openPage(pageName,elmnt) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";

}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<div class="container-fluid" id="homepage_himg">


  <?php include("navbar.php"); ?>

  <?php

  if(!isset($_SESSION['admin'])) {
    header("location: index.php?page=login");
  }
  else {

?>

<div class="jumbotron"  >


<div class="row" style="margin: 0px;">

  <div class="col-12">

  <h1>Welcome <?php echo $username; ?></h1>
  <p><a href = "index.php?page=logout">logout</a></p>

  </div>

</div>

<button class="tablink" onclick="openPage('prod', this)" id="defaultOpen">Favourite Products</button>
<button class="tablink" onclick="openPage('cert', this)">Favourite Certifications</button>



<div id="prod" class="tabcontent">
  <?php

  $displaycondition = "JOIN favprod ON favprod.productID = products.productID WHERE userID=$userID";
  include("display.php"); ?>

</div>

<div id="cert" class="tabcontent">
    <?php
  $call = "JOIN favcert ON favcert.certID = cert.certID WHERE userID=$userID";
  include("certcard.php"); ?>
</div>





  </div>
</div>

<!-- end of container-fluid -->

<?php

}

 ?>
