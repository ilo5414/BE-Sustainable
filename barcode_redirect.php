<!-- this page catches the barcode sent by the app -->
<!-- if the barcode is in the database the user will be sent to its productpage -->
<!-- if it is not in the database the will b directed to the add product page -->

<?php
$barcode= $_GET['barcode']

// the sql stament that will be run in the data base to obtain the information wanted
$product_sql = "SELECT * FROM products WHERE productbarcode LIKE $barcode";

// this takes the slq written above to the data base and runs it to obtain the information wanted
$product_qry = mysqli_query($dbconnect, $product_sql);
// this turns the inforamtion retrieved into an assosiative array
$product_aa = mysqli_fetch_assoc($product_qry);



// if barcode is in database go to productpage
if (mysqli_num_rows($product_qry)>0) {

  $productID=$product_aa['productID'];
  header("index.php?page=productpage&productID=$productID")
// if barcode is not in database go to enteritem and automaticially enter barcode
}else{
  header("index.php?page=enteritem&barcode=$barcode")
}
?>
