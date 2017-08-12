<?php include_once "resource/database.php" ?>
<?php include_once "resource/utilities.php" ?>

<?php
	
	if(isset($_POST['passwordResetBtn']))
	{
		$form_errors = array();

		$required_fields = array('email','new_password','confirm_password');

		$form_errors = array_merge($form_errors,check_empty_fields($required_fields));

		$fields_to_check_length = array('new_password' => 6, 'confirm_password' => 6);

		$form_errors = array_merge($form_errors,check_min_length($fields_to_check_length));

		$form_errors = array_merge($form_errors,check_email($_POST));

		if(empty($form_errors))
		{
			$email = $_POST['email'];
			$newPassword = $_POST['new_password'];
			$confPassword = $_POST['confirm_password'];

			if($newPassword != $confPassword)
			{
				$result = flashMessage("New password and confirm password does not match");
			}
			else
			{
				$query = "select * from signup where email = '$email' ";
				$queryResult = mysqli_query($conn,$query);

				if($row = mysqli_fetch_array($queryResult))
				{
					$emailget = $row['email'];
					$updateQuery = " update signup set password = '$newPassword' where email = '$emailget' ";
					$updateResult = mysqli_query($conn,$updateQuery);
					$result = flashMessage("Password Reset Successful","Pass");
				}
				else{
					$result =flashMessage("The email address provided
                                does not exist in our database, please try again");
				}
			}
		}
		else
		{
			if(count($form_errors) == 1){
            	$result = flashMessage("There was 1 error in the form");
        	}
        	else
        	{
            	$result = flashMessage("There were " .count($form_errors). " errors in the form");
        	}
		}
	}

?>