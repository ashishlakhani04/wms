




<?php 
	$page_title = "User Authentication - Password Reset";
	include_once 'partials/header.php';
	include_once 'partials/parseForgot.php';
?>



<div class="container">

	<section class="col col-lg-7">
	

		<h2>Password Reset Form </h2><hr>

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
		    <label for="passwordField">New Password</label>
		    <input type="password" name="new_password" class="form-control" id="passwordField" placeholder="New Password">
		  </div>

		  <div class="form-group">
		    <label for="passwordField">Confirm Password</label>
		    <input type="password" name="confirm_password" class="form-control" id="passwordField" placeholder="Confirm Password">
		  </div>
		  
		  
		  <button type="submit" name="passwordResetBtn" class="btn btn-primary pull-right">Reset Password</button>
		</form>
		




	</section>
	<p><a href="index.php">Back</a> </p>
	

</div>

<?php include_once 'partials/footer.php'; ?>







</body>
</html>