<!-- this page displays certifications as cards -->
<!-- this script allows the certs to be favourited/ unfavourited without reloading th page -->
<script type="text/javascript">
function starinsert(certID, call, userID) {
// when star is clicked
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // fill favstar div
        document.getElementById("favstar").innerHTML = this.responseText;
      }
    };
    // with certcard response
    xmlhttp.open("GET","certcard.php?removal=1&userID="+userID+"&call="+call+"&certID="+certID,true);
    xmlhttp.send();
    }
</script>

<?php
// ajax does not include index or navbar so dbconnnect must be done again
include("dbconnect.php");

// if cert has been clicked on, will show green border
if (isset($_GET["cert"])) {
  $selected_cert=$_GET["cert"];
}
// if only certian certs wanted
if (isset($_GET['call'])) {
  $call = $_GET['call'];
}
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
}

// if favourtite status has been changed
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
      echo "<h3> if working <h3>";
      $sql = "INSERT INTO favcert (userID, certID)
      VALUES ($userID, $certID)";
      $qry = mysqli_query($dbconnect, $sql);
    }

}
// sets width of columns
if (isset($xlnum)) {
}else{
  $xlnum = 3;
}
if (isset($lgnum)) {
}else{
  $lgnum = 4;
}

if (isset($mdnum)) {
}else{
  $mdnum = 6;
}
if (isset($smnum)) {
}else{
  $smnum = 12;
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
   $cert_aa = mysqli_fetch_assoc($cert_qry);


 // do while loop taking the information from the array and turning it into variables
if (mysqli_num_rows($cert_qry)>0){
 do {
   $cert_name = $cert_aa['certname'];
   $logo_image = $cert_aa['logo'];
   $about_info = $cert_aa['about'];
   $certID = $cert_aa['certID'];

// if cert was clicked to get to page, green border will show up around the certcard

   ?><div class='col-xl-<?php echo $xlnum;?> col-lg-<?php echo $lgnum;?> col-md-<?php echo $mdnum;?> col-sm<?php echo $smnum;?>'><?php
   if (isset($_GET["cert"]) and $certID==$selected_cert) {
     ?><div style="border-style: solid; border-color: green;">
       <?php
   }
   // make div link to cert_page
       ?><a href="index.php?page=cert_page&certID=<?php echo $certID; ?>"><div class="card text-center" id=<?php echo $certID?>>

       <div class="section">

<!-- display cert logo img -->
         <img src="logos/<?php echo $logo_image; ?>" style="max-height: 200px; width: auto;" alt="<?php echo $logo_image; ?> logo image">

       </div>
<!-- display cert name, about info -->
     <h4><?php echo $cert_name ?></h4>
     <p><?php echo $about_info ?></p>
     </a>






         <!-- only show star if logged in -->
         <?php
         if (isset($_SESSION['userID'])) {

           // makes array of fav certs
           $fav_sql = "SELECT * FROM favcert WHERE userID=$userID AND certID=$certID";
           $fav_qry = mysqli_query($dbconnect, $fav_sql);


             ?>
             <!-- if cert in favcert, show star as solid -->
             <!-- if star is clicked, call star insert fuction -->
             <input class="star" style="margin-left:auto; margin-right:auto;" type="checkbox" value="<?php echo $certID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsert(this.value, '<?php echo $call; ?>', <?php echo $userID; ?>)"><br/><br/>
             <?php

          }else {
            ?>
            <!-- if user not logged in, make star empty and a link to login page -->
            <a href="index.php?page=login">
            <input class="star" type="week"><br/><br/>
            <?php
          }


            ?>






     </div></a>
   </div>
   <?php if (isset($_GET["cert"]) and $certID==$selected_cert) {
     ?></div>
       <?php
   }
?>
   <!-- // booking link div ends -->

<?php
 // the while statement for the loop
} while ($cert_aa = mysqli_fetch_assoc($cert_qry));
}else {
  echo "no fav certs";
}

  ?>
   </div>


 </div>

 <!-- booking display div ends -->
