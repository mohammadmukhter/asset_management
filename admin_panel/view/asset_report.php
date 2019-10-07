 <!-- Contextual Classes start -->


                        <div class="card" style="padding-top: 100px;">


<!-- <div style="text-align: center; margin:100px 0px 100px 0px; color: #555555; background: #ffdfdf;">
 <h4> Please Select at least one field below to find asset information </h4>
</div> -->

    
    <div class="form-group row col-sm-12" style="text-align: center; margin-left: 100px;"  id="main_content">

      <div class="col-sm-2">
        <label for="date">Date</label>
        <input class="form-control date" name="date" type="date">
      </div>

      <div class="col-sm-2">
        <label for="single_price">Single Price</label>
        <input class="form-control single_price" name="single_price" type="text" placeholder="Greater than or equal">
      </div>

      <div class="col-sm-2">
        <label for="quantity">Quantity</label>
        <input class="form-control quantity" name="quantity" type="text" placeholder="Greater than or equal">
      </div>

      <div class="col-sm-2">
        <label for="remarks">Remarks</label>
        <input class="form-control remarks" name="remarks" type="text" placeholder="Remarks">
      </div>

      <div class="col-sm-2">
        <button class="btn btn-info search" style="margin-top: 30px;">Search</button>
      </div>

    </div>

 

        <div id="printTable">

          
        <div class="table_data"></div>
    

        </div>


                        </div>
                  
                    <!-- Contextual Classes end -->

<script type="text/javascript">
    
$(document).ready(function(){

    $('.search').click(function(){

        var date= $('.date').val();
        var single_price= $('.single_price').val();
        var quantity= $('.quantity').val();
        var remarks= $('.remarks').val();
        


       $.ajax({

            url:'ajax_asset_report.php',
            type:'POST',
            data:{'date':date,'single_price':single_price,'quantity':quantity,'remarks':remarks},

            success:function(data)
            {
                
                     $(".table_data").html(data);

               
            }
       });


    });





        // function printFunc() {
        // var divToPrint = document.getElementById('printTable');
        // var htmlToPrint = '' +
        //     '<style type="text/css">' +
        //     'table th, table td {' +
        //     'border:1px solid #000;' +
        //     'padding;0.5em;' +
        //     '}' +
        //     '</style>';
        // htmlToPrint += divToPrint.outerHTML;
        // newWin = window.open("");
        // newWin.document.write("<h3 align='center'> Assets Information Report </h3>");
        // newWin.document.write(htmlToPrint);
        // newWin.print();
        // newWin.close();
        // }


        //  $('.print_this_page').on('click',function(){

        //     // window.print();
        //    printFunc();
        // });

            

});

</script>