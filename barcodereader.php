<!-- this page has a search function -->


<!-- this script allows the livesearch to function -->
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



include("navbar.php");
?>
<?php if (isset($_GET['barcode'])){
	$scannedbarcode = $_GET['barcode'];
	  header("location: index.php?page=searchresults&search=$scannedbarcode");
}
?>




<!-- page displays food tiems -->
<form class="form-inline col-12" method="POST" action="index.php?page=searchresults">
	<div class="form-group row" style="justify-content:center; width:100%; padding:10px;">
	<input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)" style="width:70%; ">

	<button class="btn btn-outline-success " type="submit" style="width:25%;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
</div>
</form>
</div>
  <div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:48%;" id="livesearch"></div>

<?php
$prodcolno=3;
$displaycondition = "";
include("display.php"); ?>
