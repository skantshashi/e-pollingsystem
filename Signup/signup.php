<?php
require("../php/database.php");

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$pwd = md5($password);

$status="Not Active";
$getdata = "SELECT * FROM evote_user WHERE email='$email'";
$response = $db->query($getdata);
if($response)
{
	if($response->num_rows == 0)
	{
		$insert_data = "INSERT INTO evote_user(firstname,lastname,email,username,password,status) VALUES('$fname','$lname','$email','$username','$pwd','$status')";
		$insert_resp = $db->query($insert_data);
		if($insert_resp)
		{
			header("Location:../elogin/loginpage.html");			
		}
		else{
			echo "faild";
		}
	}
	else{
		echo "already";
	}
}
else{
	echo "ef";
}

?>