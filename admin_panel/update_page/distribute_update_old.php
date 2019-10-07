<?php

$distribute_class= new Distribute_class();

$for_branch_option= new Branch_info_class();
$for_category_option= new Assets_category_class();


if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$distribute_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$distribute_class->update_distribute($_POST,$id);
}


?>








								<!-- back button start -->
                                    	<a href="?page=distribute">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST">
                    <div class="login-form-head">
                        <h4>Update Branch Information</h4>
                        
                    </div>
                    <div class="login-form-body">
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

                        <div class="form-gp">
                            <label for="category_name"> Category Name</label><br>

                            <select class="form-control category_name" name="category_name">
                                 <?php
                            $category_data_show=$for_category_option->show();

                            ?>
                            <?php


                            while($category_data_fetching=$category_data_show->fetch_assoc())
                            {

                                if($data['category_name']==$category_data_fetching['id'])
                                {
                                    ?>
                                     <option selected="selected" value="<?=$category_data_fetching['id']?>"><?=$category_data_fetching['category_name']?></option>
                                     <?php
                                }
                                else
                                {                                
                                ?>

                            <option value="<?=$category_data_fetching['id']?>"><?=$category_data_fetching['category_name']?></option>
                              
                            <?php
                        }
                        }
                            ?>
                            
                            </select>

                        </div>

                        <div style="text-align: center;">
                            <img style="height: 30px;display: none;"  class="gif" src="assets/images/load.gif">
                        </div>


                        <div class="form-gp">
                            <label for="sub_category_name">Sub Category- Name</label><br>

                                <select class="form-control sub_category_name" name="sub_category_name">
                                
                               <option>-----select category-----</option>
                            
                            </select>
                            
                        </div>

                        <div style="text-align: center;">
                            <img style="height: 30px;display: none;"  class="gif_asset" src="assets/images/load.gif">
                        </div>


                        <div class="form-gp">
                            <label for="asset_name"> Asset Name</label><br>

                            <select class="form-control asset_name" name="asset_name">
                                <option>-----select sub category-----</option>
                            
                            </select>

                        </div>

                       

                        <div class="form-gp">
                            <label for="quantity">Quantity</label></br>
                            <input type="text" id="quantity" name="quantity" value="<?=$data['quantity']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="amount">Amount</label></br>
                            <input type="text" id="amount" name="amount" value="<?=$data['amount']?>" required> 
                        </div>

                         
                       

                      

                        <div class="form-gp">
                            <label for="remarks">Remarks</label></br>
                            <input type="text" id="remarks" name="remarks" value="<?=$data['remarks']?>" required> 
                        </div>
                        <div class="form-gp">

                            <label for="distribute_status">Status</label><br>
                            <select name="distribute_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
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

<script>
    
$(document).ready(function(){

     $('.category_name').change(function(){

        var category_id= $('.category_name').val();

        $.ajax({

        url:'ajax_calling_category.php',
        type:'POST',
        data:{'category_id':category_id},

        success:function(data)
        {
            $(".gif").show();
            if(data)
            {
                $(".gif").hide("slow");
                $('.sub_category_name').html(data);
            }
            else
            {
                $(".gif").hide("slow");
                $('.sub_category_name').html('<option>No Data Found</option>');
            }
        }


       });


    });



     $('.sub_category_name').change(function(){

        var sub_category_id= $('.sub_category_name').val();

        $.ajax({


            url:'ajax_calling_assets.php',
            type:'POST',
            data:{'sub_category_id':sub_category_id},

            success:function(data){

                $(".gif_asset").show();
                
                if(data)
                {
                    $(".gif_asset").hide("slow");
                    $('.asset_name').html(data);
                }
                else
                {
                    $(".gif_asset").hide("slow");
                    $('.asset_name').html('<option> No data found </option>');
                }
            }
        });

     });

});

</script>