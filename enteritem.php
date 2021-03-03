<!-- form to enter new item -->

<h1 class="display-4">Add new item</h1>
<!-- <form class="form-inline my-2 my-lg-0" action="index.php?page=insertitem" method="post" enctype="multipart/form-data">
  <input required type="text" name="item_name" placeholder="item name">
  <input required type="text" name="item_code" placeholder="item barcode">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input required type="text" name="item_cert" placeholder="item certification">
  <button type="btn btn-outline-success my-2 my-sm-0" name="submit_button">Submit</button>
</form> -->

<form action="index.php?page=insertitem" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlInput1">item name</label>
    <input class="form-control" required type="text" name="item_name" placeholder="item name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">item name</label>
    <input class="form-control" required type="number" name="item_code" placeholder="item barcode">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Item certificates</label>
    <select multiple class="form-control" required name="item_cert" placeholder="item certification">
      <option>1</option>
      
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="submit_button">Submit</button>
</form>
<!-- form errorcodes -->
<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  echo("<div class='alert alert-danger' role='alert'>
      insert error= $error
    </div> ");
} elseif (isset($name)) {
  echo("$name, $barcode, $name.jpg");
} else {
  echo "";
}
?>
