<?php

// include database and utilities files
include_once 'resource/database.php';
include_once 'resource/utilities.php';

// Validating the form
if(isset($_POST['signBtn']))
{

    /// email and username ko check kro voh dupicate toh nahi

    /// return the errors

    $email = $_POST['email'];
    $username = $_POST['username'];

    $form_errors = array();

    if(checkDuplicate($email,"email"))
    {
        $result = flashMessage("Email already Existed, try something new!");
    }
    else if(checkDuplicate($username,"username"))
    {
        $result = flashMessage("Username already Existed, try something new!");
    }
    else
    {

        // empty array bnao jo saare errors collect krega
        

        // apne required fields ka naam likho
        $required_fields = array('email','username','password');

        //call the function to check empty field and merge the return data into form_error array
        $form_errors = array_merge($form_errors,check_empty_fields($required_fields));

        //Fields that requires checking for minimum length
        $fields_to_check_length = array('username' => 4 , 'password' => 6);

        //call the function to check minimum required length and merge the return data into form_error array
        $form_errors = array_merge($form_errors,check_min_length($fields_to_check_length));

        //email validation / merge the return data into form_error array
        $form_errors = array_merge($form_errors, check_email($_POST));

        // if the form_errors array is empty,it means there are no errors
        if(empty($form_errors))
        {
            /// get all the data entered by the user into the variables
            
            $password = $_POST['password'];

            $query = "insert into signup (username,email,password) values ('$username','$email','$password')";
            $queryNext="insert into enrolled (username) values('$username')";

            //echo $query;

            $queryResult = mysqli_query($conn,$query);
            $queryNextResult=mysqli_query($conn,$queryNext);

            if(!$queryNextResult)
            {
                //echo "Mast";
            }

            
            $result = flashMessage("Registration Successful","Pass");
            
            
        }


        // if there is only one error
        else if(count($form_errors) == 1)
        {
            $result = flashMessage("There was 1 error in the form");
        }

        // More than one error
        else
        {
            $result =  flashMessage("There were " .count($form_errors). " errors in the form ");
        }
        



    }

	

}


?>