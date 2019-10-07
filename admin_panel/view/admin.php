<?php

$admin_class= new Admin_class();

$for_branch_option= new Branch_info_class();

if(isset($_POST['submit']))
{
    $admin_class->store($_POST,$_FILES);
}

if(isset($_GET['delid']))
{
    $id=$_GET['delid'];
    $admin_class->destroy($id);
}

if(isset($_GET['status_id']))
{
    $id=$_GET['status_id'];
    $admin_class->status_change($id);
    
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

                       
        
            
                <form method="POST" enctype="multipart/form-data">
                    <div class="login-form-head">
                        <h4>Add Admin</h4>
                        
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required > 
                        </div>

                        <div class="form-gp">
                            <label for="f_name">Father Name</label>
                            <input type="text" id="f_name" name="f_name" required > 
                        </div>

                        <div class="form-gp">
                            <label for="m_name">Mother Name</label>
                            <input type="text" id="m_name" name="m_name" required > 
                        </div>

                        

                        <div class="form-gp">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" required > 
                        </div>

                       

                        <div class="form-gp">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required  > 

                            <span id="message_email"></span>
                        </div>

                        
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required > 
                        </div>

                        <div class="form-gp">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required > 

                            <span id='message'></span>
                        </div>



                        <div class="form-gp">
                            <label for="branch_name"> Branch Name</label><br>

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
                            <label for="image">Image</label>
                            <br>
                            <input type="file" id="image" name="image"> 
                        </div>


                        <div class="form-gp">

                            <label for="admin_status">Status</label><br>
                            <select name="admin_status" class="form-control" style="border:none; border-bottom: 1px solid #cccecc;" required >
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                
                            </select>
                        </div>

                        <div class="submit-btn-area">
                           
                            <div class="login-other row mt-4">

                                <div class="col-6">
                                    
                                        <button class="btn btn-danger" data-dismiss="modal">Close</button>
                                    
                                </div>

                                <div class="col-6">
                                    
                                        <button name="submit" >Submit <i class="ti-arrow-right"></i></button>
                                   
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
                                <h4 class="header-title"> Admin Information </h4>

                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                               
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Father Name</th>
                                                <th>Mother Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                
                                                <th>Password</th>
                                                <th>Branch Name</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                                
                                                
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data_array=$admin_class->show();
                                            $i=0;
                                            while($data=$data_array->fetch_assoc())
                                            {
                                                $i++;
                                            ?>
                                            
                                            <tr>
                                               
                                                <td><?=$i?></td>
                                                <td><?=$data['name']?></td>
                                                <td><?=$data['f_name']?></td>
                                                <td><?=$data['m_name']?></td>
                                                <td><?=$data['address']?></td>
                                                <td><?=$data['email']?></td>
                                                <td>****************</td>
                                                <td>

                                                    <?php

                                                    $branch_data=$admin_class->branch_data_get($data['branch_name'])->fetch_assoc();
                                                    
                                                    echo $branch_data['branch_name'];


                                                    ?>

                                                </td>

                                                <td> <img style="height: 100px; width: 100px;" src="<?=$data['image']?>" > </td>

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
                                                    <a href="?page=admin&&delid=<?=$data['id']?>">

                                                        <i class="fa fa-trash" aria-hidden="true" name="delete" onclick="return confirm('are you sure?')" style="font-size: 20px; color: #f52c2c;" ></i>
                                                       </a>

                                                        <!-- delete button end -->

                                                        <!-- update button start -->
                                                        <a href="?page=admin_update&&upid=<?=$data['id']?>">
                                                            <i class="fa fa-edit" style="font-size: 20px; color: #1d8bb9;" ></i>
                                                        </a>
                                                        <!-- update button end -->



                                                        <!-- status button start -->
                                                        <a href="?page=admin&&status_id=<?=$data['id']?>">


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
        newWin.document.write("<h3 align='center'>Admin Information</h3>");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
        }


     $('.print_this_page').on('click',function(){

        // window.print();
       printFunc();
    });







       $('#confirm_password').keyup(function () {

        var password=$('#password').val();
        var confirm_password= $('#confirm_password').val();
            if (password==confirm_password) 
              {
                $('#message').html('Matching').css('color', 'green');
              } 
              else 
                $('#message').html('Not Matching').css('color', 'red');
         });

       

});

</script>


<script>
    
$(document).ready(function(){

    $('#email').keyup(function(){

        var email= $('#email').val();

            $.ajax({

            url:'ajax_calling_email.php',
            type:'POST',
            data:{'email':email},
            success:function(data){
                // alert(data);
                if(data)
                {
                    $('#message_email').html(data).css('color', 'red');
                }
                else
                    $('#message_email').html('');
            }

            });


       });

});
       
</script>