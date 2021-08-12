<!DOCTYPE html>
<html>
<head>
	<title>Voting details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    
	<div class="container-fluid pagea" style="height: 100vh; overflow: hidden;">
		<div class="row">
			
			<div class="col-12 pt-4">
			<a href="http://localhost/final2/main%20votingpage/index.html">Go To Home</a>
			
				<h1 class="text-center text-danger">E-VOTE DETAILS</h1>
			</div>
		</div>
		
		<hr>
		<div class="row bg-danger" style="padding: 40px; cursor: pointer;">
			<div class="col-md-7 vdatas" style="padding: 0 50px;">
				
			</div>
			<div class="col-md-5 bg-white" style="overflow-y: auto; background-color: white; height: 71vh;">
				
					<?php
						require("../php/database.php");
						$getdata = "SELECT * FROM own_vote";
						$response = $db->query($getdata);
						if($response)
						{
							while($data = $response->fetch_assoc())
							{
								echo '<div style="border:1px solid #ccc; padding: 10px; margin:10px 0;" vid="'.$data['id'].'" vmail="'.$data['email'].'" class="vote-data">
									<b class="text-center">'.$data['id'].'</b>
									<h4>'.$data['hfirst'].'</h4>
									<h5>'.$data['hsecond'].'</h5>
									<p>'.$data['email'].'</p>
								</div>';
							}


						}



					?>
				

				
			</div>
		</div>
	</div>
	<!--modal -->

	<div class="bg-white bg-shadow border p-5 can-con d-none animated fade-in" align="center" style="width:40%; position: fixed; z-index: 1000; top:20%; left: 30%;">
		<?php
			$username  = base64_decode($_COOKIE['_ekeau_']);
			$get_data="SELECT * FROM vote WHERE voter_email='$username'";
			$response = $db->query($get_data);
			if($response)
			{
				if($response->num_rows == 0)
				{
					echo '<h2 class="mb-4">Are you sure you want to give vote</h2>
						<button class="btn btn-success vote-yes">YES</button>
						<button class="btn btn-danger vote-no">NO</button>';
				}
				else{
					$data = $response->fetch_assoc();
					$name = $data['candidate_name'];
					$ids = $data['candidate_id'];
					$email = $data['candidate_email'];
					echo '<h2 class="mb-4">You have already completed your vote</h2>
						<h4>Your vote : </h4>
						<p><b>ID : </b><span class="text-danger">'.$ids.'</span></p>
						<p><b>NAME : </b><b class="text-danger">'.$name.'</b></p>
						<p><b>EMAIL : </b><span class="text-danger">'.$email.'</span></p>
						<button class="btn btn-danger vote-no">CLOSE</button>';
				}
			}

		?>
		
	</div>

	<!--modal -->






	<script>
		$(document).ready(function(){
			$(".vote-data").click(function(){
				var id = $(this).attr('vid');
				var email = $(this).attr('vmail');
				$.ajax({
					type : "POST",
					url : "get.php",
					data:{
						id:id,
						email : email
					},
					success:function(response){
						$(".vdatas").html(response);
						var cid,cname,cemail;
						$(".vote-for").click(function(){
							cid = $(this).attr('cid');
							cname = $(this).attr('cname');
							cemail = $(this).attr('cemail');
							$(".can-con").removeClass("d-none");
							$(".pagea").addClass("d-none");
						});
						$(".vote-yes").click(function(){
						$.ajax({
							type : "POST",
							url : "vote.php",
							data:{
								cid:cid,
								cname:cname,
								cemail : cemail
							},
							success:function(res){
								alert(res);
								if(res.trim() == "success")
								{
									location.reload();
								}
							}
						});
					});
					}
				});
			});
		
		$(".vote-no").click(function(){
			$(".can-con").addClass("d-none");
			$(".pagea").removeClass("d-none");
		});
		});
	</script>
</body>
</html>