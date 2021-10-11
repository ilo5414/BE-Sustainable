<!-- this page is the navbar -->

<script>
// if user logs out, alert shows
// impliments the logout function
function logout() {

  alert("You have logged out");
}
</script>

<?php
// This sees if there is a user logged in
if(isset($_SESSION['username'])) {

  $username = $_SESSION['username'];
  $userID = $_SESSION['userID'];
}

else {
}?>

<!-- navbar -->

<nav class="navbar navbar-dark">

<!--   this holds the navbar logo in the top left hand corner and makes it a link to the home page -->
  <a class="navbar-brand" href="index.php?page=home"  overflow: hidden;"><img src="images/white_logo.png" style="height: 100%; " alt="Besustainable logo"></a>



  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" >
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
<!-- this shows all the nav bar links in a drop down menu which is situated on the right hand side of the page -->
                             
  <div class="dropdown-menu dropdown-menu-right" id="collapsibleNavbar">
    <ul class="dropdown ">
                   
      <!-- only show admin link if logged in -->
      <?php if (isset($_SESSION['userID'])) { ?>
        <a class="nav-link" href="index.php?page=admin">Account</a>
      <?php } ?>

        <a class="nav-link" href="index.php?page=barcodereader">Find products</a>

        <a class="nav-link" href="index.php?page=certificates">Product certificates</a>

        <a class="nav-link" href="index.php?page=aboutus">About us</a>

        <a class="nav-link" href="index.php?page=enteritem">Enter item</a>
        <!-- logout button visible only if logged in -->
        <?php if (isset($_SESSION['userID'])) { ?>
                                                           
<!-- logout link -->
        <a class="nav-link" onclick="logout()" href = "index.php?page=logout">Logout <?php echo $username;?>?</a>

<!--  if not logged in then, the login link is visible -->
      <?php }else { ?>
        <a  class="nav-link" href = "index.php?page=login">Login </a>

    <?php  } ?>
      <!-- </li> -->
    </ul>
<!--  end of drop down nav                                  -->
  </div>
<!--   end of navbar div -->

</nav>
<!--   end of navbar tag-->
