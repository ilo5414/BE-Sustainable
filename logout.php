<!-- This is the logout page -->

  <?php
// this ends the session
  // unset($_SESSION['admin']);
  session_destroy();
  ?>
<!-- displays that the user has been logged out -->
  <div class="alert alert-primary" role="alert">
  You have logged out
</div>
<?php
// this sends the user back to the previous page they were on
header('Location: ' . $_SERVER['HTTP_REFERER']); ?>
