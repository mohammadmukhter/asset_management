<?php


include '../config/config.php';
include '../database/database.php';

$db= new Database();


if(isset($_POST['transfer_from'])||isset($_POST['to_receive']))
{
	$transfer_from= $_POST['transfer_from'];
	$to_receive= $_POST['to_receive'];

	// $transfer_data=$db->select("transfer");



						$table="<div class=\"card-body\">";
		
                                $table.="<h4 class=\"header-title\" style=\"text-align: center; font-size: 25px; font-weight: bold; margin-top: 100px; \">Asset Transfer Report </h4>";
                               

                                $table.=" <a href=\"\" class=\"print_this_page\"><i style=\"font-size:30px; color:#555555; margin-left: 1200px; margin-bottom: 25px;\" class=\"fa fa-print\"></i></a>";


                                $table.="<div class=\"single-table\">";
                                    $table.="<div class=\"table-responsive\">";
                                       $table.="<table class=\"table table-bordered table text-dark text-center\">";
                                            $table.="<thead class=\"text-uppercase\">";
                                                $table.="<tr class=\"table-dark\">";
                                                    $table.="<th scope=\"col\">Transfer From</th>";
                                                    $table.="<th scope=\"col\">To Receive</th>";
                                                    $table.="<th scope=\"col\">Asset Name</th>";
                                                    $table.="<th scope=\"col\">Asset Model</th>";
                                                    $table.="<th scope=\"col\">Asset Code</th>";
                                                    $table.="<th scope=\"col\">Transfer Date</th>";
                                                    
                                                $table.="</tr>";
                                            $table.="</thead>";

	if($transfer_from && $to_receive)
	{
		$transfer_data=$db->first("transfer","transfer_from='$transfer_from' && to_receive='$to_receive'");
		
	}

	// if($to_receive)
	// {
	// 	$transfer_data=$db->first("transfer","to_receive='$to_receive'");

	// }

							


	$num_rows = mysqli_num_rows($transfer_data);

        if(!$transfer_data)
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


                                            foreach ($transfer_data as $key => $value) {
                                            	 
                                            	 $table.="<tr class=\"table-light\">";



                                            	 $trnsfer_branch=$value['transfer_from'];
                                                    $branch_t=$db->first("branch_info","id='$trnsfer_branch'")->fetch_assoc();
                                                        $table.="<td>".$branch_t['branch_name']."</td>";


                                                    // $table.="<td>".$value['transfer_from']."</td>";

                                                         $receive_branch=$value['to_receive'];
                                                    $branch_r=$db->first("branch_info","id='$receive_branch'")->fetch_assoc();
                                                        $table.="<td>".$branch_r['branch_name']."</td>";


                                                    // $table.="<td>".$value['to_receive']."</td>";
                                                    $table.="<td>".$value['asset_name']."</td>";
                                                    $table.="<td>".$value['asset_model']."</td>";
                                                    $table.="<td>".$value['asset_code']."</td>";
                                                    $table.="<td>".$value['date']."</td>";
                                                    
                                                    
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