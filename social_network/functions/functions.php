<?php

$con = mysqli_connect("localhost","root","","social_network") or die("Connection was not established");

//function for inserting post

function insertPost(){
	if(isset($_POST['sub'])){
		global $con;
		global $user_id;

		$content = htmlentities($_POST['content']);
		$upload_image = $_FILES['upload_image']['name'];
		$image_tmp = $_FILES['upload_image']['tmp_name'];
		$random_number = rand(1, 100);

		if(strlen($content) > 250){
			echo "<script>alert('Please Use 250 or less than 250 words!')</script>";
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			if(strlen($upload_image) >= 1 && strlen($content) >= 1){
				move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
				$insert = "insert into posts (user_id, post_content, upload_image, post_date) values('$user_id', '$content', '$upload_image.$random_number', NOW())";

				$run = mysqli_query($con, $insert);

				if($run){
					echo "<script>alert('Your Post updated a moment ago!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";

					$update = "update users set posts='yes' where user_id='$user_id'";
					$run_update = mysqli_query($con, $update);
				}

				exit();
			}else{
				if($upload_image=='' && $content == ''){
					echo "<script>alert('Error Occured while uploading!')</script>";
					echo "<script>window.open('home.php', '_self')</script>";
				}else{
					if($content==''){
						move_uploaded_file($image_tmp, "imagepost/$upload_image.$random_number");
						$insert = "insert into posts (user_id,post_content,upload_image,post_date) values ('$user_id','No','$upload_image.$random_number',NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}

						exit();
					}else{
						$insert = "insert into posts (user_id, post_content, post_date) values('$user_id', '$content', NOW())";
						$run = mysqli_query($con, $insert);

						if($run){
							echo "<script>alert('Your Post updated a moment ago!')</script>";
							echo "<script>window.open('home.php', '_self')</script>";

							$update = "update users set posts='yes' where user_id='$user_id'";
							$run_update = mysqli_query($con, $update);
						}
					}
				}
			}
		}
	}
}

