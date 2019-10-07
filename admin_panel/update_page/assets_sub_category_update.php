<?php

$assets_sub_category_class= new Assets_sub_category_class();

$for_category_option= new Assets_category_class();

if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$assets_sub_category_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$assets_sub_category_class->update_sub_category($_POST,$id);
}


?>








								<!-- back button start -->
                                    	<a href="?page=assets_sub_category">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST">
                    <div class="login-form-head">
                        <h4>Update Assets Sub Category</h4>
                        
                    </div>
                    <div class="login-form-body">

                       <div class="form-gp">
                            <label for="category_name"> Category Name</label><br>

                            <select class="form-control" name="category_name">
                                <?php

                            $data_show=$for_category_option->show();
                            
                            while($data_fetching=$data_show->fetch_assoc())
                            {

                                if($data['category_name']==$data_fetching['id'])
                                {
                                ?>

                                     <option selected="selected" value="<?=$data_fetching['id']?>"><?=$data_fetching['category_name']?></option>
                                  <?php
                                    }
                                  else
                                  {
                                    ?>
                                          <option value="<?=$data_fetching['id']?>"><?=$data_fetching['category_name']?></option>
                                    <?php
                                  }
                        }
                            ?>
                            
                            </select>

                        </div>

                        <div class="form-gp">
                            <label for="sub_category_name">Sub- Category Name</label></br>
                            <input type="text" id="sub_category_name" name="sub_category_name" value="<?=$data['sub_category_name']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="sub_category_description">Sub- Category Description </label></br>
                            <input type="text" id="sub_category_description" name="sub_category_description" value="<?=$data['sub_category_description']?>" required> 
                        </div>

                        <div class="form-gp">

                            <label for="sub_category_status">Status</label><br>
                            <select name="sub_category_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
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
