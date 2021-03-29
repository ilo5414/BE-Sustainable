<!-- form to enter new item -->

<form action="index.php?page=insertitem" method="post" enctype="multipart/form-data">
  <!-- name -->
  <div class="form-group">
    <label for="exampleFormControlInput1">item name</label>
    <input class="form-control" required type="text" name="item_name" placeholder="item name">
    <!-- barcode -->
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">item name</label>
    <label for="exampleFormControlInput1">item barcode</label>
    <input class="form-control" required type="number" name="item_code" placeholder="item barcode">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Item certificates</label>
    <select multiple class="form-control" required name="item_cert" placeholder="item certification">
      <option>1</option>
    <br>
  <!-- certifications -->
  <p>certifications</p>
  <?php
  // select all certs
  $certinput_sql="SELECT * FROM cert";
  $certinput_qry=mysqli_query($dbconnect, $certinput_sql);
  $certinput_aa = mysqli_fetch_assoc($certinput_qry);
  $n = 0;

    </select>
  </div>
  do {
    $cert = $certinput_aa['certname'];
    $n = $n+1;
  ?>
</div>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" value="<?php echo "option$n"?>" name="<?php echo "option$n";?>">
  <label class="form-check-label" for=<?php echo "checkbox$n";?>><?php echo $cert;?></label>
</div>
<br>
<?php } while($certinput_aa = mysqli_fetch_assoc($certinput_qry));
?>

<!-- upload logo as img -->
<br>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <label for="exampleFormControlFile1">upload logo</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="submit_button">Submit</button>
