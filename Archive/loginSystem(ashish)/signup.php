







<?php 
    $page_title = "User Authentication - Register Page";
    include_once 'partials/header.php';
    include_once 'partials/parseSignup.php';
?>



<div class="container">

    <section class="col col-lg-7">
    

        <h2>Registration Form </h2><hr>

        <div>

        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>
        <div class="clearfix">
            
        </div>

        



        <form action="" method="post">
            <div class="form-group">
            <label for="emailField">Email Address</label>
            <input type="text" class="form-control" id="emailField" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="usernameField">Username</label>
            <input type="text" class="form-control" id="usernameField" name="username" placeholder="Username">
          </div>

          <div class="form-group">
            <label for="passwordField">Password</label>
            <input type="password" name="password" class="form-control" id="passwordField" placeholder="Password">
          </div>
          
          <button type="submit" name="signBtn" class="btn btn-primary pull-right">Sign Up</button>
        </form>
        




    </section>
    <p><a href="index.php">Back</a> </p>
    

</div>

<?php include_once 'partials/footer.php'; ?>




</body>
</html>