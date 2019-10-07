<?php

class Branch_info_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}


	public function address_data_get($id)
	{
		return $this->db->first("address_info","id='$id'");
	}


	public function store($data)
	{
		$branch_name=$data['branch_name'];
		$branch_address=$data['branch_address'];
		$branch_opening_date=$data['branch_opening_date'];
		$branch_status=$data['branch_status'];

			$branch_name_data=$this->db->first("branch_info","branch_name='$branch_name'")->fetch_assoc();
				

				if(empty($branch_name)||empty($branch_address)||empty($branch_opening_date)||empty($branch_status))
				{
					$this->valid->error('field is required');
				}
				else if($branch_name_data['branch_name']==$branch_name)
				{
					$this->valid->error("This Banch Name already taken!!! .Please choose another Branch Name");
				}
				else
				{

	
						$inserted=$this->db->insert("branch_info","branch_name='$branch_name',branch_address='$branch_address',branch_opening_date='$branch_opening_date',status='$branch_status'");

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
		return $this->db->select("branch_info");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("branch_info","id='$id'");
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
		return $this->db->first("branch_info","id='$id'");
	}

	public function update_branch($data,$id)
	{

		$branch_name=$data['branch_name'];
		$branch_address=$data['branch_address'];
		$branch_opening_date=$data['branch_opening_date'];
		$branch_status=$data['branch_status'];


			
				

				if(empty($branch_name)||empty($branch_address)||empty($branch_opening_date)||empty($branch_status))
				{
					$this->valid->error('field is required');
				}
				
				else
				{
					$updated=$this->db->update("branch_info","branch_name='$branch_name',branch_address='$branch_address',branch_opening_date='$branch_opening_date',status='$branch_status'","id='$id'");

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

		
				$data_select=$this->db->first("branch_info","id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['status']=='Active')
				{
					$inactive=$this->db->update("branch_info","status='Inactive'","id='$id'");

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
					$active=$this->db->update("branch_info","status='Active'","id='$id'");

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