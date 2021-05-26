
<!-- page calls cert info and puts into card  -->
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
     ?><div class="card">
       <div class="section">
         <img src="logos/<?php echo $logo_image; ?>">
       </div>

     <h1><?php echo $cert_name ?></h1>
     <p><?php echo $about_info ?></p>

     </div>
   </div>
   <!-- // booking link div ends -->





<?php
 // the while statement for the loop
} while ($cert_aa = mysqli_fetch_assoc($cert_qry));

  ?>
 </div>
 <!-- booking display div ends -->
