<?php
include("navbar.php");
?>

<?php
$productID = $_GET['productID'];


$result_sql = "SELECT * FROM products WHERE products.productID LIKE '$productID'";
$result_qry = mysqli_query($dbconnect, $result_sql);
$result_aa = mysqli_fetch_assoc($result_qry);


// this is putting all the content the code is going to use into variables
  $name = $result_aa['productname'];
  $image = $result_aa['image'];
  // $description = $result_aa['description'];
  $barcode = $result_aa['productbarcode'];


?>


<div class='bigbox'>
  <!-- this displays an image of the artwork -->
  <div class="bigimgbox"><img src='uploads/<?php echo $image?>' class='bigimage' alt='<?php echo $name?> image'></div>

<!-- the image and the info are side by side
so they are in different divs-->
  <div class="biginfo">
    <!-- displays art name -->
    <div class="name"><?php echo $name;?></div>
    <br>
    <br>
    <!-- this link leads to the artist of the paintings artist.php page -->
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
    <br>
    <!-- this displays the description of the artwork -->
    <!-- <div class="description"> <?php echo $description;?></div> -->
  </div>
</div>
?>
