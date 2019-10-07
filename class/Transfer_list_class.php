<?php

class Transfer_list_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}


			public function branch_data_get($id)
			{
				return $this->db->first("branch_info","id='$id'");
			}
			

	public function insert_transfer($data)
	{
		$distribute_id=$data['distribute_id'];


			$to_receive=$data['to_receive'];
			$transfer_date=$data['transfer_date'];

		$distro_data=$this->db->first("distribute","distribute_id='$distribute_id'")->fetch_assoc();

			$transfer_from=$distro_data['branch_name'];
			$stock_id=$distro_data['stock_id'];
			$asset_id=$distro_data['asset_id'];
			$asset_name=$distro_data['asset_name'];
			$asset_model=$distro_data['asset_model'];
			$asset_code=$distro_data['asset_code'];

			if(empty($to_receive)||empty($transfer_date))
			{
				$this->valid->error("Field is required");
			}
			else if($transfer_from== $to_receive)
			{
				$this->valid->error("Sorry, cannot transfer to same branch. please choose another branch.");
			}
			else
			{
				$this->db->update("distribute","branch_name='$to_receive'","distribute_id='$distribute_id'");

				$transferd=$this->db->insert("transfer","transfer_from='$transfer_from',to_receive='$to_receive',stock_id='$stock_id',asset_id='$asset_id',asset_name='$asset_name',asset_model='$asset_model',asset_code='$asset_code',date='$transfer_date'");

				if($transferd)
				{
					$this->valid->success("Asset Transferd Successfully");
				}
				else
				{
					$this->valid->error("Something went worng");
				}
			}

	}



	public function show_transfer()
	{
		return $this->db->select("transfer");
	}


}

?>