
<?php
session_start()
if(!isset($_SESSION['admin'])) {
  header("location: index.php");
}


 ?>




<h1>Welcome User xxxx</h1>
<p><a href = "index.php?page=logout">logout</a></p>
