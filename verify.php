<!-- This is the verify page -->
<!-- this page checks if the username and password inputted on the login -->
<!-- page is correct or not -->

<?php
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $verify_sql = "SELECT username, password FROM user WHERE username = '$username'";
  $verify_qry = mysqli_query($dbconnect, $verify_sql);
  $verify_aa = mysqli_fetch_assoc($verify_qry);

  $hash = $verify_aa['password'];
  echo $hash;
  echo $verify_sql;

  if (password_verify($password, $hash)) {
    $_SESSION['admin'] = "$username";
    header("location: index.php?page=admin");

  } else {
    // header("location: index.php?page=login&error=error  ");



  }


 ?>
