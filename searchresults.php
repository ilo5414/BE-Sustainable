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


function starinsertprod(productID, prodcolno, displaycondition, userID) {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("favproduct").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","display.php?removal=2&userID="+userID+"&prodcolno="+prodcolno+"&displaycondition="+displaycondition+"&productID="+productID,true);
    xmlhttp.send();
    }
    <?php echo "sent" ?>

</script>

<?php
include("navbar.php");
?>

<?php



  $search = $_POST['search'];
  ?>
<div class="row d-flex justify-content-center" style="margin-bottom:0px;">


  <!-- page displays food tiems -->
  <!-- searh items bar -->
  <form class="form-inline my-2 my-lg-0"  method="POST" action="index.php?page=searchresults">
    <div class="form-group">
    <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)">

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
  <div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:48%;" id="livesearch"></div>

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
$sendingpage = "searchresults&type_name=$type_name";
$displaycondition="WHERE products.productname LIKE '%$search%' OR products.productbarcode LIKE '%$search%' OR company.companyname LIKE '%$search%';";
     include("display.php");
?>


</div>

</div>
<!-- end of container-fluid -->
