
<?php include_once 'resource/database.php'; ?>
<?php include_once 'resource/utilities.php'; ?>

<?php 
	if(isset($_POST['loginBtn']))
	{
		/// array to hold errors
		$form_errors =  array();
		/// what we have to validate
		$required_fields = array('username','password');

		$form_errors = array_merge($form_errors,check_empty_fields($required_fields));

		if(empty($form_errors))
		{
			// collect form data
			$user = $_POST['username'];
			$pass = $_POST['password'];

			// check if the user exists in the database

			$query = "select * from signup where username = '$user' ";

			$queryResult = mysqli_query($conn,$query);

			while($row = mysqli_fetch_array($queryResult))
			{
				/// Fetch the data from the database

				$id = $row['id'];
				$username = $row['username'];
				$password = $row['password'];
				$email = $row['email'];



				if($pass === $password)
				{
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;


					redirectedTo("dashboard.php");
				}
				else
				{
               		$result = flashMessage("Invalid username or password");
           		}
			}

		}
		else
		{
			if(count($form_errors) == 1){
            	$result = flashMessage("There was one error in the form");
        	}
        	else{
            	$result = flashMessage("There were " .count($form_errors). " error in the form");
        	}
		}

	}
?>