

<?php

include("dbconnect.php");

if (isset($_GET['certcolno'])) {
  $certcolno = $_GET['certcolno'];
}
if (isset($_GET['call'])) {
  $call = $_GET['call'];
}
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
}

if (isset($_GET['removal']) && $_GET['removal']==1) {
  session_start();
  // $userID = $_SESSION['userID'];
  $certID = $_GET['certID'];

  $checkfav_sql = "SELECT * FROM favcert WHERE userID=$userID AND certID=$certID";
  $checkfav_qry = mysqli_query($dbconnect, $checkfav_sql);
  if (mysqli_num_rows($checkfav_qry)>0) {
      $sql = "DELETE FROM `favcert` WHERE `favcert`.`userID` = $userID AND `favcert`.`certID` = $certID";
      $qry = mysqli_query($dbconnect, $sql);
    } else {
      $sql = "INSERT INTO favcert (userID, certID)
      VALUES ($userID, $certID)";
      $qry = mysqli_query($dbconnect, $sql);
    }

}


 ?>

<div id="favstar">
<div class="row sb_cards">

<?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $cert_sql = "SELECT * FROM cert $call";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $cert_qry = mysqli_query($dbconnect, $cert_sql);
 // this turns the inforamtion retrieved into an assosiative array
   if(mysqli_num_rows($cert_qry)==0) {
     // no results error message
       echo "<p>No certificates found</p>";

     } else {
       $cert_aa = mysqli_fetch_assoc($cert_qry);
         // do while loop taking the information from the array and turning it into variables
         do {
           $cert_name = $cert_aa['certname'];
           $logo_image = $cert_aa['logo'];
           $about_info = $cert_aa['about'];
           $certID = $cert_aa['certID'];

         // div surrounding the basic booking information as a link
           ?><div class='col-<?php echo $certcolno; ?>'><?php
             ?><div class="card text-center">
               <div class="section">

                 <img src="logos/<?php echo $logo_image; ?>" >

               </div>

             <h1><?php echo $cert_name ?></h1>
             <p><?php echo $about_info ?></p>





             <?php

             // <!-- only show star if logged in -->

             if (isset($_SESSION['userID'])) {

               // makes array of fav certs
               $fav_sql = "SELECT * FROM favcert WHERE userID=$userID AND certID=$certID";
               $fav_qry = mysqli_query($dbconnect, $fav_sql);


                 ?>
                 <input class="star" type="checkbox" value="<?php echo $certID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsert(this.value, <?php echo $certcolno; ?>, '<?php echo $call; ?>', <?php echo $userID; ?>)"><br/><br/>
                 <?php

              } else {
                echo "session problem";
              }

            }

                ?>






     </div>
   </div>
   <!-- // booking link div ends -->

<?php

 // the while statement for the loop
}while($cert_aa = mysqli_fetch_assoc($cert_qry));

  ?>  </div>
 </div>
 <!-- booking display div ends -->
