<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();

if(isset($_POST['distribute_id']))
{
	$distribute_id=$_POST['distribute_id'];
	// echo $distribute_id;

	$distro_data=$db->first("distribute","distribute_id='$distribute_id'")->fetch_assoc();

	$branch_id=$distro_data['branch_name'];
	$asset_code=$distro_data['asset_code'];

	$branch_data=$db->first("branch_info","id='$branch_id'")->fetch_assoc();
	$branch_name=$branch_data['branch_name'];

	$data = array(
    'branch_name' => $branch_name,
    'asset_code' => $asset_code,
	);
	echo json_encode($data);


}


?>