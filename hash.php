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

$verify_sql = "SELECT * FROM user WHERE username = '$username'";
$verify_qry = mysqli_query($dbconnect, $verify_sql);
$verify_aa = mysqli_fetch_assoc($verify_qry);
// if name not already in database
if(mysqli_num_rows($verify_qry)==0) {
} else {
  header("location: index.php?page=create&error=error  ");
}
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
