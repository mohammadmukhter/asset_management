<?php

class Distribution_list_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}



		public function branch_name_get($id)
		{
			return $this->db->first("branch_info","id='$id'");
		}


	public function insert_distro($data)
	{
		$branch_name=$data['branch_name'];
		$asset_name=$data['asset_name'];
		$asset_model=$data['asset_model'];
		$asset_code=$data['asset_code'];
		$date=$data['distro_date'];

		$stock_id=$data['stock_id'];
		$stock_status=$data['stock_status'];
		$asset_id=$data['asset_id'];


		if(empty($branch_name)||empty($asset_name)||empty($asset_model)||empty($asset_code)||empty($stock_id)||empty($asset_id)||empty($date))
		{
			$this->valid->error("Field is required");
		}
		else if($stock_status=='Active')
		{
			$distributed=$this->db->insert("distribute","branch_name='$branch_name',stock_id='$stock_id',asset_id='$asset_id',asset_name='$asset_name',asset_model='$asset_model',asset_code='$asset_code',date='$date'");


			$this->db->update("stock","stock_status='Inactive'","stock_id='$stock_id'");


				if($distributed)
				{
					$this->valid->success("Asset Distributed successfully");
				}
				else
				{
					$this->valid->error("something went wrong");
				}



				
		}
		else
		{
			$this->valid->error("This Asset Already distributed");
		}
		
	}







	public function show()
	{
		return $this->db->select("distribute");
	}


	
}

?>