<?php

class Admin_class{


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

	


	public function store($data,$files)
	{
		$name=$data['name'];
		$f_name=$data['f_name'];
		$m_name=$data['m_name'];
		$address=$data['address'];
		$email=$data['email'];
		$password=$data['password'];
		$confirm_password=$data['confirm_password'];
		$branch_name=$data['branch_name'];
		$admin_status=$data['admin_status'];

			$email_data=$this->db->first("admin","email='$email'")->fetch_assoc();
			

		if($email_data['email']==$email)
			{
				$this->valid->error('This Email has already been Taken.Please Choose Another Email');
			}
			
		else if(empty($name)||empty($f_name)||empty($m_name)||empty($address)||empty($email)||empty($branch_name))
			{
				$this->valid->error('Field is required');
			}

		else if($password==$confirm_password)
			
			{
				$crypted=base64_encode($password);
				$image_path="upload/";
				$image_unique_name=time()."."."jpg";
				$image_tmp_name=$files['image']['tmp_name'];
				$image_full_path=$image_path.$image_unique_name;
				move_uploaded_file($image_tmp_name, $image_full_path);

				 $inserted=$this->db->insert("admin","name='$name',f_name='$f_name',m_name='$m_name',address='$address',email='$email',password='$crypted',branch_name='$branch_name',image='$image_full_path',status='$admin_status'");

					if($inserted)
						{
							$this->valid->success('Data inserted successfully');
						}
						else
						{
							$this->valid->error('Something went worng');
							
						}

			}
		else
			{
				$this->valid->error("Password doesn't matched ");
			}

			
			

	}



	public function show()
	{
		return $this->db->select("admin");
	}



	public function destroy($id)
	{
		$destroyed=$this->db->delete("admin","id='$id'");
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
		return $this->db->first("admin","id='$id'");
	}


	public function update_admin($id,$data)
	{

		$name=$data['name'];
		$f_name=$data['f_name'];
		$m_name=$data['m_name'];
		$address=$data['address'];
		$email=$data['email'];
		$password=$data['password'];
		$confirm_password=$data['confirm_password'];
		$branch_name=$data['branch_name'];
		$admin_status=$data['admin_status'];

			
		if(empty($name)||empty($f_name)||empty($m_name)||empty($address)||empty($email)||empty($branch_name))
			{
				echo 'Field is required';
			}

		else if($password==$confirm_password)
			
		{
			$crypted=base64_encode($password);



			$inserted=$this->db->update("admin","name='$name',f_name='$f_name',m_name='$m_name',address='$address',email='$email',password='$crypted',branch_name='$branch_name',status='$admin_status'","id='$id'");

				if($inserted)
					{
						$this->valid->success('Data updated successfully');
					}
					else
					{
						$this->valid->error('Something went worng');
					}


				}
				else
				{
					$this->valid->error('Password dose not matched');
				}
	}


	public function status_change($id)
	{

	

		
				$data_select=$this->db->first("admin","id='$id'");
				$data=$data_select->fetch_assoc();

				if($data['status']=='Active')
				{
					$inactive=$this->db->update("admin","status='Inactive'","id='$id'");

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
					$active=$this->db->update("admin","status='Active'","id='$id'");

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
