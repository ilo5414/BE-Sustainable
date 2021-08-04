<script>
function logout() {

  alert("You have logged out");
}
</script>

<?php

if(isset($_SESSION['username'])) {

  $username = $_SESSION['username'];
  $userID = $_SESSION['userID'];
}

else {
}?>

<!-- navbar -->

<nav class="navbar navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php?page=home" style="max-height:100%;"><img src="images/white_logo.png" style="max-height: 170px; max-width:70%;" alt=""></a>


  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="dropdown-menu dropdown-menu-right" id="collapsibleNavbar">
    <ul class="dropdown ">
      <!-- only show if logged in -->
      <?php if (isset($_SESSION['userID'])) { ?>
        <a class="nav-link" href="index.php?page=admin">Account</a>
      <?php } ?>

        <a class="nav-link" href="index.php?page=barcodereader">Find products</a>

        <a class="nav-link" href="index.php?page=certificates">Product certificates</a>

        <a class="nav-link" href="index.php?page=aboutus">About us</a>

        <a class="nav-link" href="index.php?page=findus">Find us</a>

        <a class="nav-link" href="index.php?page=enteritem">Enter item</a>
        <!-- only show if logged in -->
        <?php if (isset($_SESSION['userID'])) { ?>


        <a class="nav-link" onclick="logout()" href = "index.php?page=logout">Logout <?php echo $username;?>?</a>


      <?php }else { ?>
        <a  class="nav-link" href = "index.php?page=login">Login </a>

    <?php  } ?>
      <!-- </li> -->
    </ul>
  </div>

</nav>
