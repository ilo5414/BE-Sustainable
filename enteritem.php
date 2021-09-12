<!-- form to enter new item -->




<?php

include("navbar.php");

if (isset($_GET['barcode'])) {
  $x=$_GET['barcode'];
  $barcode=(int)$x;
}


?>
<h1 class="display-4">enter new item</h1>
<br>

<form action="index.php?page=insertitem" method="post" enctype="multipart/form-data">
  <!-- name -->
  <div class="form-group">
    <label for="exampleFormControlInput1">item name</label>
    <input class="form-control" required type="text" name="item_name" placeholder="item name">
    <!-- barcode -->
  </div>
  <div class="form-group">

    <label for="exampleFormControlInput1">item barcode</label>
    <input class="form-control" required type="number" name="item_code" value='<?php echo $barcode ?>' placeholder="item barcode">
  </div>


<!-- item blurb -->
<div class="form-group">
  <label for="exampleFormControlInput1">item information</label>
  <textarea class="form-control" name="item_blurb" placeholder="please enter any pertinent information about the product" rows="10" cols="30">
</textarea>
</div>

  <!-- company name -->

  <p>company name</p>
  <script type="text/javascript">
  function companyfilter() {

      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("companysearch");
      filter = input.value.toUpperCase();
      ul = document.getElementById("companyUL");
      li = ul.getElementsByTagName("li");
      for (i = 0; i < li.length; i++) {
          a = li[i].getElementsByTagName("a")[0];
          txtValue = a.textContent || a.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "display: block;";
          } else {
              li[i].style.display = "none";
          }
      }
  }

  </script>

<?php $companyinput_sql="SELECT * FROM company";
$companyinput_qry=mysqli_query($dbconnect, $companyinput_sql);
$companyinput_aa = mysqli_fetch_assoc($companyinput_qry); ?>
  <div class="form-group" id=companyselect>

    <input class="form-control" type="search" id="companysearch" placeholder="company name" onkeyup="companyfilter()">


<ul id="companyUL">
  <?php
  do {
    $company = $companyinput_aa['companyname'];
    $company_ID = $companyinput_aa['companyID'];

  ?>
<li>
  <input type=radio value="<?php echo $company_ID ?> " name="company_option" required>
  <a class="form-check-label"><?php echo $company;?></a>
</li>

<br>
<?php
 } while($companyinput_aa = mysqli_fetch_assoc($companyinput_qry));
?>
</ul>
</div>
</div>


<br>


  <!-- certifications -->
  <p>certifications</p>
  <?php
  // select all certs
  $certinput_sql="SELECT * FROM cert";
  $certinput_qry=mysqli_query($dbconnect, $certinput_sql);
  $certinput_aa = mysqli_fetch_assoc($certinput_qry);
  $n = 0;

  do {
    $cert = $certinput_aa['certname'];
    $n = $n+1;
  ?>

  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" value="<?php echo "option$n"?>" name="<?php echo "option$n";?>">
  <label class="form-check-label" for=<?php echo "checkbox$n";?>><?php echo $cert;?></label>
</div>
<br>
<?php } while($certinput_aa = mysqli_fetch_assoc($certinput_qry));
?>
</select>
</div>

<!-- type -->
<br>
<br>
<p>type</p>
<?php
// select all type
$typeinput_sql="SELECT * FROM type";
$typeinput_qry=mysqli_query($dbconnect, $typeinput_sql);
$typeinput_aa = mysqli_fetch_assoc($typeinput_qry);

do {
  $type = $typeinput_aa['typeID'];
  $typename = $typeinput_aa['typename'];

?>
<div class="form-group">
  <span></span><label class="form-check-label" for="<?php echo "$type"?>"></label>

    <p>   <input type="radio" value="<?php echo "$type"?>" name="item_type" id="radio" required>    <?php echo $typename;?> </p>

</div>
<?php } while($typeinput_aa = mysqli_fetch_assoc($typeinput_qry));
?>
</select>
</div>

<!-- upload logo as img -->
<br>
  <div class="form-group">

    <label for="exampleFormControlFile1">upload img</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload" required>
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="submit_button">Submit</button>

</form>
<!-- form errorcodes -->
<?php
if (isset($_GET['error'])) {
$error = $_GET['error'];
echo("<div class='alert alert-danger' role='alert'>
    insert error= $error
  </div> ");
} elseif (isset($name)) {
echo("$name, $barcode, $name.jpg");
} else {
echo "";
}
?>
