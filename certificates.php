

<div class="container-fluid">
   <div class="section" id="certificates_himg">



   <?php include("navbar.php");
   if (isset($_SESSION['userID'])) {
    ?> <p>welcome user <?php echo $_SESSION['userID']; ?></p><?php
   }?>



   <div class="txt_align_center section">
       <h1 class="display-4">Product Certificates!</h1>
       <div class="section">
         <h1 class='display-6'>What they are</h1>
         <h1 class='display-6'>What do they mean</h1>
         <h1 class='display-6'>Why do we need them</h1>
       </div>


       <div class="section">
         <p class="lead">
           <a class="btn btn-lg" href="#" role="button">arrow</a>
         </p>
       </div>

   </div>
   <!-- section header ends -->

 </div>
 <!-- section and image id ends -->

 <div class="fern_img">
   <div class="segment">
     <div class="row section">

         <div class="col-4">
           <h1>Product certificates</h1>
           <h1>What are they?</h1>
         </div>
         <!-- col-3 ends -->

         <div class="col-6">
           <p>Product certification or product qualification is the process
             of certifying a certain product. They do this By testing it’s performance and
             quality to assure it meets qualification criteria of the specific certification ß</p>
         </div>
           <!-- col-3 ends -->
         </div>
         <!-- row section ends -->
       </div>
 <!-- segment ends -->


   <div class="segment">
     <div class="row section">


         <div class="col-6">
           <p>Different certificates mean different things aka different certificates have
             different criteria that products have to meet in order to be certified.
             Read up below on the certificates that our products have to learn more about them
             and what they mean for the product you have purchased. </p>
         </div>
           <!-- col-3 ends -->
         </div>
         <!-- row section ends -->
       </div>
 <!-- segment ends -->

        </div>
        <!-- booking display div ends -->

        <?php include ("certcard.php"); ?>
