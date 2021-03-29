<?php
// inserts new item into database
$name = $_POST['item_name'];
$code = $_POST['item_code'];

// check that the barcode or name is not already in database
$result_sql = "SELECT * FROM products WHERE productbarcode LIKE '$code' OR productname LIKE '$name'";
$result_qry = mysqli_query($dbconnect, $result_sql);

$result_qry = mysqli_query($dbconnect, $result_sql);

if(mysqli_num_rows($result_qry)!=0) {
    echo "<h1>duplicates of item code</h1>";
    header('Location: index.php?page=home&error=codeduplicate');
  } else {

if(mysqli_num_rows($result_qry)!=0) {

   $target_dir = "uploads/";
   $newfilename= "$name.jpg";
   $target_file = $target_dir . basename($_FILES["fileToUpload"]["$newfilename"]);
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
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }

   // Check if $uploadOk is set to 0 by an error
   if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
   // if everything is ok, try to upload file
   } else {
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file . $newfilename)) {
       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["tmp_name"])). " has been uploaded.";
     } else {
       echo "Sorry, there was an error uploading your file.";
     }
   }
// end inset image

if(mysqli_num_rows($result_qry)!=0) {




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
echo "no errors";
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
}
