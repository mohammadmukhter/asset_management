<?php
Session::checkAdminLogin();

class Login_class{

		private $db;
		private $validation;
	    public function __construct()
	    {
	    	$this->db=new Database;
	    	$this->validation=new Validation;

	    }
		public function authenticate($data)
		{

			$email=mysqli_real_escape_string($this->db->connection,$this->validation->is_valid($data['email']));
			$password=mysqli_real_escape_string($this->db->connection,$this->validation->is_valid($data['password']));

			$hashed_pass=base64_encode($password);
			$check_data=$this->db->first("admin","email='$email' and password='$hashed_pass'");
			 if($this->db->connection->affected_rows>0)
			{
				 $value=$check_data->fetch_assoc();
             	 Session::set("login",true);
             	 Session::set("email",$value['email']);
                 header('Location:../admin_panel/index.php');
			}
			else

			{
				echo "not data";
			}

		}



}

?>