<html>
<style>
.image_1:hover{
	background-color:red;
	text-decoration:underline;

}.image_2:hover{
	background-color:red;
	text-decoration:underline;

}
.image_3:hover{
	background-color:red;
	text-decoration:underline;

}
.image_4:hover{
	background-color:red;
	text-decoration:underline;
}
.image_1:active{
	background-color:blue; 

}.image_2:active{
	background-color:blue; 

}
.image_3:active{
	background-color:blue; 

}
.image_4:active{
	background-color:blue; 

}
.image_1:visited{
	color:green; 

}.image_2:visited{
	color:green; 

}
.image_3:visited{
	color:green; 

}
.image_4:visited{
color:green; 

}
.vote_image:hover{
	color:green;
}



</style>
<?php
require("../php/database.php");
$id = $_POST['id'];
$email = $_POST['email'];
	$get_data="SELECT * FROM own_vote WHERE id='$id' AND email='$email'";
	$response = $db->query($get_data);
	if($response)
	{
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
			echo '<div style="border:1px solid #ccc; padding: 15px; background-color: white">
					<h3 class="text-center text-danger">Candidate No : '.$id.'</h3>
					<h4><b class="text-danger">Candidate Name : </b>'.$hfirst.'</h4>
					<h5><b class="text-danger">Position : </b>'.$hsecond.'</h5>
					<p class="my-0 py-0"><b class="text-danger">Email : </b>'.$email.'</p>
					<p class="my-0 py-0"><b class="text-danger">Date : </b>'.$data['own_date'].'</p>
					<div class="row" align="center">
					
						<div class="col-3 image_1">
							<img src="../CreateVotepage/picture/picEK'.$id.'/'.$ffile.'" style="width: 125px;"><br>
							<b>'.$ftext.'</b>
						</div>
						<div class="col-3 image_2">
							<img src="../CreateVotepage/picture/picEK'.$id.'/'.$sfile.'" style="width: 125px;"><br>
							<b>'.$stext.'</b>
						</div>
						<div class="col-3 image_3">
							<img src="../CreateVotepage/picture/picEK'.$id.'/'.$tfile.'" style="width: 125px;"><br>
							<b>'.$ttext.'</b>
						</div>
						<div class="col-3 image_4">
							<img src="../CreateVotepage/picture/picEK'.$id.'/'.$fofile.'" style="width: 125px;"><br>
							<b>'.$fotext.'</b>
						</div>
					</div>
					
					<hr>
					<div align="center ">
						<button class="btn text-light vote-for btn-primary"  cid="'.$id.'" cname="'.$hfirst.'" cemail="'.$email.'">Submit</button>
					</div>
					<div 
				</div>';

		}
	}



?>
</html>