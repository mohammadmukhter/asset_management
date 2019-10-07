<?php

class Assets_details_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}


				public function category_data_get($id)
				{
					return $this->db->first("assets_category","id='$id'");
				}

				public function sub_category_data_get($id)
				{
					return $this->db->first("assets_sub_category","id='$id'");
				}
	

	public function store($data)
	{
		$category_name=$data['category_name'];
		$sub_category_name=$data['sub_category_name'];
		$asset_name=$data['asset_name'];
		$asset_model=$data['asset_model'];
		$quantity=$data['quantity'];
		$single_price=$data['single_price'];
		$date=$data['date'];
		$remarks=$data['remarks'];
		$asset_status=$data['asset_status'];


			$asset_model_data=$this->db->first("assets_details","asset_model='$asset_model'")->fetch_assoc();
				

				if(empty($category_name)||empty($sub_category_name)||empty($asset_name)||empty($asset_model)||empty($quantity)||empty($single_price)||empty($date)||empty($remarks)||empty($asset_status))
				{
					$this->valid->error('field is required');
				}
				else if($asset_model_data['asset_model']==$asset_model)
				{
					$this->valid->error("This Asset Model Number already taken.Please choose another Asset Model Number");
				}
				else
				{
		
	
					$inserted=$this->db->insert("assets_details","category_name='$category_name',sub_category_name='$sub_category_name',asset_name='$asset_name',asset_model='$asset_model',quantity='$quantity',single_price='$single_price',date='$date',remarks='$remarks',status='$asset_status'");

					if($inserted)
						{
							$this->valid->success('Data inserted successfully');
						}
						else
						{
							$this->valid->error('Something went worng');
							
						}

				}



					

					$asset_data=$this->db->first("assets_details","asset_name='$asset_name'")->fetch_assoc();
					$asset_id=$asset_data['id'];
					$asset_quantity=$asset_data['quantity'];
					$asset_status=$asset_data['status'];
					
					

					for($i=1; $i <= $asset_quantity; $i++)
					{
							$uni_code=time()+$i;
							$code=$asset_name."--".$uni_code;

							$stocked=$this->db->insert("stock","asset_id='$asset_id',code='$code',stock_status='$asset_status'");
					}
			

	}

	public function show()
	{
		return $this->db->select("assets_details");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("assets_details","id='$id'");
		if($destroyed)
		{
			$this->valid->success('Data deleted successfully');
		}
		else
		{
			$this->valid->error('Something went worng');
			
		}
	}


	public function first_select($id)
	{
		return $this->db->first("assets_details","id='$id'");
	}


	public function update_asset($data,$id)
	{

		$category_name=$data['category_name'];
		$sub_category_name=$data['sub_category_name'];
		$asset_name=$data['asset_name'];
		$asset_model=$data['asset_model'];
		$quantity=$data['quantity'];
		$single_price=$data['single_price'];
	
		$date=$data['date'];
		$remarks=$data['remarks'];
		$asset_status=$data['asset_status'];

			

		if(empty($category_name)||empty($sub_category_name)||empty($asset_name)||empty($asset_model)||empty($quantity)||empty($single_price)||empty($date)||empty($remarks)||empty($asset_status))
				{
					$this->valid->error('field is required');
				}
				
				else
				{
					$updated=$this->db->update("assets_details","category_name='$category_name',sub_category_name='$sub_category_name',asset_name='$asset_name',asset_model='$asset_model',quantity='$quantity',single_price='$single_price',date='$date',remarks='$remarks',status='$asset_status'","id='$id'");

							if($updated)
								{
									$this->valid->success('Data updated successfully');
								}
								else
								{
									$this->valid->error('Something went worng');
								}

				}


	}


	public function status_change($id)
	{

		
				$data_select=$this->db->first("assets_details","id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['status']=='Active')
				{
					$inactive=$this->db->update("assets_details","status='Inactive'","id='$id'");

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
					$active=$this->db->update("assets_details","status='Active'","id='$id'");

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