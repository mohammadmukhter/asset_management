<?php

$assets_details_class= new Assets_details_class();

$for_category_option= new Assets_category_class();
$for_sub_category_option= new Assets_sub_category_class();

if(isset($_GET['upid']))
{
	$id=$_GET['upid'];

	$data_array=$assets_details_class->first_select($id);
	$data=$data_array->fetch_assoc();
}

if(isset($_POST['update']))
{
	$id=$_GET['upid'];
	$assets_details_class->update_asset($_POST,$id);
}


?>








								<!-- back button start -->
                                    	<a href="?page=assets_details">
                                        <button class="btn btn-danger"><i class="ti-arrow-left"></i> Back</button>
                                   		</a>
								<!-- back button end -->

                                    
                                

  			<form method="POST">
                    <div class="login-form-head">
                        <h4>Update Assets Information </h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="category_name"> Category Name</label><br>

                            <select class="form-control category_name" name="category_name">
                                <?php
                                
                            $data_show=$for_category_option->show();
                            
                            while($data_fetching=$data_show->fetch_assoc())
                            {
                                if($data['category_name']==$data_fetching['id'])
                                {

                                ?>
                                    <option selected="selected" value="<?=$data_fetching['id']?>"> <?=$data_fetching['category_name']?> </option>
                                <?php
                                }
                                else
                                {

                                ?>
                            
                            <option value="<?=$data_fetching['id']?>"> <?=$data_fetching['category_name']?> </option>
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
                                
                                <option>-------select category-------</option>
                            
                            </select>
                        </div>

                        <div class="form-gp">
                            <label for="asset_name">Asset Name </label></br>
                            <input type="text" id="asset_name" name="asset_name" value="<?=$data['asset_name']?>" required> 
                        </div>

                          <div class="form-gp">
                            <label for="asset_model">Asset Model </label></br>
                            <input type="text" id="asset_model" name="asset_model" value="<?=$data['asset_model']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="quantity">Quantity </label></br>
                            <input type="text" id="quantity" name="quantity" value="<?=$data['quantity']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="single_price">Single Price </label></br>
                            <input type="text" id="single_price" name="single_price" value="<?=$data['single_price']?>" required> 
                        </div>

                     

                    

                        <div class="form-gp">
                            <label for="date">Date </label></br>
                            <input type="text" id="date" name="date" value="<?=$data['date']?>" required> 
                        </div>

                        <div class="form-gp">
                            <label for="remarks">Remarks </label></br>
                            <input type="text" id="remarks" name="remarks" value="<?=$data['remarks']?>" required> 
                        </div>

                        <div class="form-gp">

                            <label for="asset_status">Status</label><br>
                            <select name="asset_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
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

    // $('#single_price').keyup(function(){


    //     var quantity=$('#quantity').val();
    //     var single_price=$('#single_price').val();

    //     var total=quantity*single_price;

    //     $('#total_price').val(total);

    // });

    $('.category_name').change(function()
    {
        var category_id= $('.category_name').val();
      
        //alert(category_id);
        $.ajax({
            url:'ajax_calling_category.php',
            type:'POST',
            data:{'category_id':category_id},
            success: function(data) {
                $(".gif").show();

                if(data)
                {
                    $(".gif").hide("slow");
                    $('.sub_category_name').html(data);
                    
                }
                else
                {
                    $(".gif").hide("slow");
                    $('.sub_category_name').html("<option>No Data Found</option>");
                }
                
            }
        });
    });
  
});


</script>