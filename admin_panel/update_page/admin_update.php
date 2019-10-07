<?php

$admin_class= new Admin_class();

$for_branch_option= new Branch_info_class();

if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$admin_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$admin_class->update_admin($id,$_POST);
}


?>








								<!-- back button start -->
                                    	<a href="?page=admin">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST" >
                    <div class="login-form-head">
                        <h4>Update Admin Information</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="name">Name</label></br>
                            <input type="text" id="name" name="name" value="<?=$data['name']?>" required > 
                        </div>

                        <div class="form-gp">
                            <label for="f_name">Father Name</label></br>
                            <input type="text" id="f_name" name="f_name" value="<?=$data['f_name']?>" required > 
                        </div>

                        <div class="form-gp">
                            <label for="m_name">Mother Name</label></br>
                            <input type="text" id="m_name" name="m_name" value="<?=$data['m_name']?>" required > 
                        </div>

                        

                        <div class="form-gp">
                            <label for="address">Address</label></br>
                            <input type="text" id="address" name="address" value="<?=$data['address']?>" required > 
                        </div>

                       

                        <div class="form-gp">
                            <label for="email">Email</label></br>
                            <input type="email" id="email" name="email" value="<?=$data['email']?>" required > 
                        </div>

                        
                        <div class="form-gp">
                            <label for="password">Password</label></br>
                            <input type="password" id="password" name="password" value="<?=$data['password']?>" required > 
                        </div>

                        <div class="form-gp">
                            <label for="confirm_password">Confirm Password</label></br>
                            <input type="password" id="confirm_password" name="confirm_password" required > 
                        </div>

                        <div class="form-gp">
                            <label for="branch_name"> Branch Name</label><br>

                            <select class="form-control" name="branch_name">
                                <?php
                            $branch_data_show=$for_branch_option->show();
                            
                            while($branch_data_fetching=$branch_data_show->fetch_assoc())
                            {
                                if($data['branch_name']==$branch_data_fetching['id'])
                                {
                                    ?>

                                    <option selected="selected" value="<?=$branch_data_fetching['id']?>"><?=$branch_data_fetching['branch_name']?></option>
                                <?php
                            }
                            else
                            {
                                ?>
                            
                            <option value="<?=$branch_data_fetching['id']?>"><?=$branch_data_fetching['branch_name']?></option>
                            <?php
                            }
                        }
                            ?>
                            
                            </select>

                        </div>
                        
                        <div >
                            <label for="image">Image</label>
                            <br>
                            <input type="file" id="image" name="image" value="<?=$data['image']?>"> 
                        </div>


                        <div class="form-gp">

                            <label for="admin_status">Status</label><br>
                            <select name="admin_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
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

                                    	
                                        <button name="update"> Update </button>
                                   		
                                   
                                </div>
                                <div class="col-4">
                            	</div>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                </form>

