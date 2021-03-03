

  <div class="col-6">
    <!-- item div -->
    <div class="">
    <p class="lead">browse products</p>
    <?php
    // selects search query from database
      $product_sql = "SELECT * FROM `products` WHERE `products`.`certID`= 1;";

      $product_qry = mysqli_query($dbconnect, $product_sql);

      if(mysqli_num_rows($product_qry)==0) {
        // no products error message
          echo "<h1>No products found</h1>";
        } else {
          $product_aa = mysqli_fetch_assoc($product_qry);
    // displays product name, photo
    ?>
    <!-- all products are in a row -->
    <div class="row">
    <?php
          do {
            $name = $product_aa['name'];
            $barcode = $product_aa['barcode'];
            $image = $product_aa['image'];
            ?>

    <!-- student card -->
            <div class="card col-4 bg-success" style="">
              <!-- img -->
              <img class="card-img-top" src="uploads/<?php echo $name; ?>.jpg" alt="<?php echo $image; ?>">
              <div class="card-body">
                <!-- name -->
                <h5 class="card-title"><?php echo "$name $barcode"; ?></h5>

              </div>
            </div>
          <?php
            } while ($product_aa = mysqli_fetch_assoc($product_qry));
    ?></div><?php

      }

     ?>
   </div>
     <!-- add item div -->
     <div class="">
       <?php include "enteritem.php"; ?>
     </div>
  </div>
