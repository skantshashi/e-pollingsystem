<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Result</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid pt-4">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center text-danger">E-VOTE RESULTS</h1>
				<hr>
			</div>
			<?php
			$txt = "COMPLETE";
			if($txt == "COMPLETE")
			{
				echo '<div class="col-12">
					<table class="table W-100 text-center border">
						<tr class="tr">
							<th>ID</th>
							<th class="border">NAME</th>
							<th>EMAIL</th>
							<th class="border">POSITION</th>
							<th>TOTAL VOTE</th>
						</tr>';
					
						
							require("php/database.php");
							
							$get_data="SELECT * FROM own_vote";
							$response = $db->query($get_data);
							if($response)
							{
								if($response->num_rows != 0)
								{
									while($data = $response->fetch_assoc()){
										echo '<tr><td>'.$data['id'].'</td>
											<td class="text-uppercase border">'.$data['hfirst'].'</td>
											<td>'.$data['email'].'</td>
											<td class="text-uppercase border">'.$data['hsecond'].'</td>
											<td>';
											$emails = $data['email'];
											$getdata = "SELECT * FROM vote WHERE candidate_email='$emails'";
											$resp = $db->query($getdata);
											if($resp)
											{
												if($resp->num_rows != 0)
												{
													$num = 0;
													while($datas = $resp->fetch_assoc())
													{
														$num = $num+1;
													}
													echo $num;
												}
											}
														
											echo '</td></tr>';
									}
								}
							}
					
						echo '</table>				
						<div class="W-100" align="center">
							<a href="http://localhost/final2/main%20votingpage/index.html" class="btn btn-danger">GO HOME</a>
							<button class="btn btn-success reload">RELOAD</button>
						</div>
					</div>';
			}
			else{
				echo '<div class="col-12 p-5" align="center">
					<h1 class="text-primary">PLEASE WAIT....</h1>
					<br><br>
					<a href="http://localhost/final2/main%20votingpage/index.html" class="btn btn-danger">GO HOME</a>
					<button class="btn btn-success reload">RELOAD</button>
				</div>';
			}

		?>
		</div>

	</div>
	<script>
		$(document).ready(function(){
			$(".reload").click(function(){
				location.reload();
			});
		});
	</script>
</body>
</html>