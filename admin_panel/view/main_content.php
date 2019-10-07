<?php

$for_stock_data= new Stock_class();
$stock_data=$for_stock_data->select_for_dashboard();
$num_rows=mysqli_num_rows($stock_data);


$for_distribute_data= new Distribution_list_class();
$Distribute_data=$for_distribute_data->show();
$distro_data=mysqli_num_rows($Distribute_data);


$distributable_data=$num_rows-$distro_data;
?>     



            <div class="main-content-inner">
                <!-- sales report area start -->
                <div class="sales-report-area mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                     
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0"> Total Asset </h4>
                                       
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2 style="color: blue; font-size: 30px; font-weight: bold;"><?= $num_rows?></h2>
                                        
                                    </div>
                                </div>
                                <canvas id="coin_sales1" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Distributed Asset </h4>
                                        
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2 style="color: red; font-size: 30px; font-weight: bold;"><?=$distro_data?></h2>
                                        
                                    </div>
                                </div>
                                <canvas id="coin_sales2" height="100"></canvas>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Distributable Asset </h4>
                                     
                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2 style="color: green; font-size: 30px; font-weight: bold;"><?=$distributable_data?></h2>
                                        
                                    </div>
                                </div>
                                <canvas id="coin_sales3" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sales report area end -->
                <!-- overview area start -->
                <div class="row">
                    <!-- <div class="col-xl-9 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Overview</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected>Last 24 Hours</option>
                                        <option value="0">01 July 2018</option>
                                    </select>
                                </div>
                                <div id="verview-shart"></div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-3 col-lg-4 coin-distribution">
                        <div class="card h-full">
                            <div class="card-body">
                                <h4 class="header-title mb-0">Coin Distribution</h4>
                                <div id="coin_distribution"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
