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
	<title>Find People</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<!--design for the userprofile in search-->
<style> 
		#own_posts{
		border: 1px solid #077a3b;
		padding: 20px 30px;
		border-radius: 15px;
		
	}
	#post_img{
		height: 300px;
		width: 100%;
	}
	#cover-img{
		height: 400px;
		width: 100%;
		border: 3px solid #077a3b;
		border-radius: 15px;
		filter: blur(0.5px)
	}
	#profile-img{
		position: absolute;
		top: 250px;
		left: 350px;

	}
	#name-profile{
		position: absolute;
		top: 130px;
		left: 30px;
		color:white; 
		background-color:#077a3b; 
		border-radius:25px; 
		font-family: Source Sans Pro;  
		font-weight: bolder; font-size: 25px;padding:5px;
		width: 125px;
		text-align: center;
	}
</style>
<body>
<div class="row">
	<?php

		if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
		}
		if($u_id < 0 || $u_id == ""){
			echo"<script>window.open('home.php', '_self')</script>";
		}else {
	?>

	<div class="col-sm-12">
		<?php
		if(isset($_GET['u_id'])){

			global $con;

			$user_id = $_GET['u_id'];

			$select = "select * from users where user_id='$user_id'";
			$run = mysqli_query($con, $select);
			$row = mysqli_fetch_array($run);

			$name = $row['user_name'];
		}
		?>

		<?php
			if(isset($_GET['u_id'])){
			global $con;

			$user_id = $_GET['u_id'];

			$select = "select * from users where user_id='$user_id'";
			$run = mysqli_query($con, $select);
			$row = mysqli_fetch_array($run);

			$id = $row['user_id'];
			$profile = $row['user_image'];
			$cover = $row['user_cover'];
			$name = $row['user_name'];
			$f_name = $row['f_name'];
			$l_name = $row['l_name'];
			$describe_user = $row['describe_user'];
			$country = $row['user_country'];
			$gender = $row['user_gender'];
			$register_date = $row['user_reg_date'];

			echo"
				<div class='row'>
					<div class='col-sm-2'>
					</div>
					<div class='col-sm-8'>
					<img id='cover-img' class='img-rounded' src='cover/$cover' alt='cover' >
					<div id='profile-img'>
				<img src='users/$profile' alt='Profile' class='img-circle' width='180px' height='165px' style='border: 3px solid #077a3b;'>
				
				<div id='name-profile'>$f_name</div>
				
			</div>
			<br><br><br>
					</div>
					<div class='col-sm-2'>
					</div>
				</div>



				<div class='row'>
					<div class='col-sm-2'>
					</div>				
					<center>

					<div class='col-sm-2'>
					<div class='container-fluid' style='border-radius:15px; border:solid; background-color: #077a3b;  color:white; font-family: Source Sans Pro; margin-right:10px'>
						
				
						<center>
							<h2>Information About</h2>
							<strong>$f_name $l_name</strong><br>
							<strong style='color:#FDD144;'>$describe_user</strong>
						</center>
							<hr>

									
									<div class='row'>	
									<div class='col-sm-3'>								
										Gender
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-6'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $gender </strong> 
									</div>
									</div>
										

									<div class='row'>	
									<div class='col-sm-3'>								
										Country
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-6'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $user_country </strong> 
									</div>
									</div>

									<div class='row'>	
									<div class='col-sm-3'>								
										Birthday
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-10'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $user_birthday </strong> 
									</div>
									</div>
										<br>

					
					
						
					
			";

			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$userown_id = $row['user_id'];

			if($user_id == $userown_id){
				echo"<a href='edit_profile.php?u_id=$userown_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Edit Profile </button></a><br><br>";
			}
			echo"

				</div>
				</div>
				</center>
			";
		}
		?>
		<div class="col-sm-6">
			<h1 style="font-family: Source Sans Pro;  font-weight: bold;">Posts</h1>
			<?php
			global $con;

			if(isset($_GET['u_id'])){
				$u_id = $_GET['u_id'];
			}

			$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

			$run_posts = mysqli_query($con, $get_posts);

			while($row_posts = mysqli_fetch_array($run_posts)){

				$post_id = $row_posts['post_id'];
				$user_id = $row_posts['user_id'];
				$content = $row_posts['post_content'];
				$upload_image = $row_posts['upload_image'];
				$post_date = $row_posts['post_date'];

				$user = "select * from users where user_id='$user_id' AND posts='yes'";

				$run_user = mysqli_query($con, $user);
				$row_user = mysqli_fetch_array($run_user);

				$user_name = $row_user['user_name'];
				$f_name = $row_user['f_name'];
				$l_name = $row_user['l_name'];
				$user_image = $row_user['user_image'];

				if($content=="No" && strlen($upload_image) >= 1){
					echo"
						<div id='own_posts'>
							<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px' style='border: 1px solid #077a3b'	>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a>
							<small style='color:black;'><strong>$post_date</strong></small>
				
						</div>
						
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:25px;'>

						</div>
					</div><br>
							<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>Comment</button></a>	
						</div><br/><br/>




					";
				}
				else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"

				<div id='own_posts'>
					<div class='row'>
							<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px' style='border: 1px solid #077a3b'>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a>
							<small style='color:black;'><strong>$post_date</strong></small>
				
						</div>
					
					</div>
					<div class='row'>
						<div class='col-sm-12'>
						<center><h4  style='font-family: Source Sans Pro; color:#077a3b; border-radius:25px; width:auto;'>$content</h4></center>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:25px;'>
							
						</div>
					</div>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>Comment</button></a>	
				</div></div><br><br>

				";
			}
			else{
				echo"

				<div id='own_posts'>
					<div class='row'>
						<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px' style='border: 1px solid #077a3b'>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a>
							<small style='color:black;'><strong>$post_date</strong></small>
				
						</div>
					<div class='row'>
						<div class='col-sm-12'>
						<center><h4  style='font-family: Source Sans Pro; color:#077a3b; border-radius:25px; width:auto;'>$content</h4></center>
						</div>
					</div>	
					</div>
						<div class='col-sm-4'>
						</div>				
						</div>
						<br>
					
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>Comment</button></a>		
				</div><br><br>

				";

			}	
		}
			?>
		</div>
	</div>
</div>
<?php } ?> <!--close tag for else in line 29-->
</body>
</html>