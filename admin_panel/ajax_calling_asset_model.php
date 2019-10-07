<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();


if(isset($_POST['asset_id']))
{
	$asset_id=$_POST['asset_id'];

	$data=$db->first("assets_details","id='$asset_id'");
		$asset_model="";
		foreach ($data as $key => $value) {
				$asset_model =$value['asset_model'];
				
		}
	echo $asset_model;

}

?>