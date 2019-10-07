<?php

$for_branch_option= new Branch_info_class();
$branch_array=$for_branch_option->show();

?>



                        <div class="card" style="padding-top: 100px;">




<div class="form-group row col-sm-12" style="text-align: center; margin-left: 100px;"  id="main_content">


      <div class="col-sm-9" >
        <label for="branch_name">Branch Name</label>
        <select class="form-control branch_name" name="branch_name">
            <option>------ select branch name ------</option>
        <?php

        foreach ($branch_array as $key => $branch_value) {

            ?>

            <option value="<?=$branch_value['id']?>"><?=$branch_value['branch_name']?></opiton>

            <?php
           
        }

        ?>

        </select>

      </div>

      
      <div class="col-sm-2">
        <button class="btn btn-info search" style="margin-top: 30px;">Search</button>
      </div>

    </div>




     <div id="printTable">
            
            <div class="table_body"></div>
    </div>



                            <!-- <div class="card-body">
                                <h4 class="header-title" style="text-align: center; font-size: 25px; font-weight: bold; ">Count distributed Assets</h4>
                               
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <thead class="text-uppercase">
                                                <tr class="table-dark">
                                                    <th scope="col">Asset Name </th>
                                                    <th scope="col">Asset Model </th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col"> Single Price </th>
                                                    <th scope="col"> Total Price </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="table-light">
                                                    <td>ddddddd</td>
                                                    <td>ddddddd</td>
                                                    <td>ddddddd</td>
                                                    <td>ddddddd</td>
                                                    <td>ddddddd</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->



                        </div>



<script type="text/javascript">
    
    $(document).ready(function(){

        $('.search').click(function(){
            var branch_name= $('.branch_name').val();

            // alert(branch_name);

            $.ajax({

                url:'ajax_distribution_report.php',
                type:'POST',
                data:{'branch_name':branch_name},

                success:function(data)
                {
                    $('.table_body').html(data);
                }

            });

        });        

    });

</script>
