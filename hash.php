<!-- This is the hash page which the username, password and email address of the -->
<!-- user creating an account is inserted into the data base and an account is created -->
<!-- the password is also hashed before inserted into the database -->


<?php
// getting the values inputted in form and turning them into variables
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// This hashes the password
$hash = password_hash($password, PASSWORD_DEFAULT);

// This is the sql that inserted the values into the database
$sql = "INSERT INTO user (username, password, email)
VALUES ('$username', '$hash', '$email')";

//if insert succesful, go to homepage
  if ($dbconnect->query($sql) == TRUE) {
    header('Location: index.php?page=login');

// showing an error if the informaiton wasn't inputted successfullyß
  } else {
    echo "Error: Your account has not been created" ."<br>" . $dbconnect->error;
  }



 ?>
