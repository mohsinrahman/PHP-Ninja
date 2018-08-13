<?php 
include 'error.php';
include 'database.php';
include 'editPost.php';
include 'header.php';
?>

<section class="col-md-6 col-sm-12 col-xs-12">
<div class="formFlex">
<form action="savePost.php" method="POST">

  <div class="form-group">
      <h2 class="white">Edit your post</h2>
      <br>
    <label for="editViewFormTitle">Enter title</label>

  <input name="title" type="text" class="form-control" id="blogTitle" placeholder="Enter Title" value="<?= $data['title'] ?>" >
  </div>
  <div class="form-group">
    <label for="editViewFormImage">Image, insert http-link</label>
    <input name="img" type="text" class="form-control" id="blogImg" placeholder="Insert http-link here" value="<?= $data['img'] ?>">
  </div>
  <div class="form-group">
    <label for="editViewFormText">Write Post</label>
    <input name="blogText" class="form-control" id="blogText" rows="3" value='<?= $data["blogText"] ?>'> 
 </div>
  <div class="form-group">
    <input type="hidden" name="id" class="form-control" id="blogText" rows="3" value='<?= $data["id"] ?>'> 

  </div>
  <button type="submit" class="btn btn-success">Save changes  <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
</form>
</div>
</section>

<?php include 'footer.php';
?>

