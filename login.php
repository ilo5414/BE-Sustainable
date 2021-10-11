<!-- this is the login page -->
<!-- here there is a form that allows users to input a username and password
that will be taken to the verify page to see if the input is correct -->

<div class="container-fluid" id="homepage_himg">
<!-- including the navbar -->
  <?php include("navbar.php"); ?>


<div class="jumbotron"  >




<h1>LOGIN</h1>

<!-- login form -->
<!-- username field  -->
  <form class="logform" action="index.php?page=verify" method="post">
    <div class="form-group">
      <label>Username</label>
<!--       input for username -->
        <input type="text" name="username" class="form-control" value="">
    </div>
<!-- password field  -->
    <div class="form-group">
      <label>Password</label>
<!--       input for password which a minimum length of 8 characters -->
      <input type="password" name="password" id="password" class="form-control" minlength="8" required>
    </div>

<!-- button for submitting username and password inputs -->
    <button type="submit" class="btn btn-primary" name="button">Submit</button>

  </form>
<!--   end of form -->

<!-- error catching for wrong username/password -->
<?php if (isset($_GET['error'])) {
//   displaying the problem to the user
  ?><div class="alert alert-warning" role="alert">
    You have entered the wrong username or password.
  </div><?php
} else {
}?>

<!-- link to create new account -->
  <a href="index.php?page=create">Need to create an account?</a>
<!-- </div> -->

</div>
<!-- end of container-fluid -->
