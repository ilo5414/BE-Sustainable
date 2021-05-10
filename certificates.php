<div class="container-fluid">
   <div class="section" id="certificates_himg">



   <?php include("navbar.php"); ?>

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


       <div class="row sb_cards">
        <?php
          // the sql stament that will be run in the data base to obtain the information wanted
          $cert_sql = "SELECT * FROM cert";
        // this takes the slq written above to the data base and runs it to obtain the information wanted
          $cert_qry = mysqli_query($dbconnect, $cert_sql);
        // this turns the inforamtion retrieved into an assosiative array
          $cert_aa = mysqli_fetch_assoc($cert_qry);


        // do while loop taking the information from the array and turning it into variables
        do {
          $cert_name = $cert_aa['certname'];
          $logo_image = $cert_aa['logo'];
          $about_info = $cert_aa['about'];

        // div surrounding the basic booking information as a link
          ?><div class="col-3" ><?php
            ?><div class="card">>
            <img src="logos/<?php echo $logo_image; ?>">
            <h1><?php $cert_name ?></h1>
            <p><?php $about_info ?></p>

            </div>
          </div>
          <!-- // booking link div ends -->





      <?php
        // the while statement for the loop
      } while ($cert_aa = mysqli_fetch_assoc($cert_qry));

         ?>
        </div>
        <!-- booking display div ends -->
