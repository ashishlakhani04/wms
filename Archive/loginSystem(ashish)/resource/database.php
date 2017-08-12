<?php

	// username,database,password,server

	$server = 'localhost';

	$username = 'root';

	$password = '';

	$database = 'login';

	$conn = mysqli_connect($server,$username,$password,$database);

	if(!$conn)
	{
		echo "Bhai nahi ho rha";
	}
	else{
		//echo "Bhai ho gya";
	}