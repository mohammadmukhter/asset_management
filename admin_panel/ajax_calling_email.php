<?php
	include '../config/config.php';
	include '../database/database.php';
	$db= new Database();

	if(isset($_POST['email']))
	{
		$field_email=$_POST['email'];

		$email_data=$db->first("admin","email='$field_email'")->fetch_assoc();
		

		if($email_data['email']==$field_email)
		{
			echo 'This Email has already been Taken.Please Choose Another Email';
		}


	}

?>