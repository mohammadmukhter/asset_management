<?php

$stock_class= new Stock_class();
$for_branch_option= new Branch_info_class();

$distribution_list_class= new Distribution_list_class();


$joined=$stock_class->join_data();


if(isset($_GET['status_id']))
{
    $id=$_GET['status_id'];
    $stock_class->status_change($id);
    
}

if(isset($_POST['submit']))
{
    $distribution_list_class-> insert_distro($_POST);
}


?>


 <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">


<div style="text-align: right; margin-right: 50px; margin-top: 50px; margin-bottom: -25px;">
    
    <a href="" class="print_this_page"><i style="font-size:30px;" class="fa fa-print"></i></a>
</div>

                                <h4 class="header-title" style="text-align: center; font-size: 30px; font-weight: bold; color: blue;">Stock & Distribution table</h4>
                                <div class="data-tables">
                                    <table id="dataTable" class="text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Asset Name</th>
                                                <th>Asset Model</th>
                                                <th>Asset Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            foreach ($joined as $key => $joined_value) {
                                               
                                            ?>

                                            <tr>
                                                <td> <?=$key+1?> </td>
                                                <td> <?=$joined_value['asset_name']?>

                                                <input  type="text" hidden="hidden" name="asset_id"  value="<?=$joined_value['id']?>">
     

                                             </td>
                                                <td> <?=$joined_value['asset_model']?> </td>
                                                <td> <?=$joined_value['code']?> 

                                                <input  type="text" hidden="hidden" name="stock_id"  value="<?=$joined_value['stock_id']?>">
                                            </td>

                                                <td> 

                                                    <?php
                                                        if($joined_value['stock_status']=='Active')
                                                        {
                                                        ?>
                                                            <span class="text-success"><?=$joined_value['stock_status']?></span>
                                                     <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                            <span class="text-danger"><?=$joined_value['stock_status']?></span>
                                                        <?php
                                                        }
                                                        ?>


                                                    <input hidden="" type="text" name="stock_status" value="<?=$joined_value['stock_status']?>">


                                                </td>

                                                <td>
                                                    
                                                    <!-- distribute button start -->
                                                      
              <!-- Trigger the modal with a button -->
            
        <button  type="button" class="btn btn-info modal_distribute" data-toggle="modal" data-target="#myModal" > Distribute </button>
  
        

            <!-- Modal -->
          

                    <!-- modal end -->
                                                     <!-- distribute button end -->



                                                        <!-- status button start -->
                                                         <a href="?page=stock&&status_id=<?=$joined_value['stock_id']?>">


                                                            <?php


                                                            if($joined_value['stock_status']=='Active')
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
                    <!-- data table end -->








                    <!-- -------------------modal start----------------- -->
  <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  
                    <!-- form start -->

                       
        
            
                <form method="POST">
                    <div class="login-form-head">
                        <h4>Distribute</h4>
                        
                    </div>
                    <div class="login-form-body">

                        <div class="form-gp">
                            <label for="branch_name"> Branch Name </label><br>

                            <select class="form-control" name="branch_name">
                                <?php
                            $branch_data_show=$for_branch_option->show();
                            
                            while($branch_data_fetching=$branch_data_show->fetch_assoc())
                            {
                                
                                ?>
                            <option value="<?=$branch_data_fetching['id']?>"><?=$branch_data_fetching['branch_name']?></option>
                            <?php
                            }
                            ?>
                            

                            </select>

                        </div>



                         <div class="form-gp">

                            <label for="asset_name"> Asset Name</label><br>
                           <input type="text" name="asset_name" class="form-control asset_name">



                           <input hidden="" type="text" name="asset_id" class="form-control asset_id" value="">
                            
                        </div>

                   

                        <div class="form-gp">

                            <label for="asset_model"> Asset Model </label><br>
                            <input type="text" name="asset_model" class="form-control asset_model">
                             
                        </div>

                        <div class="form-gp">

                            <label for="asset_code"> Asset Code </label><br>
                            <input type="text" name="asset_code" class="form-control asset_code">



                            <input hidden="" type="text" name="stock_id" class="form-control stock_id" value="">
                            <input hidden="" type="text" name="stock_status" class="form-control stock_status" value="">

                             
                        </div>

                        <div class="form-gp">

                            <label for="distro_date"> Date </label><br>
                            <input type="date" name="distro_date" class="form-control">


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
           
       
    


                 
                </div>

              </div>
            </div>




<script type="text/javascript">
    


    $(document).ready(function(){


            function printFunc() {
            var divToPrint = document.getElementById('dataTable');
            var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            '}' +
            '</style>';
            htmlToPrint += divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write("<h3 align='center'> Assets Stock Information </h3>");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
            }


             $('.print_this_page').on('click',function(){

                // window.print();
               printFunc();
            });



        $(document).on("click",".modal_distribute",function(){
            
                var stock_id=$(this).closest("tr").find("input[name=stock_id]").val();
                var asset_id=$(this).closest("tr").find("input[name=asset_id]").val();
                var stock_status=$(this).closest("tr").find("input[name=stock_status]").val();
               

                  $('.stock_id').val(stock_id);
                  $('.asset_id').val(asset_id);
                  $('.stock_status').val(stock_status);
                // alert(asset_code);
                $.ajax({

                    url:'ajax_calling_stock.php',
                    type:'POST',
                    data:{'stock_id':stock_id},
                    success:function (data)
                    {
                       var result = $.parseJSON(data);

                       // alert(result.asset_name);
                       // alert(result.asset_model);
                       // alert(result.asset_code);


                       $('.asset_name').val(result.asset_name);
                       $('.asset_model').val(result.asset_model);
                       $('.asset_code').val(result.asset_code);


                     
                      

                        // $('#course_name').val(result.name);
                        // $('#course_credit').val(result.credit);
                    }


                });
        });

  

    });

</script>

