

<?php 

    if(isset($_POST['id']) )
    {
    	 include_once 'resource/session.php';
		include_once 'resource/database.php';
		$user=$_SESSION['username'];
      $id=$_POST['id'];
      $query = "select * from courses where id = '$id'";
      $result=mysqli_query($conn,$query);
      $row=mysqli_fetch_assoc($result);
      $coursename=$row['coursename'];

      $updateQuery='update enrolled set '."$coursename".' = "yes" where username = '."'$user'".'';
      echo $updateQuery;
      $updateResult=mysqli_query($conn,$updateQuery);
      if(!$updateResult)
      {
      	echo " nahi".$conn->error;
      }
      else{
      	echo "yes";
      }
      
    }
  ?>