<?php
$barcode= $_GET['barcode']

// the sql stament that will be run in the data base to obtain the information wanted
$product_sql = "SELECT * FROM products WHERE productbarcode LIKE $barcode";

// this takes the slq written above to the data base and runs it to obtain the information wanted
$product_qry = mysqli_query($dbconnect, $product_sql);
// this turns the inforamtion retrieved into an assosiative array
$product_aa = mysqli_fetch_assoc($product_qry);



// if barcode
if (mysqli_num_rows($product_qry)>0) {

  $productID=$product_aa['productID'];
  header("index.php?page=productpage&productID=$productID")
}else{
  header("index.php?page=enteritem&barcode=$barcode")
}
?>
