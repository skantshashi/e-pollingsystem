<?php
require("../php/database.php");

$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$age = $_POST['Age'];
$gender = $_POST['Gender'];
$phone = $_POST['Phone'];
$address = $_POST['address'];
$state = $_POST['State'];
$city = $_POST['city'];
$pincode = $_POST['Pincode'];
$province = $_POST['province'];
$id_num = $_POST['id_number'];
$email = $_POST['emailAddress'];
$password = $_POST['password'];


$pwd = md5($password);


$getdata = "SELECT * FROM users WHERE email='$email'";
$response = $db->query($getdata);
if($response)
{
	if($response->num_rows == 0)
	{
		$insert_data = "INSERT INTO users(first_name,last_name,age,gender,phone,address,state,city,pincode,id_type,id_number,email,password) VALUES('$fname','$lname','$age','$gender','$phone','$address','$state','$city','$pincode','$province','$id_num','$email','$pwd')";
		$insert_resp = $db->query($insert_data);
		if($insert_resp)
		{
			header("Location:../login/loginpage.html");				
		}
		else{
			echo "failed";
		}
	}
	else{
		echo "<html>
		<body>
		<center>
		<h1>This Gmail id is Already Registered</h1>
		</center>
		</body>
		</html>";
	}
}
else{
	echo "ef";
}

?>