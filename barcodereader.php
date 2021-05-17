<?php
include("navbar.php");
?>
<!-- <iframe src="https://codesandbox.io/embed/barcode-scanner-0ksx3?fontsize=14&hidenavigation=1&theme=dark"
     style="width:100%; height:500px; border:0; border-radius: 4px; overflow:hidden;"
     title="Barcode-Scanner"
     allow="accelerometer; ambient-light-sensor; camera; encrypted-media; geolocation; gyroscope; hid; microphone; midi; payment; usb; vr; xr-spatial-tracking"
     sandbox="allow-forms allow-modals allow-popups allow-presentation allow-same-origin allow-scripts"
   ></iframe> -->
   <!-- <script type="module">
  import dutchconceptsCapacitorBarcodeScanner from 'https://cdn.skypack.dev/@dutchconcepts/capacitor-barcode-scanner';
</script> -->
<iframe src="https://zxing-ngx-scanner.stackblitz.io/" title="barcode scanner" allow="geolocation; microphone; camera" style="min-height"></iframe>
<?php include("display.php"); ?>
