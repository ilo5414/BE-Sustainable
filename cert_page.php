<!-- This is the individual certificates page where each individual certificate -->
<!-- is displayed -->



<div class="container-fluid">
   <div class="section" id="certificates_himg">



   <?php include("navbar.php");
   if (isset($_SESSION['userID'])) {
    ?> <p>welcome user <?php echo $_SESSION['userID']; ?></p><?php
   }?>



   <div class="txt_align_center section">
       <h1 class="display-4">Product Certificates!</h1>



   </div>
   <!-- section header ends -->

 </div>
 <!-- section and image id ends -->


        </div>
        <!-- container fluid ends -->
<?php
  $certID = $_GET['certID'];


   // the sql stament that will be run in the data base to obtain the information wanted
   $cert_sql = "SELECT * FROM cert WHERE certID=$certID";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $cert_qry = mysqli_query($dbconnect, $cert_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $cert_aa = mysqli_fetch_assoc($cert_qry);


 // do while loop taking the information from the array and turning it into variables

   $cert_name = $cert_aa['certname'];
   $logo_image = $cert_aa['logo'];
   $about_info = $cert_aa['about'];
   $certID = $cert_aa['certID'];

 // div surrounding the basic booking information as a link

   ?><div class='col-exampleFormControlFile1-6'>
     <div class="card text-center" id=<?php echo $certID?>>

       <div class="section">


         <img src="logos/<?php echo $logo_image; ?>" style="max-height: 200px; width: auto;" >

       </div>

     <h4><?php echo $cert_name ?></h4>
     <p><?php echo $about_info ?></p>






         <!-- only show star if logged in -->
         <?php
         if (isset($_SESSION['userID'])) {

           // makes array of fav certs
           $fav_sql = "SELECT * FROM favcert WHERE userID=$userID AND certID=$certID";
           $fav_qry = mysqli_query($dbconnect, $fav_sql);


             ?>
             <input class="star" style="margin-left:auto; margin-right:auto;" type="checkbox" value="<?php echo $certID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsert(this.value, '<?php echo $call; ?>', <?php echo $userID; ?>)"><br/><br/>
             <?php

          }else {
            ?>
            <a href="index.php?page=login">
            <input class="star" type="week"><br/><br/>
            </a>
          <?php } ?>



     </div>
     </div>
