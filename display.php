
<!-- this page displays products  -->



<!-- add favourited items to table -->
<!-- x -->
<?php

if (isset($_POST['productID'])) {

$productID = $_POST['productID'];
$userID = $_POST['userID'];
$checked = $_POST['starcheck'];

if ($checked=='FALSE') {


    // inserts into database
      $sql = "INSERT INTO favprod (userID, productID)
      VALUES ($userID, $productID)";

      if ($dbconnect->query($sql) == TRUE) {
    //if insert succesful, go to homepage
        header("Location: index.php?page=$sendingpage");

      } else {
        echo "Error: " . $sql . "<br>" . $dbconnect->error;
      }
}elseif ($checked=='TRUE'){
  // inserts into database
    $sql = "DELETE FROM `favprod` WHERE `favprod`.`userID` = $userID AND `favcert`.`productID` = $productID";

    if ($dbconnect->query($sql) == TRUE) {
  //if insert succesful, go to homepage
      header("Location: index.php?page=$sendingpage");

    } else {
      echo "Error: " . $sql . "<br>" . $dbconnect->error;
    }
}
}?>
<!-- x -->
<!-- add favprods to table ends -->


<?php

  $result_sql = "SELECT * FROM products $displaycondition";


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

          <div class="card col-<?php echo $prodcolno?>" style="color:black;">
            <a href="index.php?page=productpage&productID=<?php echo "$productID"; ?>">
            <!-- img -->
            <img class="card-img-top" src="uploads/<?php echo $name; ?>.jpg" alt="<?php echo $name; ?>.jpg">
            <div class="card-body">
              <!-- name -->
              <h5 class="card-title"><?php echo "$name $barcode"; ?></h5>

              <!-- star rating -->

              <form id="starform" action="index.php?page=<?php echo $sendingpage; ?>" method="post">
                      <input type="hidden" name='productID' value='<?php echo "$productID";?>'/>
                      <input type='hidden' name='userID' value='<?php echo "$userID";?>'/>

                      <!-- only show star if logged in -->
                      <?php
                      if (isset($_SESSION['userID'])) {

                        // makes array of fav certs
                        $fav_sql = "SELECT * FROM favprod WHERE userID=$userID";
                        $fav_qry = mysqli_query($dbconnect, $fav_sql);
                        $fav_aa = mysqli_fetch_assoc($fav_qry);
                        $favproductIDarray= array();
                        do {
                          $favproductID = $fav_aa['productID'];
                          array_push($favproductIDarray, "$favproductID");
                        } while ($fav_aa = mysqli_fetch_assoc($fav_qry));
                        ?>
                        <!-- star -->

                        <input type="checkbox"  class="" id="star" name="star" onChange="this.form.submit();" />

                           <?php if (in_array("$productID",$favproductIDarray)) {
                             // delete from favcert if already checked
                             ?>
                             <input type="hidden" name='starcheck' value='TRUE'/>
                            <div class="star">
                              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                              </svg>
                            </div>

                            <?php
                            // add to favcert if not checked
                           } else{

                             ?>
                             <input type="hidden" name='starcheck' value='FALSE'/>
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg><?php
                           }?>


                         </label>


                         <?php
                       }

                           ?>
                           <!-- star ends  -->

                   </form>

              <!-- certificates -->
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
        <!-- cert end -->


            </div>
            </a>
          </div>

        <?php
          } while ($result_aa = mysqli_fetch_assoc($result_qry));
  ?></div><?php

    }

   ?>
