<?php

class Database{


	private $host=SERVER_NAME;
	private $user_name=USER_NAME;
	private $password=PASSWORD;
	private $database_name=DATABASE_NAME;

	public $connection;

	public function __construct()
	{
		$this->connect();
	}

		private function connect()

		{
			$this->connection=new mysqli($this->host,$this->user_name,$this->password,$this->database_name);
			if(!$this->connection)
			{
				echo 'database is not connected';
			}
			
		}


		public function insert($table,$value)
		{
			$insert_query="INSERT INTO $table SET $value";
			$inserted=$this->connection->query($insert_query) or die ("Error".__LINE__);
			if($inserted)
			{
				return $inserted;
			}
			else
			{
				return false;
			}
		}

		public function select($table)
		{
			$select_query="SELECT * FROM $table";
			$selected=$this->connection->query($select_query);
			if($selected)
			{
				return $selected;
			}
		}

		public function delete($table,$condition)

			{
				$delete="DELETE FROM $table WHERE $condition";
				$deleted=$this->connection->query($delete) or die ("Error".__LINE__);
				if($deleted)
				{
					return $deleted;
				}
			}


		public function first($table,$condition)
			{
				$first_select="SELECT * FROM $table WHERE $condition";
				$first_data=$this->connection->query($first_select) or die ("Error".__LINE__);
				if($first_data)
				{
					return $first_data;
				}
			}

		public function update($table,$value,$condition)
			{
				$update_query="UPDATE $table SET $value WHERE $condition";
				$updated=$this->connection->query($update_query) or die ("Error".__LINE__);
				if($updated)
				{
					return $updated;
				}
			}

			public function inner_join($table1,$table2,$column,$column1,$column2)
			{
				$join_query="SELECT $column FROM $table1 INNER JOIN $table2 ON $table1.$column1= $table2.$column2";
				$joined=$this->connection->query($join_query) or die ("Error".__LINE__);
				if($joined)
				{
					return $joined;
				}
			}

			


		

}

?>
