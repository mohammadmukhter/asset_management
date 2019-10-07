<?php

$address_info_class = new Address_info_class();

    if(isset($_POST['submit']))
    {
        $address_info_class->store($_POST);
    }


    if(isset($_GET['delid']))
    {
        $id=$_GET['delid'];
        $address_info_class->destroy($id);
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
 
                <a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" style="font-size:30px;color:green; margin-right: 10px;"></i></a>

                <a href="" class="print_this_page"><i style="font-size:30px; margin-right: 10px;" class="fa fa-print"></i></a>

                <a href="" id="pdf_download"><i style="font-size:30px; margin-right: 10px; color:black;" class="fa fa-download"></i></a>
        
            </div>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  
                  
                    <!-- form start -->

                       
        
            
                <form method="POST">
                    <div class="login-form-head">
                        <h4>Add Address Info</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="division">Division</label>
                            <input type="text" id="division" name="division"> 
                        </div>

                        <div class="form-gp">
                            <label for="district">District</label>
                            <input type="text" id="district" name="district"> 
                        </div>

                        <div class="form-gp">
                            <label for="street_info">Street Info</label>
                            <input type="text" id="street_info" name="street_info"> 
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

                    <div id="editor"></div>

                                <h4 class="header-title">Address Information</h4>

                                <div class="data-tables datatable-dark" id="pdf_side">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Sl</th>
                                                <th>Division</th>
                                                <th>District</th>
                                                <th>Street Info</th>
                                                <th>Action</th>
                                                
                                                
                                                
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $show_array=$address_info_class->show();

                                            $i=0;
                                            while($data=$show_array->fetch_assoc())
                                            {

                                            $i++;

                                                ?>

                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$data['division']?></td>
                                                <td><?=$data['district']?></td>
                                                <td><?=$data['street_info']?></td>
                                                
                                                
                                                <td>
                                                   <!-- delete button start -->
                                                    <a href="?page=address_info&&delid=<?=$data['id']?>">

                                                        <i class="fa fa-trash" aria-hidden="true" name="delete" onclick="return confirm('are you sure?')" style="font-size: 20px; color: #f52c2c;" ></i>
                                                       </a>

                                                        <!-- delete button end -->

                                                        <!-- update button start -->
                                                        <a href="?page=address_info_update&&upid=<?=$data['id']?>">
                                                            <i class="fa fa-edit" style="font-size: 20px; color: #1d8bb9;" ></i>
                                                        </a>
                                                        <!-- update button end -->



                                                        
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
            newWin.document.write("<h3 align='center'>Address Information</h3>");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
            }


             $('.print_this_page').on('click',function(){

                // window.print();
               printFunc();

            });



    });

</script>