<?php


$certID = $_POST['certID'];
$userID = $_POST['userID'];
$checked = $_POST['starcheck'];


echo "$userID";
echo "$certID";


if ($checked=='FALSE') {


    // inserts into database
      $sql = "INSERT INTO favcert (userID, certID)
      VALUES ($userID, $certID)";

      if ($dbconnect->query($sql) == TRUE) {
    //if insert succesful, go to homepage
        header("Location: index.php?page=certificates&test='$checked'");

      } else {
        echo "Error: " . $sql . "<br>" . $dbconnect->error;
      }
}elseif ($checked=='TRUE'){
  // inserts into database
    $sql = "DELETE FROM `favcert` WHERE `favcert`.`userID` = $userID AND `favcert`.`certID` = $certID";

    if ($dbconnect->query($sql) == TRUE) {
  //if insert succesful, go to homepage
      header("Location: {$_SERVER['HTTP_REFERER']}");

    } else {
      echo "Error: " . $sql . "<br>" . $dbconnect->error;
    }
}
  ?>
