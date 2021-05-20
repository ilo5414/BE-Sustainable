<?php
$username = $_POST['username'];
$password = $_POST['password'];


$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO user (username, password)
VALUES ('$username', '$hash')";

  if ($dbconnect->query($sql) == TRUE) {
//if insert succesful, go to homepage
    header('Location: index.php?page=home');


  } else {
    echo "Error: " . $sql . "<br>" . $dbconnect->error;
  }



 ?>
