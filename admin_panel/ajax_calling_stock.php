<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();


if(isset($_POST['stock_id']))
{
	$stock_id= $_POST['stock_id'];

	// echo $stock_id;

	$stock_data=$db->first("stock","stock_id='$stock_id'")->fetch_assoc();

	$asset_id= $stock_data['asset_id'];
	$asset_code= $stock_data['code'];



	$asset_data=$db->first("assets_details","id='$asset_id'")->fetch_assoc();

	$asset_name= $asset_data['asset_name'];
	$asset_model= $asset_data['asset_model'];


	// echo $asset_name;
	// echo $asset_model;
	// echo $asset_code;

	$data = array(
    'asset_name' => $asset_name,
    'asset_model' => $asset_model,
    'asset_code' => $asset_code,
	);
	echo json_encode($data);



}

?>