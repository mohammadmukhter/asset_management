<?php

class Assets_sub_category_class{

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

	public function store($data)
	{
		$category_name=$data['category_name'];
		$sub_category_name=$data['sub_category_name'];
		$sub_category_description=$data['sub_category_description'];
		$sub_category_status=$data['sub_category_status'];
		
				$sub_category_name_data=$this->db->first("assets_sub_category","sub_category_name='$sub_category_name'")->fetch_assoc();
				

				if(empty($category_name)||empty($sub_category_name)||empty($sub_category_description)||empty($sub_category_status))
				{
					$this->valid->error('field is required');
				}
				else if($sub_category_name_data['sub_category_name']==$sub_category_name)
				{
					$this->valid->error("This Asset Sub Category Name already taken.Please choose another Asset Sub Category Name");
				}
				else
				{
		
	
						$inserted=$this->db->insert("assets_sub_category","category_name='$category_name',sub_category_name='$sub_category_name',sub_category_description='$sub_category_description',status='$sub_category_status'");

						if($inserted)
							{
								$this->valid->success('Data inserted successfully');
							}
							else
							{
								$this->valid->error('Something went worng');
								
							}
				}

	}

	public function show()
	{
		return $this->db->select("assets_sub_category");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("assets_sub_category","id='$id'");
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
		return $this->db->first("assets_sub_category","id='$id'");
	}

	public function update_sub_category($data,$id)
	{

		$category_name=$data['category_name'];
		$sub_category_name=$data['sub_category_name'];
		$sub_category_description=$data['sub_category_description'];
		$sub_category_status=$data['sub_category_status'];

			

		if(empty($category_name)||empty($sub_category_name)||empty($sub_category_description)||empty($sub_category_status))
				{
					$this->valid->error('field is required');
				}
				
				else
				{
					$updated=$this->db->update("assets_sub_category","category_name='$category_name',sub_category_name='$sub_category_name',sub_category_description='$sub_category_description',status='$sub_category_status'","id='$id'");

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

		
				$data_select=$this->db->first("assets_sub_category","id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['status']=='Active')
				{
					$inactive=$this->db->update("assets_sub_category","status='Inactive'","id='$id'");

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
					$active=$this->db->update("assets_sub_category","status='Active'","id='$id'");

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