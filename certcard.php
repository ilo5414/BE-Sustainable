
<!-- page calls cert info and puts into card  -->





<div class="row sb_cards">
 <?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $cert_sql = "SELECT * FROM cert $call";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $cert_qry = mysqli_query($dbconnect, $cert_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $cert_aa = mysqli_fetch_assoc($cert_qry);


 // do while loop taking the information from the array and turning it into variables
 do {
   $cert_name = $cert_aa['certname'];
   $logo_image = $cert_aa['logo'];
   $about_info = $cert_aa['about'];
   $certID = $cert_aa['certID'];

 // div surrounding the basic booking information as a link
   ?><div class='col-<?php echo $colno?>' ><?php
     ?><div class="card">
       <div class="section">
         <img src="logos/<?php echo $logo_image; ?>">
       </div>

     <h1><?php echo $cert_name ?></h1>
     <p><?php echo $about_info ?></p>

<!-- star rating -->

<form id="starform" action="index.php?page=starinsertitem" method="post">
        <input type="hidden" name='certID' value='<?php echo "$certID";?>'/>
        <input type='hidden' name='userID' value='<?php echo "$userID";?>'/>

        <!-- only show star if logged in -->
        <?php
        if (isset($_SESSION['userID'])) {

          // makes array of fav certs
          $fav_sql = "SELECT * FROM favcert WHERE userID=$userID";
          $fav_qry = mysqli_query($dbconnect, $fav_sql);
          $fav_aa = mysqli_fetch_assoc($fav_qry);
          $favcertIDarray= array();
          do {
            $favcertID = $fav_aa['certID'];
            array_push($favcertIDarray, "$favcertID");
          } while ($fav_aa = mysqli_fetch_assoc($fav_qry));



          ?>
          <!-- star -->

            <input type="checkbox" id="star" name="star" onChange="this.form.submit();" />
            <label for="star" class="custom-checkbox" style="min-height: 40px;">
             <?php if (in_array("$certID",$favcertIDarray)) {
               // delete from favcert
               ?>
               <input type="hidden" name='starcheck' value='TRUE'/>
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
</svg><?php

             } else{
               // add to favcert
               ?>
               <input type="hidden" name='starcheck' value='FALSE'/>
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg><?php
             }?>

          <!-- star ends  -->
           </label>

           <?php
         }



    ?>


     </form>

     </div>
   </div>
   <!-- // booking link div ends -->

<?php
 // the while statement for the loop
} while ($cert_aa = mysqli_fetch_assoc($cert_qry));

  ?>
 </div>
 <!-- booking display div ends -->
