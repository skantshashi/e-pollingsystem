<?php
	require("../php/database.php");
	$email = $_POST['email'];
	$code = $_POST['vcode'];
	$get_data="SELECT acode FROM users WHERE email='$email'";
	$response = $db->query($get_data);
	if($response)
	{
		if($fetch_data = $response->fetch_assoc())
		{
			$get_code = $fetch_data['acode'];
			if($get_code == $code)
			{
				$cookie_time = time()+(60*60*24*365);
				$_SESSION['_ekcau_'] = $email;
				$emails=base64_encode($email);
				setcookie('_ekcau_',$emails,$cookie_time,'/');
				echo "success";
				
			}
			else{
				echo "Verification code is incorrect";
			}
		}
	}



?>