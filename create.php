<!-- this page allows the user to create an account -->
<!-- tells if username is taken live -->
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
    }
  }

  xmlhttp.open("GET","hash.php?search="+str,true);
  xmlhttp.send();
}



</script>


 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

<div class="container-fluid" id="">
<!-- navbar -->
  <?php include("navbar.php"); ?>


<div class="jumbotron"  >


<!-- <div class="row"> -->
<h1>CREATE AN ACCOUNT</h1>

  <form class="logform" action="index.php?page=hash" method="post">
    <div class="form-group">
      <!-- ener username, will tell if username is already taken live -->
      <label>Username</label>
        <input type="text" name="username" class="form-control" value="" onkeyup="showResult(this.value)">
    </div>
    <div style="max-height: 100px;" id="livesearch"></div>

    <div class="form-group" action="index.php?=hash" menthod="post">
      <!-- enter password -->
      <label>Password</label>
      <!-- password must be 8+ characters -->
        <input type="password" name="password" id="password" class="form-control" minlength="8" required>
        <i class="bi-eye-slash" id="togglePassword"></i>
        <!-- toggle that selects whether the password being input is visible or not -->
        <script type="text/javascript">
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });


        </script>
    </div>


<!-- email -->
    <div class="form-group" action="index.php?=hash" menthod="post">
      <label>Email</label>
        <input type="email" name="email" class="form-control" value="">
    </div>

<!-- submit -->
    <button type="submit" class="btn btn-primary" name="button">Submit</button>
  </form>




<!-- </div> -->

</div>
<!-- end of container-fluid -->
