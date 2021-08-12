<?php
	require("../php/database.php");
	$email = $_POST['username'];
	$password = $_POST['password'];
	$pwd = md5($password);
	$activate_code = rand(111111,999999);
	$getdata = "SELECT * FROM users WHERE email='$email'";
	$response = $db->query($getdata);
	if($response)
	{
		if($response->num_rows != 0)
		{
			$data = $response->fetch_assoc();
			$pwds = $data['password'];
			if($pwd == $pwds)
			{
				$insert_data = "UPDATE users SET acode='$activate_code' WHERE email='$email'";
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
				echo "Incorrect Password";
			}

		}
		else{
			echo "Please enter correct email id";
		}
	}	
?>
