<?php 
	$page_title = "User Authentication - Homepage";
	include_once 'partials/header.php';
	include_once 'resource/database.php';
?>
<?php 
  
   if(isset($_POST['applyOut']))
   {
    echo '<script>alert("You first have to login.")</script>';
    header('Refresh:0 ; URL=login.php');
   }
  if(isset($_SESSION['username']))
  {
    if(isset($_POST['applyIn']))
    {
      // save into the database
      $userapply=$_SESSION['username'];
      $applyQuery="select ";
      // direct him to dashboard
    }
  }
   

?>
<style type="text/css">
    	
    		.content{
    			text-align: center;
    			height: 550px;
    			padding-top: 40px;
    			border-radius: 10px;
    		}
    	
 </style>

    <div class="container">


      <div class="flag">
        <h1>Workshops Offered by our Company</h1>
        <p class="lead">Courses for all stages, with equal focus on theory and implementation</p>


        
      </div>

      <!-- if session is set, categorize the courses whether that particular course has taken by the user or not. -->

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

      <div class="row">
      <?php
        $query="select * from courses";
         $result=mysqli_query($conn,$query);
         $check=0;
       while($row = mysqli_fetch_assoc($result)) { $name=$row['coursename'];  $final= $rowEnrolled[$name]; ?>
        <div class="col-md-4 content"  <?php if($check%2 == 0){ echo "style='background-color:#D3D3D3' ";} ?> >
        <?php if($row['id'] == 1){echo "<img src='images/color_android.svg' height='200px'>  ";} 
            else if($row['id'] == 2){echo "<img src='images/color_cpp.svg' height='200px'>";} 
            else{
              echo "<img src='images/color_java.svg' height='200px'>";
            }
        ?>
          <h1 style="margin-top: -5px;"><?php echo $row['coursename']; ?></h1>
          <h2 style="font-weight: 200;">&#8377 <?php echo $row['amount']; ?></h2>
          <h2 style="font-weight: 300; margin-bottom: 40px;">( <?php echo $row['lectures']; ?> Lectures )</h2>
         
          <input type="submit" name="readIn" style="margin-left: 20px;" class="btn btn-primary btn-lg pull-left" value="Read More..">
          <!--<input type="submit" value="Apply" name="applyIn" style="margin-right: 20px;" class="btn btn-warning btn-lg pull-right " <?php //if($final == 'yes'){echo 'disabled';}  ?> >-->

          <button id='apply<?php echo $row["id"] ?>' onclick='submitcourse(<?php echo $row["id"] ?>);' style="margin-right: 20px;"  <?php if($final == 'yes'){echo 'disabled';} ?> class="btn btn-warning btn-lg pull-right submitcourse" >
            Apply
          </button>

          <?php if($final == 'yes'){
                echo "<p style='color:red;clear:both;padding-top:20px;'>* You have already Enrolled for this Course!</p>";
            }?>
        </div>

      <?php $check++; }  ?>
      </div>

      <?php $totalrows-- ; } 







        }
        else{

      ?>
  

      <?php
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

      <div class="row">
      <?php
      	$query="select * from courses";
      	 $result=mysqli_query($conn,$query);
      	 $check=0;
       while($row = mysqli_fetch_assoc($result)) { ?>
      	<div class="col-md-4 content"  <?php if($check%2 == 0){ echo "style='background-color:#D3D3D3' ";} ?> >
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
      		<input type="submit" name="readOut" style="margin-left: 20px;" class="btn btn-primary btn-lg pull-left" value="Read More..">
      		<input type="submit" value="Apply" name="applyOut" style="margin-right: 20px;" class="btn btn-warning btn-lg pull-right">
          </form>
      	</div>

      <?php $check++; }  ?>
      </div>

      <?php $totalrows-- ; } ?>
    
    <?php } ?> 

    </div><!-- /.container -->





	

	

<?php include_once 'partials/footer.php'; ?>
<script type="text/javascript">
  
  function submitcourse(id){
  //alert(id);
  $.post("submitcourse.php",
    {
        id: id,
        status:'addcourse'
    },
    function(data, status){
        window.location="dashboard.php";//alert("Data: " + data + "\nStatus: " + status);
    });
}
</script>