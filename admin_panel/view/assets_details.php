<?php

$assets_details_class= new Assets_details_class();

$for_category_option= new Assets_category_class();
$for_sub_category_option= new Assets_sub_category_class();





if(isset($_POST['submit']))
{
    $assets_details_class->store($_POST);
   
}

if(isset($_GET['delid']))
{
    $id=$_GET['delid'];
    $assets_details_class->destroy($id);
}

if(isset($_GET['status_id']))
{
    $id=$_GET['status_id'];
    $assets_details_class->status_change($id);
    
}

?>



        <!-- main content area start -->
        <div class="main-content">
         
            <div class="main-content-inner">
                <div class="row">
                  
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
            <!-- modal start -->
            <div style="text-align: right; margin-right: 50px; margin-top: 50px; margin-bottom: -25px;">  
              <!-- Trigger the modal with a button -->
 
                <a href="" alt="Add Asset"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" style="font-size:30px;color:green; margin-right: 10px;"></i></a>
                <a href="" class="print_this_page"><i style="font-size:30px;" class="fa fa-print"></i></a>
        
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  
                    <!-- form start -->

                       
        
            
                <form method="POST">
                    <div class="login-form-head">
                        <h4>Add Asset</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="category_name"> Category Name</label><br>

                            <select  class="form-control category_name" name="category_name">
                                <option>--Select--</option>
                                <?php
                            $data_show=$for_category_option->show();
                            
                            while($data_fetching=$data_show->fetch_assoc())
                            {
                                
                                ?>
                            <option value="<?=$data_fetching['id']?>"><?=$data_fetching['category_name']?></option>
                                  <?php
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
                               <option>--Select Category---</option>
                            
                            </select>

                        </div>

                        <div class="form-gp">
                            <label for="asset_name">Asset Name</label>
                            <input type="text" id="asset_name" name="asset_name" required> 
                        </div>

                        <div class="form-gp">
                            <label for="asset_model">Asset Model</label>
                            <input type="text" id="asset_model" name="asset_model" required> 
                        </div>

                        <div class="form-gp">
                            <label for="quantity">Quantity</label>
                            <input type="text" id="quantity" name="quantity" required> 
                        </div>

                        <div class="form-gp">
                            <label for="single_price">Single Price</label>
                            <input type="text" id="single_price" name="single_price" required> 
                        </div>

                        

                        

                        

                        <div class="form-gp">
                            <label for="date">Date</label>
                            <br>
                            <input type="date" id="date" name="date"> 
                        </div>

                        <div class="form-gp">
                            <label for="remarks">Remarks</label>
                            <input type="text" id="remarks" name="remarks"> 
                        </div>



                        <div class="form-gp">

                            <label for="asset_status">Status</label><br>
                            <select name="asset_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                
                            </select>
                        </div>
                       

                        

                        <div class="submit-btn-area">
                           
                            <div class="login-other row mt-4">

                                <div class="col-6">
                                    <a href="#">
                                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </a>
                                </div>

                                <div class="col-6">
                                    <a href="#">
                                        <button id="form_submit" type="submit" name="submit">Submit <i class="ti-arrow-right"></i></button>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                </form>
           
       
    


                    <!-- form end -->
                  
                  
                </div>

              </div>
            </div>



                    <!-- modal end -->
                                <h4 class="header-title"> Assets List </h4>

                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Category Name</th>
                                                <th>Sub- Category Name</th>
                                                <th>Asset Name</th>
                                                <th>Asset Model</th>
                                                <th>Quantity</th>
                                                <th>Single Price</th>
                                              
                                                <th>Date</th>
                                                <th>Remarks</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                                
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            $data_array=$assets_details_class->show();
                                            $i=0;
                                            while($data=$data_array->fetch_assoc())
                                            {
                                                $i++;
                                            ?>
                                            <tr>


                                                <td><?=$i?></td>
                                                <td>
                                                    
                                                    <?php

                                                       $category_data=$assets_details_class->category_data_get($data['category_name'])->fetch_assoc();

                                                       echo $category_data['category_name'];

                                                    ?>


                                                </td>
                                                <td>
                                                    
                                                    <?php

                                                       $sub_category_data=$assets_details_class->sub_category_data_get($data['sub_category_name'])->fetch_assoc();

                                                       echo $sub_category_data['sub_category_name'];

                                                    ?>


                                                </td>
                                                <td><?=$data['asset_name']?></td>
                                                <td><?=$data['asset_model']?></td>
                                                <td><?=$data['quantity']?></td>
                                                <td><?=$data['single_price']?></td>
                                               
                                                <td><?=$data['date']?></td>
                                                <td><?=$data['remarks']?></td>
                                                
                                                <td>
                                                    
                                                    <?php
                                                        if($data['status']=='Active')
                                                        {
                                                        ?>
                                                            <span class="text-success"><?=$data['status']?></span>
                                                     <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                            <span class="text-danger"><?=$data['status']?></span>
                                                        <?php
                                                        }
                                                        ?>

                                                </td>
                                                <td>
                                                    <!-- delete button start -->
                                                    <a href="?page=assets_details&&delid=<?=$data['id']?>">

                                                        <i class="fa fa-trash" aria-hidden="true" name="delete" onclick="return confirm('are you sure?')" style="font-size: 20px; color: #f52c2c;" ></i>
                                                       </a>

                                                        <!-- delete button end -->

                                                        <!-- update button start -->
                                                        <a href="?page=assets_details_update&&upid=<?=$data['id']?>">
                                                            <i class="fa fa-edit" style="font-size: 20px; color: #1d8bb9;" ></i>
                                                        </a>
                                                        <!-- update button end -->



                                                        <!-- status button start -->
                                                        <a href="?page=assets_details&&status_id=<?=$data['id']?>">


                                                            <?php


                                                            if($data['status']=='Active')
                                                            {
                                                                ?>
                                                                    <i class="fa fa-toggle-on" style="font-size: 20px; color: #099705" ></i>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <i class="fa fa-toggle-off" style="font-size: 20px; color: #fb3341;" ></i>
                                                                <?php
                                                            }
                                                        ?>
                                                       
                                                        </a>
                                                        <!-- status button end -->
                                                </td>
                                            </tr>
                                            <?php

                                            }
                                           ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
              
            </div>
        </div>
        <!-- main content area end -->
       
    </div>



<script>


$(document).ready(function(){

        function printFunc() {
        var divToPrint = document.getElementById('dataTable3');
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            '}' +
            '</style>';
        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write("<h3 align='center'>Asset Details</h3>");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
        }


     $('.print_this_page').on('click',function(){

        // window.print();
       printFunc();
    });





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