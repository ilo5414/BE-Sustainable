<?php
include("navbar.php");
?>
<div class="row">
<!-- <iframe id="printf" name="printf" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" title="barcode scanner" allow="geolocation; microphone; camera" width="100%" height="500" frameborder="0"></iframe> -->
</div>


<!-- <iframe id="frame" src="https://zxing-ngx-scanner-mbkcv7.stackblitz.io" style="border: none; height: 350px; width: 100%"></iframe> -->

<script type="text/javascript">
window.addEventListener('message', receiveMessage, false);
function receiveMessage(event) {
          alert("got message: " + event.data);
      }

      $.receiveMessage(
        function(e){
          alert( e.data );
        },
        'https://angular-ivy-ukvmzn.stackblitz.io/'
      );
      $.receiveMessage(
    function(event){
        alert("event.data: "+event.data);
                $("#testresults").append('<h1>'+event.data+'<h1>');

    },
    'https://angular-ivy-ukvmzn.stackblitz.io/ OR SOMETHING'

);
</script>



<h1>I am the main page</h1>
		<iframe id="iframe" src="https://angular-ivy-ukvmzn.stackblitz.io/" height="600" width="800">
		</iframe>






<?php include("display.php"); ?>
