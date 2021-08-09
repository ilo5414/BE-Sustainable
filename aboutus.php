<?php if (isset($xlnum)) {
}else{
  $xlnum = 4;
}
if (isset($lgnum)) {
}else{
  $lgnum = 4;
}

if (isset($mdnum)) {
}else{
  $mdnum = 12;
}
if (isset($smnum)) {
}else{
  $smnum = 6;
} ?>
<div class="container-fluid">
  <div  class="section" id="aboutus_himg">


  <?php include("navbar.php"); ?>


  <div class=" txt_align_center section">
      <h1 class="display-4">About Us!</h1>
      <div class="section">
        <h1 class='display-6'>OUR MISSION</h1>
        <h1 class='display-6'>WHO WE ARE</h1>
      </div>

      <div class="section">
        <p class="lead">
          <a class="btn btn-lg" href="#t1" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
</svg></a>
        </p>
      </div>

  </div>
  <!-- aboutus header ends -->

</div>
<!-- aboutus_img ends -->


  <div class="mission_info" id="t1">
    <div class="section">
      <h1 class='display-6 mission'>OUR MISSION</h1>
      <p>We are students dedicated to making buying everyday products more sustainable easier</p>
    </div>
    <!-- our mission ends -->
<div class="fern_img">
    <div class="row section align-items-center">

        <div class="col-3">
          <h1>Governance</h1>
        </div>
        <!-- col-3 ends -->

        <div class="col-6">
          <div class="logo_div">
            <h1>Environment</h1>
            <img src="images/white_logo.png" style="width:100%;" alt="">
          </div>
          <!-- logo div ends -->
          </div>
          <!-- col-6 ends -->

          <div class="col-3">
            <h1>Social</h1>
          </div>
          <!-- col-3 ends -->
        </div>
        <!-- row section ends -->



      <div class="row sb_cards">
        <div class='col-xl-<?php echo $xlnum;?> col-lg-<?php echo $lgnum;?> col-sm-<?php echo $smnum;?> '>
          <div class="card">
            <h1>Governance</h1>
            <p>One of the three componets of sustainbility here we want to make
              companies accountable for their actions but also endorse the companies
              that go the extra mile</p>
          </div>
        </div>
        <!-- end of col-4 -->

        <div class='col-xl-<?php echo $xlnum;?> col-lg-<?php echo $lgnum;?> col-sm-<?php echo $smnum;?> '>
          <div class="card">
            <h1>Environmental</h1>
            <p>Our environmental footprint is huge and we want to encourage people to buy
              products that helo emilminate that and force companies to make </p>
            </div>
        </div>
        <!--end of col-4 -->

        <div class='col-xl-<?php echo $xlnum;?> col-lg-<?php echo $lgnum;?> col-sm-<?php echo $smnum;?> '>
          <div class="card">
            <h1>Social</h1>
            <p>Why buy a product that only benefits yourself when you can purchase a product that
            not benefits you but also people in need. </p>
          </div>
        </div>
        <!-- end of col-4 -->

      </div>
      <!-- end of row sb_cards -->

    </div>
    <!-- fern_img  ends -->

    </div>
    <!-- mission info ends -->



</div>
<!-- container-fluid ends -->
