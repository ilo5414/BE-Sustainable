
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

<div class="container-fluid" id="">

  <?php include("navbar.php"); ?>


<div class="jumbotron"  >


<!-- <div class="row"> -->
<h1>CREATE AN ACCOUNT</h1>

  <form class="logform" action="index.php?page=hash" method="post">
    <div class="form-group">
      <label>Username</label>
        <input type="text" name="username" class="form-control" value="" onkeyup="showResult(this.value)">
    </div>
    <div style="max-height: 100px;" id="livesearch"></div>

    <div class="form-group" action="index.php?=hash" menthod="post">
      <label>Password</label>
        <input type="text" name="password" class="form-control" value="">
    </div>

    <div class="form-group" action="index.php?=hash" menthod="post">
      <label>Email</label>
        <input type="email" name="email" class="form-control" value="">
    </div>


    <button type="submit" class="btn btn-primary" name="button">Submit</button>
  </form>




<!-- </div> -->

</div>
<!-- end of container-fluid -->
