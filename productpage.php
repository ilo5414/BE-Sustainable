<!-- this is the individual products page which displays the information for a particular product -->

<?php
// connect to database for when using ajax
if (isset($_GET['removal'])) {
  include("dbconnect.php");

// include navbar
} else{
  include("navbar.php");
}

?>
<br><br><br>
<script type="text/javascript">

// when product star is clicked, product is added to favprod
function starinsertprod(productID, userID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("favproduct").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","productpage.php?removal=2&userID="+userID+"&productID="+productID,true);
    xmlhttp.send();
    }
    <?php echo "sent" ?>
</script>


<?php
// if user is logged in, recall userID
if (isset($_GET['userID'])) {
  $userID = $_GET['userID'];
}
// get productID of product to be displayed
if (isset($_GET['productID'])) {
  $productID = $_GET['productID'];
}
// if star has been clicked, and product must be removed from favprod
if (isset($_GET['removal']) && $_GET['removal']==2) {
  session_start();






// delete product from favprod
   $checkfav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";

   $checkfav_qry = mysqli_query($dbconnect, $checkfav_sql);

   if (mysqli_num_rows($checkfav_qry)>0) {

       $sql = "DELETE FROM `favprod` WHERE `favprod`.`userID` = $userID AND `favprod`.`productID` = $productID";

       $qry = mysqli_query($dbconnect, $sql);

     } else {
       // if star has been clicked, and product must be added to favprod
       // insert into favprod
       $sql = "INSERT INTO favprod (userID, productID) VALUES ($userID, $productID)";

       $qry = mysqli_query($dbconnect, $sql);

     }
   }



// select company and product information
// the sql stament that will be run in the data base to obtain the information wanted
$product_sql = "SELECT * FROM products JOIN company ON products.companyID=company.companyID WHERE products.productID = $productID";
// this takes the slq written above to the data base and runs it to obtain the information wanted
$product_qry = mysqli_query($dbconnect, $product_sql);
// this turns the inforamtion retrieved into an assosiative array
$product_aa = mysqli_fetch_assoc($product_qry);

// make company and product information variables
// name
$product_name = $product_aa['productname'];
// company
$company_name = $product_aa['companyname'];
// barcode
$product_barcode = $product_aa['productbarcode'];
// info about product
$blurb = $product_aa['blurb'];

// div surrounding the basic booking information as a link


?><div id="favproduct" style="background-color: white; color:black;">
    <div class="row">
      <div class="col-lg-6 col-md-6">

<!-- product image -->
      <img src="product_images/<?php echo $product_name;?>.png" class="productpageimg" alt="<?php echo $product_name;?> product image">
      </div>



<div class="col-lg-6 col-md-6">
<div class="row">
<div class="col-6 col-xs-12">
  <!-- product name -->
  <h1><?php echo $product_name ?></h2>
  <h2><?php echo $company_name ?></h3>
  <p style="font-size: 20px;"><?php echo $product_barcode ?></p>
</div>

<div class="col-lg-6 col-xs-12" style="text-align:center;">
  <!-- favourite product button -->
  <!-- if user is logged in, display so starinsertprod will action when clicked -->
  <?php
  if (isset($_SESSION['userID'])) {
    ?>
<button class="btn green_button" onclick="starinsertprod(<?php echo $productID; ?>, <?php echo $userID; ?>">
<p>add prodcut to favourites</p>
  <!-- only show star if logged in -->
  <?php

    // makes array of fav products
    $fav_sql = "SELECT * FROM favprod WHERE userID=$userID AND productID=$productID";
    $fav_qry = mysqli_query($dbconnect, $fav_sql);


      ?>
      <!-- if star in fav array, display as checked, if not display as empty -->
        <input class="star" type="checkbox" style="margin-left:auto; margin-right:auto;" value="<?php echo $productID; ?>" title="bookmark page" <?php if (mysqli_num_rows($fav_qry)>0) {echo "checked";}?> onclick="starinsertprod(this.value, <?php echo $userID; ?>)"><br/><br/>

<?php
// if user is not logged in, star button is link to login page
   }else {
     ?>
     <a href="index.php?page=login">
       <button class="btn green_button">
     <p>add prodcut to favourites</p>
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
<!-- displays all certificates -->
  <?php
// select all certs that apply to this product
       $cert_sql = "SELECT * FROM productcert JOIN products ON products.productID=productcert.productID JOIN cert ON cert.certID=productcert.certID WHERE products.productID LIKE '$productID';";
       $cert_qry = mysqli_query($dbconnect, $cert_sql);
       // if none are found
       if(mysqli_num_rows($cert_qry)==0) {
         // no results error message
           echo "<p>No certificates found</p>";
         } else {

       $cert_aa = mysqli_fetch_assoc($cert_qry);
       ?>
       <div style="margin:0px;" class="row">
         <?php
         // for each cert, display as logo
       do {
       $cert = $cert_aa['logo'];
       $certID = $cert_aa['certID'];?>

       <a href="index.php?page=certificates&cert=<?php echo $certID;?>#<?php echo $certID;?>">
       <img style="margin-left: auto; margin-right: auto; max-height: 75px; width: auto;" src="logos/<?php echo $cert;?>" alt="<?php echo $cert;?> image logo">
       </a>
       
      <?php } while($cert_aa = mysqli_fetch_assoc($cert_qry));
       ?></div><?php
       }
          ?>












       </div>
       </div>
  </div>

</div>
<!-- // booking link div ends -->
