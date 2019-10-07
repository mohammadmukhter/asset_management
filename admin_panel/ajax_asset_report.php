<?php

include '../config/config.php';
include '../database/database.php';
include '../validation/validation.php';

$db= new Database();
$valid= new Validation();

	if(isset($_POST['date'])||isset($_POST['single_price'])||isset($_POST['quantity'])||isset($_POST['ramarks']))
	{
     


		$date=$_POST['date'];
		$single_price=$_POST['single_price'];
		$quantity=$_POST['quantity'];
		$remarks=$_POST['remarks'];

        $asset_data=$db->select("assets_details");


      try{

          $table="<div class=\"card-body\" style=\" padding-top: 50px;\" >";
        
                $table.="<h4 class=\"header-title\" style=\"text-align: center;\">Asset Details Report </h4>";

                $table.=" <a href=\"\" class=\"print_this_page\"><i style=\"font-size:30px; color:#555555; margin-left: 1200px; margin-bottom: 25px;\" class=\"fa fa-print\"></i></a>";


                                    $table.="<div class=\"single-table\">";
                                       $table.="<div class=\"table-responsive\">";
                                            $table.="<table class=\"table table-bordered text-dark text-center\"  >";
                                                $table.="<thead class=\"text-uppercase\">";
                                                    $table.="<tr class=\"table-dark\">";
                                                        $table.="<th scope=\"col\">Category Name</th>";
                                                        $table.="<th scope=\"col\">Sub Category Name</th>";
                                                        $table.="<th scope=\"col\">Asset Name</th>";
                                                        $table.="<th scope=\"col\">Asset Model</th>";
                                                        $table.="<th scope=\"col\">Quantity</th>";
                                                        $table.="<th scope=\"col\">Single Price</th>";
                                                        $table.="<th scope=\"col\">Total Price</th>";
                                                        $table.="<th scope=\"col\">Remarks</th>";
                                                        $table.="<th scope=\"col\">Status</th>";
                                                    $table.="</tr>";
                                            $table.="</thead>";
   
        if($date)
        {
            $asset_data=$db->first("assets_details","date <= '$date'");

        }


        if($single_price)
        {
            $asset_data=$db->first("assets_details","single_price <= $single_price");
        }


        if($quantity)
        {
            $asset_data=$db->first("assets_details","quantity <= $quantity");
        }


        if($remarks)
        {
            $asset_data=$db->first("assets_details","remarks = '$remarks'");
        }




        $num_rows = mysqli_num_rows($asset_data);

        if(!$asset_data)
        {
           echo $table.="<tr><td colspan='9' style='background:#c2daef'><span style='color:red;'>No Data Found</span></td></tr>";
        }
        if($num_rows==0)
        {
           echo  $table.="<tr><td colspan='9' style='background:#c2daef'><span style='color:red;'>No Data Found</span></td></tr>";
        }
        else
        {

          
                                           
                                                $table.="<tbody>";
                                                foreach ($asset_data as $key => $value) {


                                                    $table.="<tr class=\"table-light\">";

                                                    $category_id=$value['category_name'];
                                                    $category=$db->first("assets_category","id='$category_id'")->fetch_assoc();
                                                        $table.="<td>".$category['category_name']."</td>";

                                                    $sub_category_id=$value['sub_category_name'];
                                                    $sub_category=$db->first("assets_sub_category","id='$sub_category_id'")->fetch_assoc();
                                                        $table.="<td>".$sub_category['sub_category_name']."</td>";

                                                        $table.="<td>".$value['asset_name']."</td>";
                                                        $table.="<td>".$value['asset_model']."</td>";
                                                        $table.="<td>".$value['quantity']."</td>";
                                                        $table.="<td>".$value['single_price']."</td>";


                                                        $total_price=$value['quantity']*$value['single_price'];
                                                        $table.="<td>".$total_price."</td>";



                                                        $table.="<td>".$value['remarks']."</td>";
                                                        $table.="<td>".$value['status']."</td>";
                                                       
                                                        
                                                    $table.="</tr>";

                                                }
                                                    
                                                $table.="</tbody>";
                                            $table.="</table>";
                                        $table.="</div>";
                                    $table.="</div>";
                                $table.="</div>";



                                echo $table;
                                
        }
        
    }
            catch(Exception $e)
            {

            }                    
            
                       
                        
	

	}

 


?>



<script type="text/javascript">
    
    $(document).ready(function(){

         $(".print_this_page").click(function () {
                //Hide all other elements other than printarea.
                $('#header_area').hide();
                $('#main_content').hide();
                $("#printTable").show();
                window.print();
            })

    });
</script>