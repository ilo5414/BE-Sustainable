
<?php

session_start();
if(!isset($_SESSION['admin'])) {
  header("location: index.php");

}

else {
?>
<h1>Welcome User xxxx</h1>
<p><a href = "index.php?page=logout">logout</a></p>


<?php

}

 ?>
