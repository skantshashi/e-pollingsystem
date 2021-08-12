<?php
require("../php/database.php");
$username  = base64_decode($_COOKIE['_ekcau_']);
$hfirst = $_POST['votefirst'];
$hsecond = $_POST['votesnd'];

$ftxt = $_POST['ftxt-first'];
$ffile = $_FILES['fu-first'];
$ffile_name = $ffile['name'];
$ftmp_name = $ffile['tmp_name'];

$stxt = $_POST['ftxt-second'];
$sfile = $_FILES['fu-second'];
$sfile_name = $sfile['name'];
$stmp_name = $sfile['tmp_name'];

$ttxt = $_POST['ftxt-third'];
$tfile = $_FILES['fu-third'];
$tfile_name = $tfile['name'];
$ttmp_name = $tfile['tmp_name'];

$fotxt = $_POST['ftxt-forth'];
$fofile = $_FILES['fu-forth'];
$fofile_name = $fofile['name'];
$fotmp_name = $fofile['tmp_name'];


$insert_data = "INSERT INTO own_vote(hfirst,hsecond,ftext,ffile,stext,sfile,ttext,tfile,fotext,fofile,email) VALUES('$hfirst','$hsecond','$ftxt','$ffile_name','$stxt','$sfile_name','$ttxt','$tfile_name','$fotxt','$fofile_name','$username')";
$insert_resp = $db->query($insert_data);
if($insert_resp)
{
	$get_data="SELECT id FROM own_vote WHERE email='$username' AND hfirst='$hfirst'";
	$response = $db->query($get_data);
	if($response)
	{
		if($fetch_data = $response->fetch_assoc())
		{
			$get_id = $fetch_data['id'];
			$fname = "picEK".$get_id;
			mkdir("picture/".$fname);
			move_uploaded_file($ftmp_name,"picture/".$fname."/".$ffile_name);
			move_uploaded_file($stmp_name,"picture/".$fname."/".$sfile_name);
			move_uploaded_file($ttmp_name,"picture/".$fname."/".$tfile_name);
			move_uploaded_file($fotmp_name,"picture/".$fname."/".$fofile_name);
			echo "success";
		}
		else{
			echo "!faild Try again later";
		}
	}
	else{
		echo "!faild Try again later";
	}
					
}
else{
	echo "faild";
}
	//move_uploaded_file($pictmp_name,"picture/"_name)


?>



