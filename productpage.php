<?php
include("navbar.php");

?>
<br><br><br>
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
$productID = $_GET['productID'];

// the sql stament that will be run in the data base to obtain the information wanted
$product_sql = "SELECT * FROM products JOIN company ON products.companyID=company.companyID WHERE products.productID = $productID";

// this takes the slq written above to the data base and runs it to obtain the information wanted
$product_qry = mysqli_query($dbconnect, $product_sql);
// this turns the inforamtion retrieved into an assosiative array
$product_aa = mysqli_fetch_assoc($product_qry);


$product_name = $product_aa['productname'];
$company_name = $product_aa['companyname'];
$product_barcode = $product_aa['productbarcode'];
$blurb = $product_aa['blurb'];

// div surrounding the basic booking information as a link


?><div style="background-color: white; color:black;">
    <div class="row">
      <div class="col-lg-6">


      <img src="product_images/<?php echo $product_name;?>.png" style="overflow: hidden; max-height: 100%; max-width:100%;">
      </div>



<div class="col-lg-6 col-md-12">
<div class="row">
<div class="col-6">
  <h1><?php echo $product_name ?></h2>
  <h2><?php echo $company_name ?></h3>
  <p style="font-size: 20px;"><?php echo $product_barcode ?></p>
</div>

<div class="col-6" style="text-align:right;">
<button class="btn green_button">
<p>add prodcut to favourites</p>
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
     <!-- star ends -->
   </button>
</div>
</div>
<p style="font-size: 20px;"><?php echo $blurb?></p>
     <!-- certificates -->

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
       $cert = $cert_aa['logo'];
       $certID = $cert_aa['certID'];?>

       <a href="index.php?page=certificates#<?php echo $certID;?>">
       <img style="margin-left: auto; margin-right: auto; max-height: 75px; width: auto;" src="logos/<?php echo $cert;?>">
       </a>
       <!-- <p class="card-title"><?php echo "$cert";?></p> -->
      <?php } while($cert_aa = mysqli_fetch_assoc($cert_qry));
       ?></div><?php
       }
          ?>












       </div>
       </div>
  </div>

</div>
<!-- // booking link div ends -->
