<?php
	include '../config/config.php';
	include '../database/database.php';

	$db=new Database;

	if (isset($_POST['category_id'])) 
	{

		//echo $_POST['category_id'];
		$id=$_POST['category_id'];
		$data=$db->first("assets_sub_category","category_name='$id'");
		$table="";
		foreach ($data as $key => $value) {
				$table.="<option value=".$value['id'].">".$value['sub_category_name']."</option>";
		}
		echo $table;
	}
?>