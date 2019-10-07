<?php

class Address_info_class{

	private $db;
	private $valid;

	public function __construct()
	{
		$this->db= new Database();
		$this->valid= new Validation();
	}


	public function store($data)
	{
		$division=$data['division'];
		$district=$data['district'];
		$street_info=$data['street_info'];
		

			if(empty($division)||empty($district)||empty($street_info))
			{
				$this->valid->error('field is required');
			}
			else
			{
				$inserted=$this->db->insert("address_info","division='$division',district='$district',street_info='$street_info'");

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
		return $this->db->select("address_info");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("address_info","id='$id'");
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
		return $this->db->first("address_info","id='$id'");
	}

	public function update_address($data,$id)
	{

		$division=$data['division'];
		$district=$data['district'];
		$street_info=$data['street_info'];



			if(empty($division)||empty($district)||empty($street_info))
			{
				$this->valid->error('field is required');
			}
			else
			{
				$updated=$this->db->update("address_info","division='$division',district='$district',street_info='$street_info'","id='$id'");

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


	





}


?>