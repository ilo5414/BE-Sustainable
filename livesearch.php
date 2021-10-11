<!-- this is the live search page which, contains the fuctionality for the live search function within the search bar -->
<!-- this predicts then displays possible products that is similar to what the user is typing as they search for a product  -->
<?php
include 'dbconnect.php';
$n=0;
if (isset($_GET['displaycondition'])) {
  $displaycondition = $_GET['displaycondition'];
}

if (isset($_GET['productID'])) {
  $productID = $_GET['productID'];
}
?>



<?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $product_sql = "SELECT * FROM products JOIN company ON products.companyID=company.companyID $displaycondition";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $product_qry = mysqli_query($dbconnect, $product_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $product_aa = mysqli_fetch_assoc($product_qry);


 // do while loop taking the information from the array and turning it into variables
if (mysqli_num_rows($product_qry)>0) {
 do {
   $n=$n+1;
   $product_name = $product_aa['productname'];
   $company_name = $product_aa['companyname'];
   $product_barcode = $product_aa['productbarcode'];
   $productID = $product_aa['productID'];

 // div surrounding the basic booking information as a link
// product image
   ?><a style="width:100%;" href="index.php?page=productpage&productID=<?php echo $productID;?>">
   <div class="row"  style="background-color:white; color:black; margin:0px; width:100%;">

   <img style="max-width: 20%; height:100%;" src="product_images/<?php echo $product_name;?>.png" alt="<?php echo $product_name;?> product image">

<div class="">

<!-- product name, company, barcode -->
     <p><?php echo $product_name ?></p>
    <p><?php echo $company_name ?></p>
<p><?php echo $product_barcode ?></p>
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
