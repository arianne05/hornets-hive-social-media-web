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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM Plex Sans">
</head>
<style>
	#cover-img{
		height: 400px;
		width: 100%;
		border: 3px solid #077a3b;
		border-radius: 15px;
		filter: blur(0.5px);
}
	#profile-img{
		position: absolute;
		top: 250px;
		left: 350px;

	}
	#update_profile{
		position: relative;
		top: -33px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color: rgba(0,0,0,0.1);
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}
	#own_posts{
		border: 1px solid #077a3b;
		padding: 20px 30px;
		border-radius: 15px;
		

	}
	#post_img{
		height: 300px;
		width: 100%;
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
		<div class="col-sm-2">	
		</div>
	<div class="col-sm-8">
		<?php
			echo"
			<div>
				<img id='cover-img' class='img-rounded' src='cover/$user_cover' alt='cover' >
				<form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>

				<ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
					<li class='dropdown'>
						<button class='dropdown-toggle btn btn-warning' data-toggle='dropdown' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 15px;'>Change</button>
						<div class='dropdown-menu' style='background-color: #077a3b; color:white; border-radius:15px;'>
							<center>
							<p>Click <strong>Select</strong> and then click the <strong>Update</strong></p>
							<label class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'> Select Cover
							<input type='file' name='u_cover' size='60' />
							</label><br>
							<button name='submit' class='btn btn-success' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; color:black;'>Update Cover</button>
							<label class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'> Select Profile
							<input type='file' name='u_image' size='60' />
							</label>
							<button name='update' class='btn btn-success' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; color:black;'>Update Profile</button>
							</center>
						</div>
					</li>
				</ul>

				</form>

			</div>
			<div id='profile-img'>
				<img src='users/$user_image' alt='Profile' class='img-circle' width='180px' height='165px' style='border: 3px solid #077a3b		;'>
				<div id='name-profile'>$first_name</div>
				
			</div><br><br><br>
			";
		?>
		<?php

			if(isset($_POST['submit'])){

				$u_cover = $_FILES['u_cover']['name'];
				$image_tmp = $_FILES['u_cover']['tmp_name'];
				$random_number = rand(1,100);

				if($u_cover==''){
					echo "<script>alert('Please Select Cover Image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "cover/$u_cover.$random_number");
					$update = "update users set user_cover='$u_cover.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Cover Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}

		?>
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "users/$u_image.$random_number");
					$update = "update users set user_image='$u_image.$random_number' where user_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<div class="col-sm-2">
	</div>
</div>
		

<div class="row">
	<div class="col-sm-2">
	</div>
	<div  style="background-color: #077a3b; text-align: center;left: 0.8%;border-radius: 5px; font-family: Source Sans Pro; color:white">
		<?php
		echo"
			
			<div  class='col-sm-2' class='container-fluid' style='border-radius:15px; border:solid; background-color: #077a3b;  color:white; font-family: Source Sans Pro; margin-right:10px'>
						
				
						<center>
							<h2>About</h2>
							

							
							<strong style='color:#FDD144;'>$describe_user</strong>
						</center>
							<hr>

									
									<div class='row'>	
									<div class='col-sm-1'>								
									</div>
									<div class='col-sm-2'>								
										Relationship Status
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-3'>								
									</div>
									<div class='col-sm-9'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $Relationship_status </strong> 
									</div>
									</div>

									<div class='row'>	
									<div class='col-sm-1'>								
									</div>
									<div class='col-sm-3'>								
										Gender
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-2'>								
									</div>
									<div class='col-sm-9'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $user_gender </strong> 
									</div>
									</div>
										

									<div class='row'>	
									<div class='col-sm-1'>								
									</div>
									<div class='col-sm-3'>								
										Country
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-2'>								
									</div>
									<div class='col-sm-9'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $user_country </strong> 
									</div>
									</div>

									<div class='row'>	
									<div class='col-sm-1'>								
									</div>
									<div class='col-sm-3'>								
										Birthday
									</div>
									</div>
									<div class='row'>
									<div class='col-sm-2'>								
									</div>
									<div class='col-sm-9'>								 
										<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'> $user_birthday </strong> 
									</div>
									</div>
								<br>
								<br>
									<a href='edit_profile.php?u_id=$user_id'' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Edit Profile </button></a>
										<br>
										<br>
						
		";
		?>
	</div>
	<div class="col-sm-6">
		<!--display user post-->
		<?php
		global $con;

		if (isset($_GET['u_id'])) {
			$u_id = $_GET['u_id'];
		}

		$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC LIMIT 5";

		$run_posts = mysqli_query($con, $get_posts);

		while ($row_posts = mysqli_fetch_array($run_posts)) {

			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];

			$user = "select * from users where user_id='$user_id' AND posts='yes'";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			//now we will display the posts

			if($content == "No" && strlen($upload_image) >= 1){
				echo"

				<div id='own_posts'>
						<div class='row'>
						<div class='col-sm-6'>
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
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>View</button></a>
					<a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-success' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Edit</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Delete</button></a>
				 
				</div><br><br>
			
	<div class='col-sm-2'>
	</div>
				";
			}


			else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
				echo"

				<div id='own_posts'>
					<div class='row'>
						<div class='row'>
						<div class='col-sm-6'>
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
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>View</button></a>
					<a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-success' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Edit</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Delete</button></a>
				</div><br><br>
				</div>
	<div class='col-sm-2'>
	</div>
	<br>
				";
			}

			else{
				echo"

				<div id='own_posts'>
					<div class='row'>
						<div class='row'>
						<div class='col-sm-6'>
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
						
			
				";

				global $con;

				if (isset($_GET['u_id'])){
					$u_id = $_GET['u_id'];
				}

				$get_posts = "select user_email from users where user_id='$u_id'";
				$run_user = mysqli_query($con, $get_posts);
				$row = mysqli_fetch_array($run_user);

				$user_email = $row['user_email'];

				$user = $_SESSION['user_email'];
				$get_user = "select * from users where user_email='$user'";
				$run_user = mysqli_query($con, $get_user);
				$row = mysqli_fetch_array($run_user);

				$user_id = $row['user_id'];
				$u_email = $row['user_email'];

				if($u_email != $user_email){
					echo "<script>window.open('profile.php?u_id=$user_id', '_self')</script>";
				}else{
					echo "
					
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%; '>View</button></a>
					<a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-success' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Edit</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; width:100%;'>Delete</button></a>
					</div><br><br><br>
					";
				}
			}

			include("functions/delete_post.php");
		
		}

		?>	
	</div>
	<div class='col-sm-2'>
	</div>
</div>
</body>
</html>