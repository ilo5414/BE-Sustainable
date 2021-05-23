<?php
include("navbar.php");
?>
<div class="row">
<!-- <iframe id="printf" name="printf" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" title="barcode scanner" allow="geolocation; microphone; camera" width="100%" height="500" frameborder="0"></iframe> -->
</div>
<!-- <button type="button" onclick="myFunction()">Try it</button>
<h1 id="out"></h1>
<script type="text/javascript">
function myFunction() {
  var myframe = document.getElementById("myFrame");
  var bcode = document.getElementID("barcode");
  document.write("hi");
  document.write(bcode); -->

<!--
}
</script> -->
<script>
document.addEventListener('DOMContentLoaded', function() {
   const messageEle = document.getElementById('message');
   const frameEle = document.getElementById('frame');

   window.addEventListener('message', function(e) {
       const data = JSON.parse(e.data);
       const date = new Date(data.date).toLocaleTimeString('en-US');

       messageEle.innerHTML = `Receive "${data.message}" at ${date}<br>` + messageEle.innerHTML;
   });


});
</script>

<!-- <iframe id="frame" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" style="border: none; height: 350px; width: 100%"></iframe> -->

<h1>I am the main page</h1>
		<iframe id="iframe" src="https://angular-ivy-ukvmzn.stackblitz.io/" height="600" width="800">
		</iframe>


<script>
	window.addEventListener('message', function() {
		alert("Message received");
		console.log("message received");
	}, false);
</script>

   <div style="padding: 1rem">
       <h2>Window</h2>
       <div id="message" style="border: 1px solid #cbd5e0; height: 12rem; margin: .5rem 0; overflow: auto; padding: .5rem"></div>
   </div>



<?php include("display.php"); ?>
