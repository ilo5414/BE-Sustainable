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


<h1>I am the main page</h1>
		<iframe id="iframe" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io/" height="600" width="800">
		</iframe>



		<!-- page displays food tiems -->
	  <form class="form-inline my-2 my-lg-0"  method="POST" action="index.php?page=searchresults">
	    <div class="form-group">
	    <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search">
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	  </div>
	  </form>


<?php include("display.php"); ?>
