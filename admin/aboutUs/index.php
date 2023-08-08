<?php
require_once("../../include/initialize.php");
//checkAdmin();
	# code...
if(!isset($_SESSION['USERID'])){
	redirect(web_root."admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="About us Settings"; 
	switch ($view) {

	case 'settings' :
	 
		$content    = 'settings.php';		
		break;
    case 'edit' :
	 
        $content    = 'edit_settings.php';	
        break;
  

  	default :
	$title="About us Settings";
		$content    = 'settings.php';
	}


   
 
require_once ("../theme/templates.php");
?>
  
