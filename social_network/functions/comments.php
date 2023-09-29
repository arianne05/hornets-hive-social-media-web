<?php
	$get_id = $_GET['post_id'];

	$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";

	$run_com = mysqli_query($con, $get_com);

	while ($row = mysqli_fetch_array($run_com)){
		$com = $row['comment'];
		$com_name = $row['comment_author'];
		$date = $row['date'];

		echo "
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-4' style='background-color:lightgray;'>
					<div class='row'>
						<div class='col-sm-12'>
							<i style='font-family: Source Sans Pro;  font-weight: bolder; font-size: 18px; cursor:pointer;color #3897f0;' title='$date'>@$com_name<h6>commented on : $date </h6></i> 
							
						
						</div>
					<div class='row'>
						<div class='col-sm-12' style='font-family: Source Sans Pro;  font-weight: bold;'>
						<center style='background-color:white;'><h4>$com</h4>
						</center>
						</div>
					</div>	
					</div>
					
					
				</div>
				<div class='col-sm-3'>
				</div>
			</div><br>



			
		";
	}
?>

