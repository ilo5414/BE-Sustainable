<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO user (username, password, email)
VALUES ('$username', '$hash', '$email')";

  if ($dbconnect->query($sql) == TRUE) {
//if insert succesful, go to homepage
    header('Location: index.php?page=home');


  } else {
    echo "Error: " . $sql . "<br>" . $dbconnect->error;
  }



 ?>
