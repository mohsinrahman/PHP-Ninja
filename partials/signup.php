<?php 

?>

<div class="col-md-12 col-sm-12">
  <section class="margin-t con-signup">
    <div>
      <?php 
        // var_dump($_GET["error"]);

      if(isset($_GET["error"]))
      {
        echo $_GET["error"];
      } 
      ?>

      
    </div>
<!--       <p id="message">  -->
<!--       Please sign up to be able to use our service!</p> -->

      <form action="partials/createUser.php" method="POST">
        <div class="form-group">
         <!--  <label class="inputLabel" for="username">Username</label> -->
          <input name="username" type="text" class="form-control input-width" id="username" placeholder="Username">
        </div>
        <div class="form-group">
          <!-- <label class="inputLabel" for="password">Password</label> -->
          <input name="password" type="password" class="form-control input-width" id="password" placeholder="Password">
        </div>
        <div class="form-group">
          <!-- <label class="inputLabel" for="email">Email</label> -->
          <input name="email" type="email" class="form-control input-width" id="email" placeholder="Email">
        </div>
        <div class="form-group">
<!--           <label class="inputLabel" for="firstname">Firstname</label>
          <input name="firstname" type="text" class="form-control" id="firstname" placeholder="">
        </div>
        <div class="form-group">
          <label class="inputLabel" for="firstname">Lastname</label>
          <input name="lastname" type="text" class="form-control" id="firstname" placeholder="">
        </div> -->
        <input type="submit" class="btn btn-success btn-block" value="Register">
                <!-- <input type="submit" class="btn btn-success btn-block fa" value="Register &#xf044;"> -->
      </form>
  </section>
</div>

