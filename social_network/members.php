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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source Sans Pro">
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	<div class="col-sm-12">
		<center><h2>Find New People</h2></center><br><br>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<form class="search_form" action="">
					<input type="text" placeholder="Search Friend" name="search_user" style="font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px; ">
					<button class="btn btn-info" type="submit" name="search_user_btn" style="font-family: Source Sans Pro;  font-weight: bold; border-radius: 25px;background-color: orange;"><img src="assets/images/find.ico" style="width: 20px;height: 20%;"></button>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div><br><br>
		<?php search_user(); ?>
	</div>
</div>
</body>
</html>
