<?php

$branch_info_class= new Branch_info_class();
$for_address_option= new Address_info_class();

if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$branch_info_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$branch_info_class->update_branch($_POST,$id);
}


?>








								<!-- back button start -->
                                    	<a href="?page=branch_info">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST">
                    <div class="login-form-head">
                        <h4>Update Branch Information</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="branch_name">Branch Name</label></br>
                            <input type="text" id="branch_name" name="branch_name" value="<?=$data['branch_name']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="branch_address"> Branch Address</label><br>

                            <select class="form-control" name="branch_address">
                                <?php
                            $address_data_show=$for_address_option->show();
                            
                            while($address_data_fetching=$address_data_show->fetch_assoc())
                            {

                                if($data['branch_address']==$address_data_fetching['id'])
                                {
                                    ?>
                                    <option selected="selected" value="<?=$address_data_fetching['id']?>"> <?=$address_data_fetching['street_info']?>,<?=$address_data_fetching['district']?>,<?=$address_data_fetching['division']?> </option>
                                <?php
                            }
                            else
                            {
                            
                                 ?>

                            <option value="<?=$address_data_fetching['id']?>"> <?=$address_data_fetching['street_info']?>,<?=$address_data_fetching['district']?>,<?=$address_data_fetching['division']?> </option>
                            <?php
                            
                             }
                         }
                            ?>
                            
                            </select>

                        </div>

                        <div class="form-gp">
                            <label for="branch_opening_date">Branch Opening Date</label></br>
                            <input type="date" id="branch_opening_date" name="branch_opening_date" value="<?=$data['branch_opening_date']?>" required> 
                        </div>

                        <div class="form-gp">

                            <label for="branch_status">Status</label><br>
                            <select name="branch_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
                                <?php
			                	if($data['status']=='Active')
			                	{
			                		?>
				                <option value="Active">Active</option>
				                <option value="Inactive">Inactive</option>
				                <?php
				            	}
				            	else
				            	{
				            		?>
				                <option value="Inactive">Inactive</option>
				                <option value="Active">Active</option>
				                <?php
				            	}
				            	?>
                                
                            </select>
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
