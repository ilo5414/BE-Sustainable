<!-- page calls cert info and puts into card  -->



<?php

include("dbconnect.php");



if (isset($_GET['prodcolno'])) {
  $prodcolno = $_GET['prodcolno'];
}
if (isset($_GET['displaycondition'])) {
  $displaycondition = $_GET['displaycondition'];
}
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
  echo $userID;
}

if (isset($_GET['productID'])) {
  $productID = $_GET['productID'];
}

if (isset($_GET['removal']) && $_GET['removal']==2) {
  session_start();







   $checkfav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";

   $checkfav_qry = mysqli_query($dbconnect, $checkfav_sql);

   if (mysqli_num_rows($checkfav_qry)>0) {

       $sql = "DELETE FROM `favprod` WHERE `favprod`.`userID` = $userID AND `favprod`.`productID` = $productID";

       $qry = mysqli_query($dbconnect, $sql);

     } else {

       $sql = "INSERT INTO favprod (userID, productID) VALUES ($userID, $productID)";

       $qry = mysqli_query($dbconnect, $sql);

     }
   }


?>

<div id="favproduct">
<div class="row sb_cards">

<?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $product_sql = "SELECT * FROM products $displaycondition";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $product_qry = mysqli_query($dbconnect, $product_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $product_aa = mysqli_fetch_assoc($product_qry);


 // do while loop taking the information from the array and turning it into variables
 do {
   $product_name = $product_aa['productname'];
  
   $product_barcode = $product_aa['productbarcode'];
   $productID = $product_aa['productID'];

 // div surrounding the basic booking information as a link
   ?><div class='col-<?php echo $prodcolno; ?>'><?php
     ?><div class="card text-center">
       <div class="section">
         <img src="product_images/<?php echo $product_name;?>.png">
       </div>

     <h1><?php echo $product_name ?></h1>
     <p><?php echo $product_barcode ?></p>

     <?php

          $cert_sql = "SELECT * FROM productcert JOIN products ON products.productID=productcert.productID JOIN cert ON cert.certID=productcert.certID WHERE products.productID LIKE '$productID';";
          $cert_qry = mysqli_query($dbconnect, $cert_sql);
          if(mysqli_num_rows($cert_qry)==0) {
            // no results error message
              echo "<p>No certificates found</p>";
            } else {
          $cert_aa = mysqli_fetch_assoc($cert_qry);

          do {
          $cert = $cert_aa['certname'];?>
          <p class="card-title"><?php echo "$cert";?></p>
         <?php } while($cert_aa = mysqli_fetch_assoc($cert_qry));

          }
             ?>






         <!-- only show star if logged in -->
         <?php
         if (isset($_SESSION['userID'])) {

           // makes array of fav certs
           $fav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";
           $fav_qry = mysqli_query($dbconnect, $fav_sql);


             ?>
             <input class="star" type="checkbox" value="<?php echo $productID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsertprod(this.value, <?php echo $prodcolno; ?>, '<?php echo $displaycondition; ?>', <?php echo $userID; ?>)"><br/><br/>

             <?php



          }


            ?>






     </div>
   </div>
   <!-- // booking link div ends -->

<?php
 // the while statement for the loop
} while ($product_aa = mysqli_fetch_assoc($product_qry));

  ?>  </div>
 </div>
 <!-- booking display div ends -->
 <?php


?>
