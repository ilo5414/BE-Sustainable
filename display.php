<!-- page calls cert info and puts into card  -->
<script type="text/javascript">


function starinsertprod(productID, displaycondition, userID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("favproduct").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","display.php?removal=2&userID="+userID+"&displaycondition="+displaycondition+"&productID="+productID,true);
    xmlhttp.send();
    }
    <?php echo "sent" ?>
</script>
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
   $product_sql = "SELECT * FROM products JOIN company ON products.companyID=company.companyID $displaycondition";

 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $product_qry = mysqli_query($dbconnect, $product_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $product_aa = mysqli_fetch_assoc($product_qry);


 // do while loop taking the information from the array and turning it into variables
if (mysqli_num_rows($product_qry)>0) {
 do {
   $product_name = $product_aa['productname'];
   $company_name = $product_aa['companyname'];
   $product_barcode = $product_aa['productbarcode'];
   $productID = $product_aa['productID'];

 // div surrounding the basic booking information as a link


   ?><div class='col-xl-<?php echo $xlnum;?> col-lg-<?php echo $lgnum;?> col-sm-<?php echo $smnum;?> '> <?php

     ?><div class="card text-center">
       <div class="section">
         <img src="product_images/<?php echo $product_name;?>.png" style="max-height: 175px; width: auto;">
       </div>



     <h2><?php echo $product_name ?></h2>
     <h3><?php echo $company_name ?></h3>
     <p><?php echo $product_barcode ?></p>

     <?php

          $cert_sql = "SELECT * FROM productcert JOIN products ON products.productID=productcert.productID JOIN cert ON cert.certID=productcert.certID WHERE products.productID LIKE '$productID';";
          $cert_qry = mysqli_query($dbconnect, $cert_sql);
          if(mysqli_num_rows($cert_qry)==0) {
            // no results error message
              echo "<p>No certificates found</p>";
            } else {
          $cert_aa = mysqli_fetch_assoc($cert_qry);
          ?>
          <div style="margin:0px;" class="row">
            <?php
          do {
          $cert = $cert_aa['logo'];?>


          <img style="margin-left: auto; margin-right: auto; max-height: 75px; width: auto;" src="logos/<?php echo $cert;?>">

          <!-- <p class="card-title"><?php echo "$cert";?></p> -->
         <?php } while($cert_aa = mysqli_fetch_assoc($cert_qry));
          ?></div><?php
          }
             ?>






         <!-- only show star if logged in -->
         <?php
         if (isset($_SESSION['userID'])) {

           // makes array of fav certs
           $fav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";
           $fav_qry = mysqli_query($dbconnect, $fav_sql);


             ?>
               <input class="star" type="checkbox" style="margin-left:auto; margin-right:auto;" value="<?php echo $productID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsertprod(this.value, '<?php echo $displaycondition; ?>', <?php echo $userID; ?>)"><br/><br/>

<?php

          }else {
            ?>
            <a href="index.php?page=login">
            <input class="star" type="week"><br/><br/>
            </a><?php
          }


            ?>






     </div>
   </div>
   <!-- // booking link div ends -->

<?php
 // the while statement for the loop
} while ($product_aa = mysqli_fetch_assoc($product_qry));
}else {



?><br> <br><?php
echo "No Items";




}

  ?>  </div>
 </div>
 <!-- booking display div ends -->
