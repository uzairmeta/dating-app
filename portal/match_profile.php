<?php 
require_once("config.php"); 
if( isset($_SESSION['id']))
{
	
		

	?>
	


	
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
  	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		

	<h2 class="title">All Matched Profiles</h2>
	

	<?php 
		//$user_id = $_SESSION['id'];
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			"Api-Key: V98IhPYJQmunYMplfBMb48wOxGvBzlVS"
		);

		$data = array();

		$ch = curl_init( $baseurl.'All_Matched_Profile' );

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$return = curl_exec($ch);

		$json_data = json_decode($return, true);
	    //var_dump($json_data);

		$curl_error = curl_error($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		//echo $json_data['code'];
		//die;

		if($json_data['code'] !== "200"){
			//echo "<div class='alert alert-danger'>Error in fetching order history, try again later..</div>";
			?>
			<div class="textcenter nothingelse">
				<img src="img/noorder.png" alt="" />
				<h3>Whoops!</h3>
			</div>
			<?php

		} 
		else 
		{	
			$rows = count($json_data['msg']);
			if( $rows == 0 ) {
				?>
				<div class="textcenter nothingelse">
					<img src="img/noorder.png" alt="" />
					<h3>No Record Found</h3>
				</div>
				<?php
			}
			
			foreach( $json_data['msg'] as $str => $val ) 
			{	
				?>
					<div style="background:white; width:220px; margin-right:10px; float:left; text-align:center; margin-bottom:10px; border-radius: 5px; padding: 20px 0 20px 0;">
						<img src="https://graph.facebook.com/<?php echo $val['action_profile'];?>/picture?type=normal" style="border-radius: 50%; width:80px; border: solid 4px #F2F2F2; margin-right: -20px;">
						<img src="https://graph.facebook.com/<?php echo $val['effect_profile'];?>/picture?type=normal" style="border-radius: 50%; width:80px; border: solid 4px #F2F2F2;">
						<h3 style="font-weight: 400;">Its Matched</h3>
					</div>
				<?php	
			}
			?>
				<div style="clear:both"></div>
			<?php	
		}

		curl_close($ch);
	?>

	

<?php } else {
	
	@header("Location: index.php");
    echo "<script>window.location='index.php'</script>";
    die;
    
} ?>