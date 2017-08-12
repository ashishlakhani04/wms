<?php include_once 'resource/session.php' ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php if(isset($page_title)) echo $page_title ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="index.php">Logo</a>
	        </div>
	        <div id="navbar" class="collapse pull-right navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="index.php">Home</a></li>

	            <?php if(isset($_SESSION['username'])) { 
	            	echo '<li><a href="dashboard.php">Dashboard</a></li>';

		echo '<li><a href="#">My Profile</a></li>';
		echo '<li><a href="logout.php">Logout</a></li>';


		}

		else{

		echo '<li><a href="#">About</a></li>';
		
		echo '<li><a href="login.php">Log In</a></li>';
		echo '<li><a href="signup.php">Sign Up</a></li>';
		echo '<li><a href="#">Contact</a></li>';

		}
		?>


	            
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
    </nav>

    