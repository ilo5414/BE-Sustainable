<?php

  $search = $_POST['search'];
  ?> <h1> search results for "<?php echo "$search"; ?> " </h1> <?php
// selects search query from database
  $result_sql = "SELECT * FROM cert JOIN products ON products.certID=cert.certID WHERE products.name LIKE '%$search%' OR products.barcode LIKE '%$search%' OR cert.name LIKE '%$search%';";

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
        $name = $result_aa['name'];
        $barcode = $result_aa['barcode'];
        $cert = $result_aa['certID'];
        ?>

<!-- student card -->
        <div class="card col-2" style="color:black;">
          <!-- img -->
          <img class="card-img-top" src="uploads/<?php echo $name; ?>.jpg" alt="<?php echo $name; ?>.jpg">
          <div class="card-body">
            <!-- name -->
            <h5 class="card-title"><?php echo "$name $barcode $cert"; ?></h5>

          </div>
        </div>
      <?php
        } while ($result_aa = mysqli_fetch_assoc($result_qry));
?></div><?php

  }

 ?>
