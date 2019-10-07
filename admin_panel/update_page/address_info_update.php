<?php

$address_info_class= new Address_info_class();

if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$address_info_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$address_info_class->update_address($_POST,$id);
}


?>








								<!-- back button start -->
                                    	<a href="?page=address_info">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST">
                    <div class="login-form-head">
                        <h4>Update Address Information</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="division">Division</label></br>
                            <input type="text" id="division" name="division" value="<?=$data['division']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="district">District </label></br>
                            <input type="text" id="district" name="district" value="<?=$data['district']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="street_info">Street Info </label></br>
                            <input type="text" id="street_info" name="street_info" value="<?=$data['street_info']?>" required> 
                        </div>

                        
                       

                        

                        <div class="submit-btn-area">
                           
                            <div class="login-other row mt-4">

                                <div class="col-4">
                                </div>

                                <div class="col-4">
                                    <a href="#">
                                        <button id="form_submit" type="submit" name="update">Update <i class="ti-arrow-right"></i></button>
                                    </a>
                                </div>

                                <div class="col-4">
                                </div>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                </form>
