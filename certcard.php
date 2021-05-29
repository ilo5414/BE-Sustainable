
<!-- page calls cert info and puts into card  -->
<div class="row sb_cards">
 <?php
   // the sql stament that will be run in the data base to obtain the information wanted
   $cert_sql = "SELECT * FROM cert";
 // this takes the slq written above to the data base and runs it to obtain the information wanted
   $cert_qry = mysqli_query($dbconnect, $cert_sql);
 // this turns the inforamtion retrieved into an assosiative array
   $cert_aa = mysqli_fetch_assoc($cert_qry);


 // do while loop taking the information from the array and turning it into variables
 do {
   $cert_name = $cert_aa['certname'];
   $logo_image = $cert_aa['logo'];
   $about_info = $cert_aa['about'];
   $certID = $cert_aa['certID'];

 // div surrounding the basic booking information as a link
   ?><div class="col-3" ><?php
     ?><div class="card">
       <div class="section">
         <img src="logos/<?php echo $logo_image; ?>">
       </div>

     <h1><?php echo $cert_name ?></h1>
     <p><?php echo $about_info ?></p>

<!-- star rating -->
         <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
         <form id="starform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
         <input type='hidden' name='cert_name' value='<?php echo "$cert_name";?>'/>

         <!-- only show star if logged in -->
         <?php  session_start();
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
           ?>
           <!-- star -->
           <label for="id-of-input" class="custom-checkbox">
             <input type="checkbox" id="star" name="star" onChange="this.form.submit()" />
             <i class="glyphicon glyphicon-star-empty"></i>
             <i class="glyphicon glyphicon-star"></i>
          <!-- star ends  -->
             <span>Favorite</span>
           </label>

           <?php
         } else {
         }

    if(isset($_GET['star'])){

        // assigns inputted rating, comment and bookID to variables
          $userID = $_POST['userID'];

        // inserts into database
          $sql = "INSERT INTO favcert (userID, certID)
          VALUES ('$userID', '$certID')";
      }
    ?>

     </form>

     </div>
   </div>
   <!-- // booking link div ends -->





<?php
 // the while statement for the loop
} while ($cert_aa = mysqli_fetch_assoc($cert_qry));

  ?>
 </div>
 <!-- booking display div ends -->
