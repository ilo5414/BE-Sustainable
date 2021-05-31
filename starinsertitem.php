<?php


$certID = $_POST['certID'];
$userID = $_POST['userID'];
echo "$userID";
echo "$certID";



    // inserts into database
      $sql = "INSERT INTO favcert (userID, certID)
      VALUES ($userID, $certID)";

      if ($dbconnect->query($sql) == TRUE) {
    //if insert succesful, go to homepage
        header('Location: index.php?page=certificates');

      } else {
        echo "Error: " . $sql . "<br>" . $dbconnect->error;
      }
  
  ?>
