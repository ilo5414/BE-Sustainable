<?php
// inserts new item into database
$name = $_POST['item_name'];
$code = $_POST['item_code'];
$cert = $_POST['item_cert'];

$result_sql = "SELECT * FROM products WHERE barcode LIKE '$code'";





$result_sql = "SELECT * FROM products WHERE productbarcode LIKE '$code'";

$result_qry = mysqli_query($dbconnect, $result_sql);

@ -18,7 +22,7 @@ if(mysqli_num_rows($result_qry)!=0) {

   $target_dir = "uploads/";
   $newfilename= "$name.jpg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["$newfilename"]);
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

@ -68,14 +72,58 @@ if(mysqli_num_rows($result_qry)!=0) {


 // add to table if no duplicates
 $sql = "INSERT INTO products (name, barcode, certID, image)
 VALUES ('$name', '$code', '$cert', '$name.jpg')";
 $sql = "INSERT INTO products (productname, productbarcode, image)
 VALUES ('$name', '$code', '$name.jpg')";

   if ($dbconnect->query($sql) === TRUE && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename)) {
     header('Location: index.php?page=home');

   } else {
     echo "Error: " . $sql . "<br>" . $dbconnect->error;
   }


 }
// add cert

// find inserted product productID
   $result_sql = "SELECT productID FROM products WHERE productname LIKE '$name';";
   $result_qry = mysqli_query($dbconnect, $result_sql);


   // select all certs
   $certinput_sql="SELECT * FROM cert";
   $certinput_qry=mysqli_query($dbconnect, $certinput_sql);
   $certinput_aa = mysqli_fetch_assoc($certinput_qry);
   if(mysqli_num_rows($result_qry)==0) {
     // no results error message

     } else {
       $result_aa = mysqli_fetch_assoc($result_qry);
       $productID = $result_aa["productID"];


   // insert productID and certID into productcert for all checkboxes ticked
   $n = 0;
   do {
     if(isset($_POST["option$n"]) &&
        $_POST["option$n"] == "option$n")
     {
       // add to table if no duplicates
       $insertsql = "INSERT INTO productcert (productID, certID,)
       VALUES ('$productID', '$n')";

         if ($dbconnect->query($insertsql) === TRUE) {
           header('Location: index.php?page=home');
         } else {
           echo "Error: " . $sql . "<br>" . $dbconnect->error;
         }
     }
     else{
         echo "Do not Need wheelchair access.";
     }
   } while($certinput_aa = mysqli_fetch_assoc($certinput_qry));;

}
   // end add cert


}
