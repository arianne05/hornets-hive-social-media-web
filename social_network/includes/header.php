<?php
include("includes/connection.php");
include("functions/functions.php");
?>
<nav class="navbar navbar-default" style="font-family: Source Sans Pro;  font-weight: bolder; font-size: 15px; background-color: #077a3b; ">
	<div class="container-fluid">

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse	">
	      <ul class="nav navbar-nav" >
	      	
	      	<?php 
			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'"; 
			$run_user = mysqli_query($con, $get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_id = $row['user_id']; 
			$user_name = $row['user_name'];
			$first_name = $row['f_name'];
			$last_name = $row['l_name'];
			$describe_user = $row['describe_user'];
			$Relationship_status = $row['Relationship'];
			$user_pass = $row['user_pass'];
			$user_email = $row['user_email'];
			$user_country = $row['user_country'];
			$user_gender = $row['user_gender'];
			$user_birthday = $row['user_birthday'];	
			$user_image = $row['user_image'];
			$user_cover = $row['user_cover'];
			$recovery_account = $row['recovery_account'];
			$register_date = $row['user_reg_date'];
					
					
			$user_posts = "select * from posts where user_id='$user_id'"; 
			$run_posts = mysqli_query($con,$user_posts); 
			$posts = mysqli_num_rows($run_posts);
			
			?>



	        <li style="position: absolute; right: 85%; font-size: 20px; ">
	        	<a href='profile.php?<?php echo "u_id=$user_id" ?>' style='color: white;'><img src="assets/images/avatar.ico" style="width: 15%;height: 15%;">&nbsp;<?php echo "$first_name"; ?></a>
	        </li>
	       	<li style="position: absolute; right: 70%; font-size: 20px; ">
	       		<a href='home.php' style='color: white;'><img src="assets/images/home.ico" style="width: 15%;height: 15%;">&nbsp;Home</a></li>
			<li style="position: absolute; right: 55%; font-size: 20px; ">
				<a href='members.php' style='color: white;'>
				<img src="assets/images/aboutus.ico" style="width: 13%;height: 15%;">&nbsp;Find People</a></li>
			<li style="position: absolute; right: 40%;  font-size: 20px; ">
				<a href='messages.php?<?php echo "u_id=$user_id" ?>' style='color: white;'><img src="assets/images/message.ico" style="width: 15%;height: 15%;">&nbsp;Messages</a></li>
			<li style="position: absolute; right: 27%;  font-size: 20px;">
				<a href='logout.php?' style='color: white;'><img src="assets/images/logout.ico" style="width: 15%;height: 15%;" >&nbsp;Logout</a></li>

					
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search Posts" style="border-radius: 25px; ">
						</div>
						<button type="submit" class="btn btn-warning"  title="Search" name="search" style="font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; "><img src="assets/images/find.ico" style="width: 20px;height:20%;"></button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>

<style>
	.more {
		position: absolute; right: 60%; top: 27%;
	}


</style>