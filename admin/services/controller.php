<?php
require_once ("../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

	case 'banner' :
	setBanner();
	break;

 case 'discount' :
	setDiscount();
	break;
	}

   
function doInsert(){
	if(isset($_POST['save'])){
		
	 

			$errofile = $_FILES['image']['error'];
			$type = $_FILES['image']['type'];
			$temp = $_FILES['image']['tmp_name'];
			$myfile =$_FILES['image']['name'];
		 	$location="uploaded_photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=add");
		}else{
	 
				@$file=$_FILES['image']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
				@$image_name= addslashes($_FILES['image']['name']); 
				@$image_size= getimagesize($_FILES['image']['tmp_name']);

			if ($image_size==FALSE || $type=='video/wmv') {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=add");
			}else{
					//uploading the file
					move_uploaded_file($temp,"uploaded_photos/" . $myfile);
		 	
					if ($_POST['serv_name'] == "" OR $_POST['serv_price'] == "") {
					$messageStats = false;
					message("All fields are required!","error");
					redirect('index.php?view=add');
					}else{	

			 
						$autonumber = New Autonumber();
						$res = $autonumber->set_autonumber('serv_id');

  				 	 	


  				 	 	$services = New Services(); 
  				 	 	$services->serv_id 		= $res->AUTO; 
						$services->serv_name 	= $_POST['serv_name']; 
						$services->serv_price 	= $_POST['serv_price'];
						$services->ctype_a 		= $_POST['ctype_a'];
						$services->ctype_b 		= $_POST['ctype_b'];
						$services->ctype_c 		= $_POST['ctype_c'];
						$services->images		= $location; 
						$services->description 	= $_POST['description'];
						$services->create();
						// }
  					 

						$autonumber = New Autonumber();
						$autonumber->auto_update('serv_id');



						message("New Services created successfully!", "success");
						redirect("index.php");
						}
							
					}
			}
			 
		  }


	  }
 
 
	function doEdit(){
	// 	if (@$_GET['stats']=='NotAvailable'){
	// 		$services = New Services();
	// 		$services->status	= 'Available';
	// 		$services->update(@$_GET['id']);

	// 	}elseif(@$_GET['stats']=='Available'){
	// 		$services = New Services();
	// 		$services->status	= 'NotAvailable';
	// 		$services->update(@$_GET['id']);
	// 	}else{

	// 	if (isset($_GET['front'])){
	// 		$services = New Services();
	// 		$services->FRONTPAGE	= True;
	// 		$services->update(@$_GET['id']);

	// 	}
	// }



		if(isset($_POST['save'])){
 
						$services = New Services();
						// $services->PROMODEL 		= $_POST['PROMODEL']; 
						// $services->PRONAME 		= $_POST['PRONAME']; 
						$services->serv_name 	= $_POST['serv_name']; 
						$services->serv_price 	= $_POST['serv_price'];
						$services->description 	= $_POST['description'];
						$services->ctype_a 		= $_POST['ctype_a'];
						$services->ctype_b 		= $_POST['ctype_b'];
						$services->ctype_c 		= $_POST['ctype_c'];
						$services->update($_POST['serv_id']);
  

			message("Services has been updated!", "success");
			redirect("index.php");
	  }
	redirect("index.php"); 
}

function doDelete() {
    if (isset($_POST['selector']) == '') {
        message("Select the records first before you delete!", "error");
        redirect('index.php');
    } else {
        $id = $_POST['selector'];
        $key = count($id);

        for ($i = 0; $i < $key; $i++) {
            $services = new Services();
            $imageFileName = $services->getImageFileName($id[$i]);

            if (!empty($imageFileName)) {
                $filePath = __DIR__ . '/uploaded_photos/' . $imageFileName;

                if (file_exists($filePath)) {
                    if (unlink($filePath)) {
                        echo "Image file '$imageFileName' deleted successfully.<br>";
                    } else {
                        echo "Failed to delete image file '$imageFileName'.<br>";
                    }
                }
            }

            $services->delete($id[$i]);
        }

        message("Services have been Removed!", "info");
        redirect('index.php');
    }
}
		 
        function doupdateimage(){
        
            $errofile = $_FILES['photo']['error'];
            $type = $_FILES['photo']['type'];
            $temp = $_FILES['photo']['tmp_name'];
            $myfile =$_FILES['photo']['name'];
            $location="uploaded_photos/".$myfile;


        if ( $errofile > 0) {
                message("No Image Selected!", "error");
                redirect("index.php?view=view&id=". $_POST['serv_id']);
        }else{

                @$file=$_FILES['photo']['tmp_name'];
                @$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                @$image_name= addslashes($_FILES['photo']['name']); 
                @$image_size= getimagesize($_FILES['photo']['tmp_name']);

            if ($image_size==FALSE ) {
                message("Uploaded file is not an image!", "error");
                redirect("index.php?view=view&id=". $_POST['serv_id']);
            }else{
                    //uploading the file
                        move_uploaded_file($temp,"uploaded_photos/" . $myfile);
                        $services = New Services();
                        $services->images 	= $location;
                        $services->update($_POST['serv_id']); 

                        redirect("index.php");
                        
                            
                    }
            }
            
        }


	function setBanner(){
		$promo = New Promo();
		$promo->PROBANNER  =1;  
		$promo->update($_POST['PROID']);

	}

 	function setDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
	function removeDiscount(){
 		if (isset($_POST['submit'])){

		$promo = New Promo();
		$promo->PRODISCOUNT  = $_POST['PRODISCOUNT']; 
		$promo->PRODISPRICE  = $_POST['PRODISPRICE']; 
		$promo->PROBANNER  =1;    
		$promo->update($_POST['PROID']);

		msgBox("Discount has been set.");

		redirect("index.php"); 
 		}
	
	}
?>