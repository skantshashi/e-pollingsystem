<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Online voting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
<body>
		<?php
			require("../php/database.php");
			$username  = base64_decode($_COOKIE['_ekcau_']);
			$get_data="SELECT * FROM own_vote WHERE email='$username'";
			$response = $db->query($get_data);
			if($response)
			{
				if($response->num_rows == 0)
				{
					echo '<div class="wrapper text-light" style="background-image: url(images/qwea.png);">
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav">
								 <li><a href="../index.html" ><h1>Home</h1></a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								
							</ul>
					   </div>
						<div class="inner">
							<form class="vote-submit">
								<h3>Create your Own vote</h3>
								
								<div class="form-wrapper">
									<label for="votefirst">Candidate name</label>
									<input type="text" class="form-control" name="votefirst" id="votefirst" required="required">
								</div>
								<div class="form-wrapper">
									<label for="votesnd">Position</label>
									<input type="text" class="form-control" name="votesnd" id="votesnd" required="required">
								</div>
								<div class="form-wrapper">
									<label for="fu-first">Upload images 1</label>
									<input type="file" name="fu-first" id="fu-first" required="required">
								</div>
								<div class="form-wrapper">
									<label for="ftxt-first">Title 1</label>
									<input type="text" class="form-control" name="ftxt-first" id="ftxt-first" required="required">
								</div>
								<div class="form-wrapper">
									<label for="fu-second">Upload images 2</label>
									<input type="file" name="fu-second" id="fu-second" required="required">
								</div>
								<div class="form-wrapper">
									<label for="">Title 2</label>
									<input type="text" class="form-control" name="ftxt-second" id="ftxt-second" required="required">
								</div>
								<div class="form-wrapper">
									<label for="fu-third">Upload images 3</label>
									<input type="file" name="fu-third" id="fu-third" required="required">
								</div>
								<div class="form-wrapper">
									<label for="ftxt-third">Title 3</label>
									<input type="text" class="form-control" name="ftxt-third" id="ftxt-third" required="required">
								</div>
								<div class="form-wrapper">
									<label for="fu-forth">Upload images 4</label>
									<input type="file" name="fu-forth" id="fu-forth" required="required">
								</div>
								<div class="form-wrapper">
									<label for="ftxt-forth">Title 4</label>
									<input type="text" class="form-control" name="ftxt-forth" id="ftxt-forth" required="required">
								</div>
								<div class="checkbox">
									<label>
										I caccept the Terms of Use & Privacy Policy.
										
									</label>
								</div>
								<button type="Submit" id="submit">Submit</button>
							</form>
							
						</div>
					</div>';
					
				}
				else{
					if($data = $response->fetch_assoc())
					{
						$id = $data['id'];
						$hfirst = $data['hfirst'];
						$hsecond = $data['hsecond'];
						$ftext = $data['ftext'];
						$ffile = $data['ffile'];
						$stext = $data['stext'];
						$sfile = $data['sfile'];
						$ttext = $data['ttext'];
						$tfile = $data['tfile'];
						$fotext = $data['fotext'];
						$fofile = $data['fofile'];
						$email = $data['email'];					
					echo '<div class="container-fluid px-5 py-4 text-center">
						<h2 style="text-align:center;">PROFILE DETAILS</h2><hr>
						<h5 >Your Candidate Id : '.$id.'</h5>
						<h2 style="text-transform:uppercase;" class="text-danger">'.$hfirst.'</h2>
						<h4>Position : '.$hsecond.'</h4>
						<p class="my-0 py-0"><b class="text-danger">Email : </b>'.$email.'</p>
						<p class="my-0 py-0"><b class="text-danger">Date : </b>'.$data['own_date'].'</p>
						<div class="row" align="center">
							<div class="col-3">
								<img src="../CreateVotepage/picture/picEK'.$id.'/'.$ffile.'" style="width: 125px;"><br>
								<b>'.$ftext.'</b>
							</div>
							<div class="col-3">
								<img src="../CreateVotepage/picture/picEK'.$id.'/'.$sfile.'" style="width: 125px;"><br>
								<b>'.$stext.'</b>
							</div>
							<div class="col-3">
								<img src="../CreateVotepage/picture/picEK'.$id.'/'.$tfile.'" style="width: 125px;"><br>
								<b>'.$ttext.'</b>
							</div>
							<div class="col-3">
								<img src="../CreateVotepage/picture/picEK'.$id.'/'.$fofile.'" style="width: 125px;"><br>
								<b>'.$fotext.'</b>
							</div>
						</div>
						<br>
						<br>
						<b class="text-primary"> CONTENT NOT EDITABLE</b>
						<p>If you want to change then contact ADMIN</p>

						<h1 class="text-success">THANK YOU</h1>
						<a href="http://localhost/final2/main%20votingpage/index.html" class="btn btn-dark text-warning">GO HOME</a>
					</div>';
					}
				}

			}
			else{
				echo "failed";
			}


		?>
		
		<script>

		$(document).ready(function(){
			$(".vote-submit").submit(function(e){
				e.preventDefault();
				$.ajax({
					type:"POST",
					url :"create.php",
					data:new FormData(this),
					processData:false,
					contentType:false,
					cache:false,
					//beforeSend:function(){},
					success:function(response)
					{
						if(response.trim() == "success")
						{
							alert(response.trim());
							location.reload();
						}
						else{
							alert(response.trim());
						}

					}
				});
				
			});
		});
			
		</script>
	</body>
</html>