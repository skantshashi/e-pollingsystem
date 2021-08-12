<?php
require("../php/database.php");
$cid = $_POST['cid'];
$cname = $_POST['cname'];
$cemail = $_POST['cemail'];
$username  = base64_decode($_COOKIE['_ekeau_']);
$get_data="SELECT * FROM evote_user WHERE email='$username'";
$response = $db->query($get_data);
if($response)
{
	if($data = $response->fetch_assoc())
	{
		$id = $data['id'];
		$fname = $data['firstname'];
		$lname = $data['lastname'];
		$vname = $fname.' '.$lname;
		$insert_data = "INSERT INTO vote(voter_name,voter_email,voter_id,candidate_name,candidate_email,candidate_id) VALUES('$vname','$username','$id','$cname','$cemail','$cid')";
		$insert_resp = $db->query($insert_data);
		if($insert_resp)
		{
			echo "success";
		}
	}
}
			
?>