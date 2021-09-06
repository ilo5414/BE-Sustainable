<!-- This is the individual certificates page where each individual certificate -->
<!-- is displayed -->

<!-- gets certID -->
<?php
$certID = $_GET['certID'];
 ?>



<div class="container-fluid" style="background-color: white;">
   <div class="" id="certificates_himg">


<!-- displays navbar  -->
   <?php include("navbar.php");?>



   <div class="txt_align_center ">
       <h1 class="display-4">Product Certificates!</h1>



   </div>
   <!-- section header ends -->

 </div>
 <!-- section and image id ends -->
 <div class="row">

   <div class="crt_card1 col-4">
     <a href="index.php?page=certificates">
     <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
    </svg>
     </a>



   </div>
   <div class="crt_card col-8">

<!-- includes all certs -->
<!-- sets width of certcards -->
   <?php
    $xlnum = 12;
    $lgnum = 12;
    $smnum = 12;

     $call = "WHERE certID=$certID";
     include("certcard.php"); ?>

    </div>

 </div>
        </div>
        <!-- container fluid ends -->
<?php
