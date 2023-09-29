<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body >





<div class='row'>
	<div class="col-sm-8">



<div class='row'>
	<div class="col-sm-3">
	</div>
	<div class="col-sm-6">
		
	
		<div class='row' id='insert_post'>
		 	<div class='col-md-12'>
		 		<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data" >
		 			<div class='panel panel-default' style='border: 3px solid #077a3b; border-radius: 25px;'>
		 	 		<div class='panel-body'>
			
			<textarea class='form-control' cols="83" rows="4" name="content" placeholder="Express your Feeling" value="hhhhh" style="font-family:Source Sans Pro; color:#077a3b"></textarea><br>
			<button  class="btn btn-warning pull-right" name="sub"  size="30" style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Post</button>  
			<label class="btn btn-warning pull-right"  style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Select Image
		<input type="file" name="upload_image" size="30">
		</label>	 			 	 	
			</div>



				</form>
		<?php insertPost(); ?>
					</div>
					
			</div>
		</div>
	</div>
	
</div>
<br>


		<?php echo get_posts(); ?>
		
	</div>		
		
		 	 		
	
	<div class="col-sm-4" style="font-family: Source Sans Pro;  font-weight: bold; font-size: 15px;">
		 <div class='row'>
		 	<div class='col-md-8'>
		 	 	<div class='panel panel-info' style='border: 3px solid #077a3b; border-radius: 25px;'>
		 	 		<div class='panel-body'>
		<center><h1>Find New People</h1>
		<?php show_user(); ?>
		</center>
		</div>
	</div></div>
	</div>
	</div>
	</div>
</body>
</html>