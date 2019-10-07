<?php

$transfer_list_class= new Transfer_list_class();
$transfer_data=$transfer_list_class->show_transfer();
?>


<div style="text-align: right; margin-right: 50px; margin-top: 50px; margin-bottom: -25px;">
    
    <a href="" class="print_this_page"><i style="font-size:30px;" class="fa fa-print"></i></a>
</div>


<h4 class="header-title"> Assets Transfer List </h4>

                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                
                                                <th> Sl </th>
                                                <th> Transfer From </th>
                                                <th> To Receive </th>
                                                <th>Asset name</th>
                                                <th>Asset model</th>
                                                <th>Asset code</th>
                                                <th>Transfer Date</th>
                                              
                                             
                                               
                                              
                                                
                                                
                                                
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($transfer_data as $key => $trans_value) {
                                               
                                                ?>
                                            <tr>
                                                <td><?=$key+1?></td>
                                                
                                                <td>

                                                    <?php
                                                        $transfer_from_name=$transfer_list_class->branch_data_get($trans_value['transfer_from'])->fetch_assoc();

                                                        echo $transfer_from_name['branch_name'];
                                                    ?>
                                                    
                                                        
                                                </td>
                                                <td>

                                                    <?php
                                                        $to_receive_name=$transfer_list_class->branch_data_get($trans_value['to_receive'])->fetch_assoc();

                                                        echo $to_receive_name['branch_name'];
                                                    ?>

                                                </td>
                                                <td><?=$trans_value['asset_name']?></td>
                                                <td><?=$trans_value['asset_model']?></td>
                                                <td><?=$trans_value['asset_code']?></td>
                                                <td><?=$trans_value['date']?></td>
                                                


                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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
            newWin.document.write("<h3 align='center'> Assets Transfer Information </h3>");
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