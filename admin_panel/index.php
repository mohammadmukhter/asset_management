<?php

include '../config/config.php';
include '../database/database.php';
include '../validation/validation.php';

include '../Session/Session.php';
Session::checkAdminSession();

spl_autoload_register(function($class){
  include '../class/'.$class.'.php';
});

?>




<?php

include 'my_css/my_css.php';
include 'view/dashboard.php';
include 'view/header.php';


if(isset($_GET['page']))
{
	switch ($_GET['page']) {
	case 'admin':
      include 'view/admin.php';
      break;

      case 'address_info':
      include 'view/address_info.php';
      break;
      
      case 'branch_info':
      include 'view/branch_info.php';
      break;

      case 'assets_category':
      include 'view/assets_category.php';
      break;

      case 'assets_sub_category':
      include 'view/assets_sub_category.php';
      break;

      
       case 'assets_details':
      include 'view/assets_details.php';
      break;

       case 'distribution_list':
      include 'view/distribution_list.php';
      break;


       case 'stock':
      include 'view/stock.php';
      break;

       case 'transfer_list':
      include 'view/transfer_list.php';
      break;

      case 'asset_report':
      include 'view/asset_report.php';
      break;

      case 'distribution_report':
      include 'view/distribution_report.php';
      break;

      case 'transfer_report':
      include 'view/transfer_report.php';
      break;

      case 'admin_update':
      include 'update_page/admin_update.php';
      break;

      case 'assets_category_update':
      include 'update_page/assets_category_update.php';
      break;


      case 'assets_sub_category_update':
      include 'update_page/assets_sub_category_update.php';
      break;

      case 'assets_details_update':
      include 'update_page/assets_details_update.php';
      break;

      case 'address_info_update':
      include 'update_page/address_info_update.php';
      break;

      case 'branch_info_update':
      include 'update_page/branch_info_update.php';
      break;

      case 'distribute_update':
      include 'update_page/distribute_update.php';
      break;


      default:
      include 'view/main_content.php';
      break;
	}
}
else
{
	include 'view/main_content.php';
}

include 'view/footer.php';
include 'my_js/my_js.php';

?>

 
