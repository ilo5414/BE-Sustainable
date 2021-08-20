<script type="text/javascript">
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  var displaycondition = "WHERE products.productname LIKE '%"+str+"%' OR products.productbarcode LIKE '%"+str+"%' OR company.companyname LIKE '%"+str+"%'";
  xmlhttp.open("GET","livesearch.php?displaycondition="+displaycondition+"&prodcolno=2",true);
  xmlhttp.send();
}




</script>

<?php
include("navbar.php");
?>

<?php



  $search = $_POST['search'];
  ?>
<div class="row d-flex justify-content-center" style="margin-bottom:0px; margin-left:0px;">


  <!-- page displays food tiems -->

  <!-- searh items bar -->
  <form class="form-inline col-8"  method="POST" action="index.php?page=searchresults">
    <div class="form-group row" style="width:100%;">
      <!-- searchbar -->
    <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)" style="width:70%; display:inline-block;">
<!-- searchbutton -->
    <button class="btn btn-outline-success" type="submit" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
  </div>
  </form>
<!-- searchbar ends -->


  <!-- dropdown -->
  <div class="dropdown prod-dropdown col-4" style="text-align:right;">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <p class="small-hide">produce type</p>
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
<!-- dropdown ends -->

  </div>

  <!-- livesearch box -->
  <div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:100%;" id="livesearch"></div>
  <!-- livesearch box  ends-->

  <h1> search results for "<?php echo "$search"; ?>"</h1> <?php


// selects search query from database
  $result_sql = "SELECT * FROM products WHERE products.productname LIKE '%$search%' OR products.productbarcode LIKE '%$search%';";
  $result_qry = mysqli_query($dbconnect, $result_sql);
?>
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
// $sendingpage = "searchresults&type_name=$type_name";
$displaycondition="WHERE products.productname LIKE '%$search%' OR products.productbarcode LIKE '%$search%' OR company.companyname LIKE '%$search%';";
     include("display.php");
?>


</div>

</div>
<!-- end of container-fluid -->
