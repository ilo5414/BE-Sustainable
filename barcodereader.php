<?php
include("navbar.php");
?>
<div class="row">
<iframe src="https://zxing-ngx-scanner.stackblitz.io/" title="barcode scanner" allow="geolocation; microphone; camera" width="100%" height="500" frameborder="0"></iframe>
</div>
<button onclick="myFunction()">Click me</button>
<script type="text/javascript">
function myFunction() {
  var iframe = document.getElementByTagName("strong");
  document.write(iframe);
}
</script>
<?php include("display.php"); ?>
