<?php
// inserts new item into database
$name = $_POST['item_name'];
if (isset($_POST['item_code'])){
  $code = $_POST['item_code'];
} elseif (isset($_GET['item_code'])) {
  $code = $_POST['item_code'];
}else {
  header('Location: index.php?page=enteritem&error=No_or_invalid_barcode_entered');
}
$type = $_POST['item_type'];
$company_name = $_POST['company_option'];



// check that the barcode or name is not already in database
$result_sql = "SELECT * FROM products WHERE productbarcode LIKE '$code' OR productname LIKE '$name'";
$result_qry = mysqli_query($dbconnect, $result_sql);
$result_qry = mysqli_query($dbconnect, $result_sql);
if(mysqli_num_rows($result_qry)!=0) {
  // if barcode/name has a copy
  // go to enter item and show error
    echo "<h1>duplicates of item code</h1>";
    header('Location: index.php?page=enteritem&error=Name_Or_Code_Duplicate');
  } else {
// if no duplicates
// upload image to file

   $target_dir = "product_images/";
   $newfilename= "$name.jpg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["tmp_name"]);
   $uploadOk = 1;
   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// add image
// Check if image file is a actual image or fake image
   if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
     if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
     } else {
       echo "File is not an image.";
       $uploadOk = 0;
     }
   }

   // Check if file already exists
   if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
   }

   // Check file size
   if ($_FILES["fileToUpload"]["size"] > 500000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
   }

   // Allow certain file formats
   if($imageFileType == "jpg" && $imageFileType == "png" && $imageFileType == "jpeg"
   && $imageFileType == "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }

   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
   // if everything is ok, try to upload file
   } else {
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["tmp_name"])). " has been uploaded.";
     } else {
       echo "Sorry, there was an error uploading your file.";
     }
   }
// end inset image




// add certs to productcert

// find inserted product productID
   $ID_sql = "SELECT productID FROM products WHERE productname LIKE '$name';";
   $ID_qry = mysqli_query($dbconnect, $ID_sql);


   // select all certs
   $certinput_sql="SELECT * FROM cert";
   $certinput_qry=mysqli_query($dbconnect, $certinput_sql);
   $certinput_aa = mysqli_fetch_assoc($certinput_qry);

       $ID_aa = mysqli_fetch_assoc($ID_qry);
       $productID = $ID_aa["productID"];


   // insert productID and certID into productcert for all checkboxes ticked
   $n = 0;
   do {
     $ID_aa = mysqli_fetch_assoc($ID_qry);
      $productID = $ID_aa["productID"];
      $n=$n+1;
     if(isset($_POST["option$n"])){
       // add to table if no duplicates
       $insertsql = "INSERT INTO `productcert` (`ID`, `productID`, `certID`) VALUES (NULL, '$productID', '$n');";

         if ($dbconnect->query($insertsql) === TRUE) {
           echo "cert insert succesful";
         } else {
           echo "Error: " . $sql . "<br>" . $dbconnect->error;
         }
     }
     else{
         echo "no cert detected.";
         header('Location: index.php?page=enteritem&error=Please_select_a_cert');
     }
   } while($certinput_aa = mysqli_fetch_assoc($certinput_qry));;


   // end add cert

// add product
// add to table if no duplicates
$sql = "INSERT INTO products (productname, productbarcode, typeID, companyID)
VALUES ('$name', '$code', '$type', '$company_name')";

  if ($dbconnect->query($sql) == TRUE AND move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename )) {
//if insert succesful, go to homepage
    header("Location: index.php?page=home&n=$company_name");

  } else {
    echo "Error: " . $sql . "<br>" . $dbconnect->error;
  }

}
echo "test";
echo "$type";
