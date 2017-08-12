
<?php
	
	///include 'database.php';



	/// Function to check empty fields and returns the form_errors array
	function check_empty_fields($required_fields_array)
	{
		//initialize an array to store error messages
    	$form_errors = array();

    	/// loop through all the array to check if any or all fields are empty
		foreach ($required_fields_array as $name_of_fields) {
			if(!isset($_POST[$name_of_fields]) || $_POST[$name_of_fields] == NULL)
			{
				$form_errors[] = $name_of_fields . " is a required field.";
			}
		}
		return $form_errors;
	}

	/// Function to check min_length of each field
	function check_min_length($fields_to_check_length)
	{
		$form_errors = array();

		foreach ($fields_to_check_length as $name_of_fields => $minimum_length_required) {
			if(strlen(trim($_POST[$name_of_fields])) < $minimum_length_required)
			{
				$form_errors[] = $name_of_fields . " should be of ".$minimum_length_required." characters long.";
			}
		}
		return $form_errors;
	}

	/// Function to validate email
	function check_email($data)
	{
		$form_errors = array();
		$key = 'email';

		/// check if emmail key exists in the array or not
		if(array_key_exists($key, $data))
		{
			/// check if the key has some value
			if($_POST[$key] != NULL)
			{
				/// Remove all illegal characters from the email
				$key = filter_var($key,FILTER_SANITIZE_EMAIL);

				//check if input is a valid email address
            	if(filter_var($_POST[$key], FILTER_VALIDATE_EMAIL) === false)
            	{
                	$form_errors[] = $key . " is not a valid email address";
            	}
			}
		}
		return $form_errors;
	}

	/// Function to show all the errors
	function show_errors($form_errors_array){
	    $errors = "<p><ul style='color:red;text-transform: capitalize;background-color:#ffffb2;margin-bottom:30px; padding-top:30px;padding-bottom:30px;line-height: 2.0em; border-radius:5px;'>";

	    //loop through error array and display all items in a list
	    foreach($form_errors_array as $the_error){
	        $errors .= "<li>* {$the_error} </li>";
	    }
	    $errors .= "</ul></p>";
	    return $errors;
	}

	function flashMessage($message,$passorfail = "Fail"){

		if($passorfail === "Pass")
		{
			$data = "<div class='alert alert-success'>  $message </div>";
		}
		else
		{
			$data ="<div class=' alert alert-danger' style='padding: 20px 0px 20px 20px; line-height:2.0em;'>  $message </div>";
		}

		return $data;

	}

	function redirectedTo($dest)
	{
		header("location: $dest ");
	}

	function checkDuplicate($duplicate_key,$message)
	{
		include 'resource/database.php';

		
			$selectQuery = "select * from signup where $message = '$duplicate_key' ";
			$selectResult = mysqli_query($conn,$selectQuery);
			
			if($row = mysqli_fetch_array($selectResult))
			{
				return true;
			}
			else{
				return false;
			}
		

	}

?>