<?php 
	$page_title = "User Authentication - dashboard";
	//include_once 'partials/header.php';
	//include_once 'resource/database.php';
	//if(!isset($_SESSION['username']))
	{
		//header('Location:index.php');
	}
?>


<?php  include_once 'resource/session.php';
		include_once 'resource/database.php';
		if(!isset($_SESSION['username']))
		{	
			header('Location:index.php');
		}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      .yo{
        margin-top: 20px;
      }
    </style>
    
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <?php if(isset($_SESSION['username'])) { 
	            	

					echo '<li><a href="#">My Profile</a></li>';
					echo '<li><a href="logout.php">Logout</a></li>';
					echo '<li><a href="index.php">'.$_SESSION['username'].'</a></li>' ;


				} ?>
                
                 
                    
                
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                	<li style="padding-left: 60px; padding-top: 20px; padding-bottom: 20px;">
                        <i class="glyphicon glyphicon-user" style="color: #d9edf7;font-size: 100px;"></i> 
                    </li>
                    <?php if(isset($_SESSION['username'])) { 
                    echo '<li style="text-align:center;"><a href="#">My Profile</a></li>';
					echo '<li style="text-align:center;"><a href="logout.php">Logout</a></li>';
					echo '<li style="text-align:center;"><a href="index.php">Home</a></li>';
					} ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable" style="line-height: 2.0em;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Welcome back <?php echo $_SESSION['username'] ;?>!</strong> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                



<div class="container">
    <div class="flag text-center">
        <h1>Courses You have enrolled in!</h1>
        <p class="lead">Courses for all stages, with equal focus on theory and implementation</p>


        
      </div>

                <?php

                    if(isset($_SESSION['username']))
                    {
                      $user=$_SESSION['username'];
                      $query="select * from enrolled where username = '$user'";
                      $result=mysqli_query($conn,$query);
                      $rowEnrolled=mysqli_fetch_assoc($result);





                            



                     $query="select * from courses";
                     $result=mysqli_query($conn,$query);
                     $count=0;
                     while($row = mysqli_fetch_assoc($result))
                     {
                      $count++;
                     }
                     
                     $totalrows=($count%3)+1;
                     
                     while($totalrows!=0)
                     {
                  ?>

                  <div class="row" style="margin-top: 20px;">
                  <?php
                    $query="select * from courses";
                     $result=mysqli_query($conn,$query);
                     $check=0;
                   while($row = mysqli_fetch_assoc($result)) { $name=$row['coursename'];  $final= $rowEnrolled[$name]; ?>
                    <div class="col-md-4 content col-md-offset-1 text-center yo" <?php if($final == 'no'){echo "style='display:none' ";} ?> <?php if($check%2 == 0){ echo "style='background-color:#D3D3D3' ";} else{echo "style='background-color:#D3D3D3'; ";} ?> >
                    <?php if($row['id'] == 1){echo "<img src='images/color_android.svg' height='200px'>  ";} 
                        else if($row['id'] == 2){echo "<img src='images/color_cpp.svg' height='200px'>";} 
                        else{
                          echo "<img src='images/color_java.svg' height='200px'>";
                        }
                    ?>
                      <h1 style="margin-top: -5px;"><?php echo $row['coursename']; ?></h1>
                      <h2 style="font-weight: 200;">&#8377 <?php echo $row['amount']; ?></h2>
                      <h2 style="font-weight: 300; margin-bottom: 40px;">( <?php echo $row['lectures']; ?> Lectures )</h2>
                      <form action="" method="post">
                      <input type="submit" name="readIn" style="margin-left: 20px;" class="btn btn-primary btn-lg pull-left" value="Read More..">
                      <input type="submit" value="Apply" name="applyIn" style="margin-right: 20px;" class="btn btn-warning btn-lg pull-right " <?php if($final == 'yes'){echo 'disabled';}  ?> >
                      </form>

                      <?php if($final == 'yes'){
                            echo "<p style='color:red;clear:both;padding-top:20px;'>* You have already Enrolled for this Course!</p>";
                        }?>
                    </div>

                  <?php $check++; }  ?>
                  </div>

                  <?php $totalrows-- ; } 







                    }
                    

                  ?>


                


</div>




                
                <!-- /.row -->

                
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
  <?php include_once 'partials/footer.php'; ?>  
  
