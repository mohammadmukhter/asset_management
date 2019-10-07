<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();


if(isset($_POST['asset_id']))
{
	$asset_id=$_POST['asset_id'];

	$data=$db->first("assets_details","id='$asset_id'");
		$single_price="";
		foreach ($data as $key => $value) {
				$single_price =$value['single_price'];
		}
	echo $single_price;

}

?>