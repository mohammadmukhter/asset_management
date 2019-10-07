<?php

class Stock_class{


	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}

		public function join_data()
		{
				return $joining=$this->db->inner_join("assets_details","stock","id,asset_name,asset_model,code,stock_status,stock_id","id","asset_id");

		}





		public function status_change($id)
	{

				$data_select=$this->db->first("stock","stock_id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['stock_status']=='Active')
				{
					$inactive=$this->db->update("stock","stock_status='Inactive'","stock_id='$id'");

					if($inactive)
					{
						$this->valid->success('Status changed successfully');
					}
					else
					{
						$this->valid->error('Something went worng');
					}
				}
				else
				{
					$active=$this->db->update("stock","stock_status='Active'","stock_id='$id'");

					if($active)
					{
						$this->valid->success('Status changed successfully');
					}
					else
					{
						$this->valid->error('Something went worng');
					}
				}
		

	}

}


?>