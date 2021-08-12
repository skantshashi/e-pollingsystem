<?php
	require("../php/database.php");
	$email = $_POST['email'];
	$code = $_POST['vcode'];
	$get_data="SELECT acode FROM evote_user WHERE email='$email'";
	$response = $db->query($get_data);
	if($response)
	{
		if($fetch_data = $response->fetch_assoc())
		{
			$get_code = $fetch_data['acode'];
			if($get_code == $code)
			{
				$insert_data = "UPDATE evote_user SET status='Active' WHERE email='$email'";
				$responses = $db->query($insert_data);
				if($responses)
				{
					$cookie_time = time()+(60*60*24*365);
					$_SESSION['_ekeau_'] = $email;
					$emails=base64_encode($email);
					setcookie('_ekeau_',$emails,$cookie_time,'/');
					echo "success";
				}
				else{
					$cookie_time = time()+(60*60*24*365);
					$_SESSION['_ekeau_'] = $email;
					$emails=base64_encode($email);
					setcookie('_ekeau_',$emails,$cookie_time,'/');
					echo "success";
				}
				
			}
			else{
				echo "Verification code is incorrect";
			}
		}
	}



?>