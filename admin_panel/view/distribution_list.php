
<?php

$distribution_list_class= new Distribution_list_class();
$transfer_list_class= new Transfer_list_class();
$for_branch_option= new Branch_info_class();

$data_select=$distribution_list_class->show();

if(isset($_POST['submit']))
{
    $transfer_list_class->insert_transfer($_POST);
}

?>


<div style="text-align: right; margin-right: 50px; margin-top: 50px; margin-bottom: -25px;">
    
    <a href="" class="print_this_page"><i style="font-size:30px;" class="fa fa-print"></i></a>
</div>
                <h4 class="header-title"> Distribution List </h4>

                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Branch Name</th>
                                                <th>Asset Name</th>
                                                <th>Asset Model</th>
                                                <th>Asset Code</th>
                                                <th> Distribute Date </th>
                                                <th>Action</th>
                                             
                                             
                                               
                                              
                                                
                                                
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          

                                          <?php

                                          foreach ($data_select as $key => $distro_value) {

                                            ?>
                                             
                                            <tr>
                                                <td><?=$key+1?></td>
                                                <td>

                                                    <?php

                                                        $branch_data=$distribution_list_class->branch_name_get($distro_value['branch_name'])->fetch_assoc();

                                                        echo $branch_data['branch_name'];

                                                    ?>
                                                    
                                                        

                                                    </td>
                                                <td><?=$distro_value['asset_name']?></td>
                                                <td><?=$distro_value['asset_model']?></td>
                                                <td><?=$distro_value['asset_code']?></td>
                                                <td>
                                                    <?=$distro_value['date']?>
                                                    
                                                <input hidden type="text" name="distribute_id" value="<?=$distro_value['distribute_id']?>">


                                                </td>


                                                <td>
                                                    
                                                    <!------transfer button start -------->
                                                        
        <button  type="button" class="btn btn-success modal_transfer" data-toggle="modal" data-target="#myModal" > Transfer </button>

                                                    <!------transfer button start -------->
                                                </td>
                                                
                                               
                                  
                                               
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            
                                         
                                            
                                        </tbody>
                                    </table>
                                </div>


    <!--------- modal body start  --------->



    <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  
                    <!-- form start -->

                       
        
            
                <form method="POST">
                    <div class="login-form-head">
                        <h4> Transfer </h4>
                        
                    </div>
                    <div class="login-form-body">

                        <div class="form-gp">
                            <label for="transfer_from"> Transfer From </label><br>

                            <input type="text" name="transfer_from" class="form-control transfer_from">

                        </div>

                        <div class="form-gp">
                            <label for="to_receive"> To Receive </label><br>

                            <select class="form-control" name="to_receive">
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

                            <label for="asset_code"> Asset Code </label><br>
                            <input type="text" name="asset_code" class="form-control asset_code">


                            <input hidden="" type="text" name="distribute_id" class="form-control distribute_id">

                        </div>

                        <div class="form-gp">

                            <label for="transfer_date"> Date </label><br>
                            <input type="date" name="transfer_date" class="form-control">


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
    <!--------- modal body end -->    

<script type="text/javascript">
    
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
            newWin.document.write("<h3 align='center'> Assets Distribution Details </h3>");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
            }


             $('.print_this_page').on('click',function(){

                // window.print();
               printFunc();
            });




        $(document).on("click",".modal_transfer",function(){

             var distribute_id=$(this).closest("tr").find("input[name=distribute_id]").val();

             $('.distribute_id').val(distribute_id);


             $.ajax({

                url:'ajax_calling_distribute.php',
                type:'POST',
                data:{'distribute_id':distribute_id},

                success:function(data)
                {
                        var result = $.parseJSON(data);

                        $('.transfer_from').val(result.branch_name);
                        $('.asset_code').val(result.asset_code);

                }

             });

        });

    });

</script>