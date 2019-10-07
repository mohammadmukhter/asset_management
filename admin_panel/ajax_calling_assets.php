<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();

if(isset($_POST['sub_category_id']))
{
	$id=$_POST['sub_category_id'];

	$data=$db->first("assets_details","sub_category_name='$id'");

	$table="";

	foreach ($data as $key => $value) {
		$table.="<option value=".$value['id'].">".$value['asset_name']."</option>";
	
	}

	echo $table;
}


?>