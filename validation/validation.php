<?php

class Validation 
{



	public function is_valid($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	
	public function success($msg)
	{
		echo "<div class='alert alert-success alert-dismissible text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong> Success! </strong> $msg </div>";
	}

	public function error($msg)
	{
		echo "<div class='alert alert-danger alert-dismissible text-center'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong> Error! </strong> $msg </div>";
	}
	
}