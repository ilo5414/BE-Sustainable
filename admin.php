
<script type="text/javascript">
function starinsert(certID, certcolno, call, userID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("favstar").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","certcard.php?removal=1&userID="+userID+"&certcolno="+certcolno+"&call="+call+"&certID="+certID,true);
    xmlhttp.send();
    }


</script>



<div class="container-fluid" id="homepage_himg">


  <?php include("navbar.php"); ?>





  <?php

  if(!isset($_SESSION['admin'])) {
    header("location: index.php?page=login");
  }
  else {

?>

<div class="jumbotron"  >


<div class="row">

  <div class="col-12">

  <h1>Welcome <?php echo $username; ?></h1>
  <p><a href = "index.php?page=logout">logout</a></p>

  </div>

</div>
<!-- end of row 1 -->

<div class="row">
  <div class="column col-6">
    <h1>Favourite products</h1>
<?php
    $lgnum = 6;
    $mdnum = 12;
// $displaycondition = "JOIN type ON type.typeID = products.typeID WHERE typename = '$type_name'";
   $displaycondition = "JOIN favprod ON favprod.productID = products.productID WHERE userID=$userID";

   include ("display.php");


   ?>



   <style>
    .card {
      font-size: 10px;
    }

    .card h1 {
      font-size: 20px;
    }

   </style>



  </div>

  <div class="column col-6"  >
    <h1>Favourite certificates</h1>

     <?php

$certcolno = 6;
     $call = "JOIN favcert ON favcert.certID = cert.certID WHERE userID=$userID";
    include ("certcard.php"); ?>

  </div>
</div>

</div>
</div>
</div>
<!-- end of container-fluid -->


<?php

}

 ?>
