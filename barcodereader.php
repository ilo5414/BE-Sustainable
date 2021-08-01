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
			var displaycondition = "WHERE productname LIKE '%"+str+"%' OR productbarcode LIKE '%"+str+"%'"
			xmlhttp.open("GET","livesearch.php?displaycondition="+displaycondition+"&prodcolno=2",true);
			xmlhttp.send();
		}



</script>
<?php
$scannedbarcode = $_GET['barcode'];


include("navbar.php");
?>
<?php if (isset($scannedbarcode = $_GET['barcode'];)):
	  header("location: index.php?page=searchresults&search=$scannedbarcode");
}
?>




<!-- page displays food tiems -->
<div class="row d-flex justify-content-center" style="margin-bottom:0px;">
<form class="form-inline my-2 my-lg-0 justify-content-center"  method="POST" action="index.php?page=searchresults">
	<div class="form-group">
	<input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)">

	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</div>
</form>
</div>
  <div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:48%;" id="livesearch"></div>

<?php
$prodcolno=3;
$displaycondition = "";
include("display.php"); ?>
