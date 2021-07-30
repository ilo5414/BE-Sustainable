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
<div class="row">
<!-- <iframe id="printf" name="printf" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" title="barcode scanner" allow="geolocation; microphone; camera" width="100%" height="500" frameborder="0"></iframe> -->
</div>


<!-- <iframe id="frame" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" style="border: none; height: 350px; width: 100%"></iframe> -->

<script type="text/javascript">
window.addEventListener('iframe_message', function(e) {
var url = e.detail.url
window.open(url, '_blank')
}, false);
</script>

<hello data="{{event.data}}"></hello>

<!-- page displays food tiems -->
<!-- <div class="row d-flex justify-content-center" style="margin-bottom:0px;"> -->
<form class="form-inline my-2 my-lg-0 justify-content-center"  method="POST" action="index.php?page=searchresults">
	<div class="form-group">
	<input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search" onkeyup="showResult(this.value)">

	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</div>
</form>
  <div class="justify-content-center" style="margin-left:auto; margin-right: auto; width:48%;" id="livesearch"></div>

<?php
$prodcolno=3;
$displaycondition = "";
include("display.php"); ?>

<h1>I am the main page</h1>
		<iframe id="iframe" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io/" height="600" width="800">
		</iframe>
