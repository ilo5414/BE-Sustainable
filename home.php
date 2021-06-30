

<div class="container-fluid" id="homepage_himg">

  <?php include("navbar.php"); ?>


<div class="jumbotron"  >


<div class="row">



  <!-- page displays food tiems -->
  <!-- searh items bar -->
  <form class="form-inline my-2 my-lg-0"  method="POST" action="index.php?page=searchresults">
    <div class="form-group">
    <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </div>
  </form>
  <!-- dropdown -->
  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      produce type
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" value=>
      <a class="dropdown-item" href='index.php?page=home&type_name=all'> All </a>
      <?php
      $type_sql = "SELECT * FROM type";
      $type_qry = mysqli_query($dbconnect, $type_sql);
      $type_aa = mysqli_fetch_assoc($type_qry);
      do {
      $type_name = $type_aa['typename'];?>
      <a class="dropdown-item" href='index.php?page=home&type_name=<?php echo ("$type_name");?>'> <?php echo "$type_name";?> </a>
    <?php } while($type_aa = mysqli_fetch_assoc($type_qry));

    ?>
    </div>
  </div>
  </div>

  <!-- display food items -->
  <div class="display">
    <?php
  // type name is in html request
    if (isset($_GET['type_name'])) {
      $type_name = $_GET['type_name'];
    } else {
      $type_name = 'all';
    }
  echo "displaying $type_name";
  if ($type_name=="all"){
    $displaycondition = "";
  }else{
    $displaycondition = "JOIN type ON type.typeID = products.typeID WHERE typename = '$type_name'";
  }
$prodcolno = 3;
$sendingpage = "home&type_name=$type_name";
     include("display.php");
?>


</div>

</div>
<!-- end of container-fluid -->
