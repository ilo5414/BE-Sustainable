<?php

  $search = $_POST['search'];
  ?> <h1> search results for "<?php echo "$search"; ?> " </h1> <?php
// selects search query from database
  $result_sql = "SELECT * FROM products WHERE products.productname LIKE '%$search%' OR products.productbarcode LIKE '%$search%';";
  $result_qry = mysqli_query($dbconnect, $result_sql);

  if(mysqli_num_rows($result_qry)==0) {
    // no results error message
      echo "<h1>No results found</h1>";
    } else {
      $result_aa = mysqli_fetch_assoc($result_qry);

// displays result name, photo
?>
<!-- all results are in a row -->
<div class="row">
<?php
      do {
        $productID = $result_aa["productID"];
        $name = $result_aa['productname'];
        $barcode = $result_aa['productbarcode'];
        ?>

<!-- student card -->
        <div class="card col-2" style="color:black;">
          <!-- img -->
          <img class="card-img-top" src="uploads/<?php echo $name; ?>.jpg" alt="<?php echo $name; ?>.jpg">
          <div class="card-body">
            <!-- name -->
            <h5 class="card-title"><?php echo "$name $barcode"; ?></h5>
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
          </div>
        </div>
      <?php
        } while ($result_aa = mysqli_fetch_assoc($result_qry));
?></div><?php

  }

 ?>
