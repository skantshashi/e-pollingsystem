<?php
	require("../php/database.php");
	$email = $_POST['username'];

	$password = $_POST['password'];
	$pwd = md5($password);
	$activate_code = rand(111111,999999);
	$getdata = "SELECT * FROM evote_user WHERE email='$email'";
	$response = $db->query($getdata);
	if($response)
	{
		if($response->num_rows != 0)
		{
			$data = $response->fetch_assoc();
			$pwds = $data['password'];
			$astatus = $data['status'];
			if($pwd == $pwds)
			{
				if($astatus === "Not Active")
				{
					$insert_data = "UPDATE evote_user SET acode='$activate_code' WHERE email='$email'";
					$responses = $db->query($insert_data);
					if($responses)
					{
						$mail = mail($email,"Voting mail","Welcome to the E-Voting .\n\nYour otp is : ".$activate_code);
						if($mail)		
						{
							echo "success";
						}

						
					}
					else{
						echo "retry again later";
					}
				}
				else{
					$cookie_time = time()+(60*60*24*365);
					$_SESSION['_ekeau_'] = $email;
					$emails=base64_encode($email);
					setcookie('_ekeau_',$emails,$cookie_time,'/');
					echo "active";
				}
				
			}
			else{
				echo "Password not matched";
			}

		}
		else{
			echo "Please enter correct email id";
		}
	}	
?>

