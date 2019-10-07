<?php

$for_branch_option= new Branch_info_class();
$branch_array=$for_branch_option->show();

?>


	            <div class="card" style="padding-top: 100px;">

<div class="form-group row col-sm-12" style="text-align: center; margin-left: 100px;"  id="main_content">

      

      <div class="col-sm-4" >
        <label for="transfer_from">Transfer From</label>
        <select class="form-control transfer_from" name="transfer_from">
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

      <div class="col-sm-4" >
        <label for="to_receive">To Receive</label>
        <select class="form-control to_receive" name="to_receive">
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


	                <div class="table_body"></div>


	            </div>


<script type="text/javascript">
	
	$(document).ready(function(){

		$('.search').click(function(){

			var transfer_from= $('.transfer_from').val();
			var to_receive= $('.to_receive').val();

			$.ajax({

				url:'ajax_transfer_report.php',
				type:'POST',
				data:{'transfer_from':transfer_from,'to_receive':to_receive},

				success:function(data)
				{
					// alert(data);
					$('.table_body').html(data);
				}
			});
		});
	});

</script>