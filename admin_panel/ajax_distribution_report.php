<?php

include '../config/config.php';
include '../database/database.php';

$db= new Database();


if(isset($_POST['branch_name']))
{
	$branch_id= $_POST['branch_name'];

	// echo $branch_id;

    $main_branch_data=$db->first("branch_info","id='$branch_id'");
        $branch_name_data=$main_branch_data->fetch_assoc();



                          $table="<div class=\"card-body\">";
        
                                $table.="<h4 class=\"header-title\" style=\"text-align: center; font-size: 25px; font-weight: bold; margin-top: 100px; \">Asset Distribute Report </h4>";
                                $table.="<h4 class=\"header-title\" style=\"text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 50px;\">Distribute To :

                              
                                        <span style=\"font-size: 35px; color:blue;\">".$branch_name_data['branch_name']."</span>
                                    
                                
                                </h4>";

                                $table.=" <a href=\"\" class=\"print_this_page\"><i style=\"font-size:30px; color:#555555; margin-left: 1200px; margin-bottom: 25px;\" class=\"fa fa-print\"></i></a>";


                                $table.="<div class=\"single-table\">";
                                    $table.="<div class=\"table-responsive\">";
                                       $table.="<table class=\"table table-bordered table text-dark text-center\">";
                                            $table.="<thead class=\"text-uppercase\">";
                                                $table.="<tr class=\"table-dark\">";
                                                    $table.="<th scope=\"col\">Asset Name </th>";
                                                    $table.="<th scope=\"col\">Asset Model </th>";
                                                    $table.="<th scope=\"col\">Asset Code </th>";
                                                    $table.="<th scope=\"col\">Distribute Date </th>";
                                                    
                                                $table.="</tr>";
                                            $table.="</thead>";



	if($branch_id)
	{
		$distro_data=$db->first("distribute","branch_name='$branch_id'");
		
	
		

	}
    


	$num_rows = mysqli_num_rows($distro_data);

        if(!$distro_data)
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


                                            foreach ($distro_data as $key => $distro_value) {
                                            	 
                                            	 $table.="<tr class=\"table-light\">";
                                                    $table.="<td>".$distro_value['asset_name']."</td>";
                                                    $table.="<td>".$distro_value['asset_model']."</td>";
                                                    $table.="<td>".$distro_value['asset_code']."</td>";
                                                    $table.="<td>".$distro_value['date']."</td>";
                                                    
                                                    
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