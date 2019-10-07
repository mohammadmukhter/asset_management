<?php

class Assets_category_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();

	}

	public function store($data)
	{
		$category_name=$data['category_name'];
		$category_description=$data['category_description'];
		$category_status=$data['category_status'];

				$category_name_data=$this->db->first("assets_category","category_name='$category_name'")->fetch_assoc();

				
				if(empty($category_name)||empty($category_description)||empty($category_status))
				{
					$this->valid->error("Field is required");
				}
				else if($category_name_data['category_name']==$category_name)
				{
					$this->valid->error("This Category Name already taken.Please choose another Category Name");
				}
				else
				{

	
					$inserted=$this->db->insert("assets_category","category_name='$category_name',category_description='$category_description',status='$category_status'");

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
		return $this->db->select("assets_category");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("assets_category","id='$id'");
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
		return $this->db->first("assets_category","id='$id'");
	}

	public function update_category($data,$id)
	{

		$category_name=$data['category_name'];
		$category_description=$data['category_description'];
		$category_status=$data['category_status'];


		

			if(empty($category_name)||empty($category_description)||empty($category_status))
				{
					$this->valid->error("Field is required");
				}
				
				else
				{
					$updated=$this->db->update("assets_category","category_name='$category_name',category_description='$category_description',status='$category_status'","id='$id'");

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

		
				$data_select=$this->db->first("assets_category","id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['status']=='Active')
				{
					$inactive=$this->db->update("assets_category","status='Inactive'","id='$id'");

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
					$active=$this->db->update("assets_category","status='Active'","id='$id'");

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