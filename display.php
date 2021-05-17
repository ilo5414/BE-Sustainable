<!-- page displays food tiems -->
<form class="form-inline my-2 my-lg-0"  method="POST" action="index.php?page=searchresults">
  <div class="form-group">
  <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</div>
</form>
<!-- dropdown -->
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    produce type
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <?php
    $type_sql = "SELECT * FROM type";
    $type_qry = mysqli_query($dbconnect, $type_sql);
    $type_aa = mysqli_fetch_assoc($type_qry);
    do {
    $type_name = $type_aa['typename'];?>
    <a class="dropdown-item" href='index.php?page=home&type_name=<?php echo ("$type_name");?>'> <?php echo "$type_name";?> </a>
  <?php } while($type_aa = mysqli_fetch_assoc($type_qry));?>
  </div>
</div>
</div>

<!-- display food items -->
<div class="display">
  <?php
// type name is in html request
  if (isset($_GET['type_name'])) {
    $type_name = $_GET['type_name'];
  } else {
    $type_name = 'meat/seafood';
  }
echo "displaying $type_name";
  $result_sql = "SELECT * FROM products JOIN type ON type.typeID = products.typeID WHERE typename = '$type_name'";


    // selects search query from database

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

          <div class="card col-3" style="color:black;">
            <a href="index.php?page=productpage&productID=<?php echo "$productID"; ?>">
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
            </a>
          </div>

        <?php
          } while ($result_aa = mysqli_fetch_assoc($result_qry));
  ?></div><?php

    }

   ?>

</div>