function get_posts(){
	global $con;
	$per_page = 4;

	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page=1;
	}

	$start_from = ($page-1) * $per_page;

	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";

	$run_posts = mysqli_query($con, $get_posts);

	while($row_posts = mysqli_fetch_array($run_posts)){

		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$content = substr($row_posts['post_content'], 0,40);
		$upload_image = $row_posts['upload_image'];
		$post_date = $row_posts['post_date'];

		$user = "select *from users where user_id='$user_id' AND posts='yes'";
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);

		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying posts from database

		if($content=="No" && strlen($upload_image) >= 1){
			echo"
				<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px'>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>@$user_name</a>
							<small style='color:gray;'><strong>$post_date</strong></small>
						
						</div>
					<div class='row'>
						<div class='col-sm-12'>
						<center>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:15px;'></center>
						</div>
					</div>	
					</div>
					<br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; color:#fff;' >Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br>
			
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px'>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>@$user_name</a>
							<small style='color:gray;'><strong>$post_date</strong></small>
						
						</div>
					<div class='row'>
						<div class='col-sm-12' style='font-family: Source Sans Pro;  font-weight: bold;'>
						<center><h4>$content</h4>
						<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:15px;'></center>
						</div>
					</div>	
					</div>
					<br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-12'>
						<img src='users/$user_image' class='img-circle' width='60px' height='50px'>
							<a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'><strong>@$user_name</strong></a>
							<small style='color:gray;'><strong>$post_date</strong></small>
						
						</div>
					<div class='row'>
						<div class='col-sm-12' style='font-family: Source Sans Pro; '>
						<center><h4>$content</h4></center>
						</div>
					</div>	
					</div>
					<br>
					<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-warning' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Comment</button></a><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br>
			";
		}
	}

	include("pagination.php");
}

	//for comment
	function single_post(){
		if (isset($_GET['post_id'])) {
			global $con;

			$get_id = $_GET['post_id'];

			$get_posts = "select * from posts where post_id='$get_id'";

			$run_posts = mysqli_query($con, $get_posts);

			$row_posts = mysqli_fetch_array($run_posts);

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

			$user_com = $_SESSION['user_email'];
			$get_com = "select * from users where user_email='$user_com'";

			$run_com = mysqli_query($con, $get_com);
			$row_com = mysqli_fetch_array($run_com);

			$user_com_id = $row_com['user_id'];
			$user_com_name = $row_com['user_name'];



			if(isset($_GET['post_id'])){
				$post_id = $_GET['post_id'];
			}

			$get_posts = "select post_id from users where post_id='$post_id'";
			$run_user = mysqli_query($con, $get_posts);

			$post_id = $_GET['post_id'];

			$post = $_GET['post_id'];
			$get_user = "select * from posts where post_id='$post'";
			$run_user = mysqli_query($con, $get_user);
			$row = mysqli_fetch_array($run_user);

			$p_id = $row['post_id'];

			if ($p_id != $post_id) {
				echo "<script>alert('ERROR')</script>";
				echo "<script>window.open('home.php', '_self')</script>";
			}else{
				if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='80px' style='border: 1px solid #077a3b'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h6><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h6>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:15px; '>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='80px' style='border: 1px solid #077a3b'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h6><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h6>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<center><h4  style='font-family: Source Sans Pro; color:#077a3b; border-radius:25px; width:auto;'>$content</h4></center>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px; border-radius:15px; '>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='80px' style='border: 1px solid #077a3b'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0; color:#077a3b;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h6><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h6>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
						<center><h1  style='font-family: Source Sans Pro; color:#077a3b; border-radius:25px; width:auto;'>$content</h1></center>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		} //else condition ending

		include ("comments.php");

		echo "
		 <div class='row'>
		 	<div class='col-md-6 col-md-offset-3'>
		 	 	<div class='panel panel-info' style='border: 3px solid #077a3b; border-radius: 25px;'>
		 	 		<div class='panel-body'>
		 	 			<form action='' method='post' class='form-inline'>
		 	 			<textarea placeholder='Write Your Comment Here!' class='pb-cmnt-textarea' name='comment' style='width:100%; border-radius:15px ;'></textarea>
		 	 				
		 	 			<button class='btn btn-warning pull-right' name='reply' style='font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;'>Comment</button> 	 		
		 	 			</form>
		 	 		</div>
		 	 	</div>
		 	</div>
		 </div>
		";

		if (isset($_POST['reply'])) {
			$comment = htmlentities($_POST['comment']);

			if ($comment == "") {
					echo "<script>alert('Enter Your Comment')</script>";
					echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";
			}else {
				$insert = "insert into comments (post_id, user_id, comment, comment_author, date) values('$post_id', '$user_id', '$comment', '$user_com_name', NOW())";

				$run = mysqli_query($con, $insert);

				echo "<script>alert('Your Comment Added')</script>";
				echo "<script>window.open('single.php?post_id=$post_id', '_self')</script>";
			}	
			
		}
			}
		}
	}

	

	//searh result
	function results(){
		global $con;

		if (isset($_GET['search'])){
			$search_query = htmlentities($_GET['user_query']);
		}

		$get_posts = "select * from posts where post_content like '%$search_query%' OR upload_image like '%$search_query%'";

		$run_posts = mysqli_query($con, $get_posts);

		while ($row_posts=mysqli_fetch_array($run_posts)) {
			
			$post_id = $row_posts['post_id'];
			$user_id = $row_posts['user_id'];
			$content = $row_posts['post_content'];
			$upload_image = $row_posts['upload_image'];
			$post_date = $row_posts['post_date'];

			$user = "select * from users where user_id='$user_id' AND posts='yes'";

			$run_user = mysqli_query($con, $user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name = $row_user['user_name'];
			$first_name = $row_user['f_name'];
			$last_name = $row_user['l_name'];
			$user_image = $row_user['user_image'];

			//display post

			if($content=="No" && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-9'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}

		else{
			echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-2'>
						<p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
						</div>
						<div class='col-sm-6'>
							<h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
							<h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
						</div>
						<div class='col-sm-4'>
						</div>
					</div>
					<div class='row'>
						<div class='col-sm-12'>
							<h3><p>$content</p></h3>
						</div>
					</div><br>
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br><br>
			";
		}
		}
	}

function search_user(){
		global $con;
		//search user in a search box
		if (isset($_GET['search_user_btn'])) {
			$search_query = htmlentities($_GET['search_user']);
			$get_user = "select * from users where f_name like '%$search_query%' OR l_name like '%$search_query%' OR user_name like '%$search_query%'";
		}
		else{ //show all the user in the database
			$get_user = "select * from users";
		}

		$run_user = mysqli_query($con, $get_user);

		while ($row_user=mysqli_fetch_array($run_user)) {
			
			$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			$describe_user = $row_user['describe_user'];

			echo "
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div class='col-sm-6'>
					<div class='row' id='find_people'>
						<div class='col-sm-12'>
							<div class='container-fluid' style='border-radius:15px; border:solid; background-color: #077a3b;  color:white; padding:15px;'>
						<a  style='text-decoration: none;cursor: pointer;color:white; font-size: 15px; ' href='user_profile.php?u_id=$user_id'>
						<img class='img-circle' src='users/$user_image' width='90px' height='80px' title='$username' style='border:solid white;'><strong>&nbsp $f_name $l_name</strong>
						</a>
						<small><i> &nbsp $describe_user</i></small>

						
					    </div>
						</div>

						

						<div class='col-sm-3'>
						</div>
					</div>
				</div>
				<div class='col-sm-4'>
				</div>
			</div>
			";
		}

	}


	function show_user(){
		global $con;
		$get_user = "select * from users";
		$run_user = mysqli_query($con, $get_user);


		while ($row_user=mysqli_fetch_array($run_user)) {
			
			$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];
			$describe_user = $row_user['describe_user'];

			echo "
			<div class='row'>
								<div class='col-sm-12'>
					<div class='row' id='find_people'>
						<div class='container-fluid' style='border-radius:15px; border:solid; background-color: #077a3b;  color:white; font-family: Source Sans Pro; margin-right:10px'>
						
				
						<center>
							<br>
							<img class='img-circle' src='users/$user_image' width='150' height='135' style='border: 3px solid #FDD144;'>

							<br><br>
  

							<a style='text-decoration: none;cursor: pointer;color:orange; font-size: 15px; 'href='user_profile.php?u_id=$user_id'>
							<strong style='color:#077a3b; background-color:#FDD144; border-radius:25px; font-size:20px; padding:5px;'>$f_name $l_name</strong><br>
							</a>
							<strong style='color:#FDD144;'>$describe_user</strong>
						</center>
							<hr>
						</div>
					</div>
				</div>
				
				
						
			</div>
			";
		}

	}

?>