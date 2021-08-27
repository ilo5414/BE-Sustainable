<?php
include 'dbconnect.php';
$n=0;


if (isset($_GET['displaycondition'])) {
  $displaycondition = $_GET['displaycondition'];
}
if (isset($_GET['barcode'])) {
  $barcode = $_GET['barcode'];
}

?>

<p>working <?php echo $barcode; ?></p>

<?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $product_sql = "SELECT * FROM company $displaycondition";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $product_qry = mysqli_query($dbconnect, $product_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $product_aa = mysqli_fetch_assoc($product_qry);


 // do while loop taking the information from the array and turning it into variables
if (mysqli_num_rows($product_qry)>0) {
 do {
   $company_name = $product_aa['companyname'];
   $company_ID = $product_aa['companyID'];
 // div surrounding the basic booking information as a link

   ?><a style="width:100%;" href="index.php?page=enteritem&barcode=<?php echo $barcode ?>&company_name=<?php echo $company_name ?>&company_no=<?php echo $company_ID ?>">
   <div class="row"  style="background-color:white; color:black; margin:0px; width:100%;">


<div class="">


     <p><?php echo $company_ID ?>   <?php echo $company_name ?></p>

</div>

</div>
</a>


   <!-- // booking link div ends -->

<?php
 // the while statement for the loop
} while ($product_aa = mysqli_fetch_assoc($product_qry) and $n<3);
}else {
  echo "No results";
  echo $displaycondition;
}

  ?>
