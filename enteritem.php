<!-- form to enter new item -->

<script type="text/javascript">
  function companyautofill(str, barcode) {
    if (barcode === undefined) {
    barcode = "";
  }
  var x = document.getElementById("companyname").value;
  document.getElementById("livebox").innerHTML = x;

    if (str.length==0) {
      document.getElementById("livebox").innerHTML="";
      document.getElementById("livebox").style.border="0px";
      return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livebox").innerHTML=this.responseText;
        document.getElementById("livebox").style.border="1px solid #A5ACB2";
      }
    }
    var displaycondition = "WHERE company.companyname LIKE '%"+str+"%'";
    xmlhttp.open("GET","companyautofill.php?displaycondition="+displaycondition+"&barcode="+barcode+"&prodcolno=2",true);
    xmlhttp.send();
  }
</script>



<?php

include("navbar.php");

if (isset($_GET['barcode'])) {
  $x=$_GET['barcode'];
  $barcode=(int)$x;
}
if (isset($_GET['company_name'])) {
  $x=$_GET['company_no'];
  $company_no=(int)$x;
  $company_name=$_GET['company_name'];
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

  <!-- company name -->

  <p>company name</p>

  <div class="form-group">
    <?php if (isset($company_name)){ ?>
      <input type=radio value="<?php echo $company_no ?>" name="company_option" checked required>
      <label class="form-check-label" ><?php echo $company_no ?>  <?php echo $company_name;?></label>
    <?}else {?>
    <input class="form-control" required type="text" id="companyname" placeholder="company name" onkeyup="companyautofill(this.value, <?php if (isset($barcode)) { echo $barcode;} ?>)">
<?php }?>
  </div>
<div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:100%;" id="livebox"></div>
  <!-- <?php
  // select all certs
  // $companyinput_sql="SELECT * FROM company";
  // $companyinput_qry=mysqli_query($dbconnect, $companyinput_sql);
  // $companyinput_aa = mysqli_fetch_assoc($companyinput_qry);
  // $n = 0;
  //
  // do {
  //   $company = $companyinput_aa['companyname'];
  //   $n = $n+1;
  ?>
</div>
  <div class="form-check form-check-inline">
  <input type=radio value="<?php //echo "$n"?>" name="company_option" required>
  <label class="form-check-label" for=<?php //echo "radio$n";?>><?php //echo $company;?></label>
</div>

<br>
<?php
// } while($companyinput_aa = mysqli_fetch_assoc($companyinput_qry));
?>
</select>
</div> -->


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
