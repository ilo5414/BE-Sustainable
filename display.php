<!-- page calls cert info and puts into card  -->
<script type="text/javascript">
function starinsert(productID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("favproduct").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","favproduct.php?productID="+productID,true);
    xmlhttp.send();
    }

</script>


<?php

include("dbconnect.php");

?>

<div id="favproduct">
<div class="row sb_cards">

<?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $product_sql = "SELECT * FROM products";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $product_qry = mysqli_query($dbconnect, $product_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $product_aa = mysqli_fetch_assoc($product_qry);


 // do while loop taking the information from the array and turning it into variables
 do {
   $product_name = $product_aa['productname'];
   $product_image = $product_aa['image'];
   $product_barcode = $product_aa['productbarcode'];
   $productID = $product_aa['productID'];

 // div surrounding the basic booking information as a link
   ?><div class='col-<?php echo $certcolno; ?>'><?php
     ?><div class="card text-center">
       <div class="section">
         <img src="product_images/<?php echo $product_name;?>.png">
       </div>

     <h1><?php echo $product_name ?></h1>
     <p><?php echo $product_barcode ?></p>

     <?php
// there is an error in here, may need to find a non closed braket etc.
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


             ?>






         <!-- only show star if logged in -->
         <?php
         if (isset($_SESSION['userID'])) {

           // makes array of fav certs
           $fav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";
           $fav_qry = mysqli_query($dbconnect, $fav_sql);


             ?>
             <input class="star" type="checkbox" value="<?php echo $certID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsert(this.value)"><br/><br/>
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
 $call="";
 $certcolno = 3;
?>
