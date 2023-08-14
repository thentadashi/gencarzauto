<?php
require_once("../../include/initialize.php");
//checkAdmin();
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
 $title="Schedules";
 $header=$view; 

switch ($view) {
	case 'list' :
		if ($_SESSION['U_ROLE']=='Administrator') {
		$content    = 'list.php';		
		break;
		}else{
			$content    = 'list2.php';	
		}
	case 'addtocart' :
		$content    = 'addtocart.php';		
		break;

	case 'edit' :
		$content    = 'edit.php';		
		break;
    case 'view' :
		$content    = 'view.php';		
		break;

	 case 'addorder' :
		$content    = 'addorder.php';		
		break;

	case 'orderdetails' :
		$content    = 'orderdetails.php';		
		break;

	case 'billing' :
		$content    = 'billing.php';		
		break;

	case 'customerdetails' :
	 	$header = "Customer Details";
		$content    = 'customerdetail.php';		
		break;

		case 'sched_detail':
			$content = 'sched_details.php';
			break;
		  

	default :
	if ($_SESSION['U_ROLE']=='Administrator') {
		$content    = 'list.php';		
		}else{
			$content    = 'list2.php';	
		}	
}
require_once ("../theme/templates.php");
?>
  
