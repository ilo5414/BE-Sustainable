<!-- This is the verify page -->
<!-- this page checks if the username and password inputted on the login
      page is correct or not and directs them to the next appropriate page -->

<?php
// Creates a session or resumes the current one based on a session identifiers
// (password & username) passed via a POST request.
// turing the username and password inputted and recieved through the post array
// into variables
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

// this set of sql uses the username variable to pull out the information in
// the database about that username (if there is any)
  $verify_sql = "SELECT * FROM user WHERE username = '$username'";
  $verify_qry = mysqli_query($dbconnect, $verify_sql);
  $verify_aa = mysqli_fetch_assoc($verify_qry);

// this then checks to see if the password inputted matches that hashed password
// in the database
  $hash = $verify_aa['password'];
  $userID = $verify_aa['userID'];
  echo $hash;
  echo $verify_sql;

// if the password matches, the user will be redirected to their admin page
  if (password_verify($password, $hash)) {
    $_SESSION['admin'] = "$username";
    header("location: index.php?page=admin");
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username; // $username coming from the form, such as $_POST['username']
                                       // something like this is optional, of course

    $_SESSION['userID'] = $userID;

// if the password doesn't match then they will be redirected back to the login page
// with an error message
  } else {
    header("location: index.php?page=login&error=error  ");



  }


 ?>
