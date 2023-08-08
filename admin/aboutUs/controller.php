<?php
require_once ("../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {

	
	case 'edit' :
	doEdit();
	break;

	}


    function doEdit() {

        if(isset($_POST['save'])){
 
            $about = New about();
            $about->email 		= $_POST['email']; 
            $about->phone			= $_POST['phone'];
            $about->address			= $_POST['address'];
            $about->facebook_name   	= $_POST['facebook_name'];
            $about->facebook_link		= $_POST['facebook_link'];
            $about->website		= $_POST['website']; 
            $about->update($_POST['id']);
    
    
    message("Product has been updated!", "success");
    redirect("index.php");
    }
    redirect("index.php"); 
    }
    








?>


