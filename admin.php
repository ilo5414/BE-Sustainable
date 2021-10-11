<!-- user page -->
<!-- this page displys all of users favourited items, and certifications -->

<!-- this script allows the user to tab between fav products and fav certifications -->
<script>
function openPage(pageName) {
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

// favcert is opened by default.
document.getElementById("defaultOpen").click();
</script>

<div class="container-fluid" id="homepage_himg">

<!-- navbar -->
  <?php include("navbar.php");
  // navbar ends


// if user is not logged in, redirect to login page
  if(!isset($_SESSION['admin'])) {
    header("location: index.php?page=login");
  }
  // else display page
  else {

?>

<div class="jumbotron"  >


<div class="row" style="margin: 0px;">

  <div class="col-12">
<!-- welcome user and logout button -->
  <h1>Welcome <?php echo $username; ?></h1>
  <p><a href = "index.php?page=logout">logout</a></p>

  </div>

</div>
<!-- tabs -->
<button class="tablink" onclick="openPage('prod')" id="defaultOpen">Favourite Products</button>
<button class="tablink" onclick="openPage('cert')">Favourite Certifications</button>


<!-- div for favproduct tab -->
<div id="prod" class="tabcontent">
  <?php

  $displaycondition = "JOIN favprod ON favprod.productID = products.productID WHERE userID=$userID";
  include("display.php"); ?>

</div><!-- div for favproduct tab ends-->


<!-- div for favcert tab -->
<div id="cert" class="tabcontent">
    <?php
  $call = "JOIN favcert ON favcert.certID = cert.certID WHERE userID=$userID";
  include("certcard.php"); ?>
</div>
<!-- div for favcert tab  ends-->




  </div>
</div>

<!-- end of container-fluid -->

<?php

}

 ?>
