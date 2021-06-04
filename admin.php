



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
       // the sql stament that will be run in the data base to obtain the information wanted
       $favcert_sql = "SELECT * FROM cert JOIN favcert ON cert.certID=favcert.certID WHERE userID=$userID";
     // this takes the slq written above to the data base and runs it to obtain the information wanted
       $favcert_qry = mysqli_query($dbconnect, $favcert_sql);
     // this turns the inforamtion retrieved into an assosiative array
       $favcert_aa = mysqli_fetch_assoc($favcert_qry);


     // do while loop taking the information from the array and turning it into variables
     do {
       $cert_name = $favcert_aa['certname'];
       $logo_image = $favcert_aa['logo'];
       $about_info = $favcert_aa['about'];
       $certID = $favcert_aa['certID'];

     // div surrounding the basic booking information as a link
       ?><div class="col-6" ><?php
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
               ?>
               <!-- star -->
               <label for="id-of-input" class="custom-checkbox">
                 <input type="checkbox" id="star" name="star" onChange="this.form.submit();" />
                 <i class="glyphicon glyphicon-star-empty"></i>
                 <i class="glyphicon glyphicon-star"></i>
              <!-- star ends  -->
                 <span>Favorite</span>
               </label>

               <?php
             } else {
             }



        ?>

         </form>

         </div>
       </div>
       <!-- // booking link div ends -->

    <?php
     // the while statement for the loop
   } while ($favcert_aa = mysqli_fetch_assoc($favcert_qry));

      ?>

  </div>
</div>

</div>
<!-- end of container-fluid -->


<?php

}

 ?>
