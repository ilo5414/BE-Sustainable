<?php

if(isset($_SESSION['username'])) {

  $username = $_SESSION['username'];
  $userID = $_SESSION['userID'];
}

else {
}?>

<!-- navbar -->

<nav class="navbar navbar-light">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php?page=home"><img src="images/white_logo.png" style="height:200px" alt=""></a>


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
        <p><a class="nav-link" href = "index.php?page=logout">logout <?php echo $username; ?> ?</a></p>
      <?php }else { ?>
        <p><a class="nav-link" href = "index.php?page=login">login </a></p>
    <?php  } ?>
      <!-- </li> -->
    </ul>
  </div>
</nav>
