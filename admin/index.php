<?php 
require_once("../include/initialize.php");
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/login.php");
     } 

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Dashboard";	
		$content='Dashboard/';		
		break;	
	default :
	if ($_SESSION['U_ROLE']=='Mechanic') {
		redirect("service_schedule/index.php");		
		}else{
			redirect("Dashboard/");
		}		

}
require_once("theme/templates.php");
?>